<?php
namespace App\Controllers;
use App\Models\Contacto_model;
use App\Models\Consulta_model;
use App\Models\Categoria_model;
use App\Models\Usuarios_model;
use App\Models\DetalleFactura_model;
use App\Models\Factura_model;

class Admin_controller extends BaseController{
    // Funcion que muestra el inicio con el navegador de administrador
    public function administrador(){
        echo view('Header');
        echo view('Nav');
        echo view('Principal');
        echo view('Footer');
    }

    // Muestra todas las consultas 
    public function mostrarConsultas(){
        $consultas = new Consulta_model();
        $contacto = new Contacto_model();
        
        // Combina los datos en un solo array
        $data = [
            'consultas' => $consultas->findAll(),
            'contacto' => $contacto->findAll()
        ];
    
        // Pasar el array combinado a la vista
        return view('Header', $data).view('Nav').view('Consultas').view('Footer');
    }

    // Funcion que muestra la vista donde se gestionan las categorias
    public function gestionCategorias(){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->findAll();

        echo view('Header');
        echo view('Nav');
        echo view('GestionCategorias', $data);
        echo view('Footer');
    }

    // Funcion que llama al formulario para dar de alta una categoria
    public function create(){
        $categoriaModel = new Categoria_model(); // Instancio un modelo de categoria
        $categorias = $categoriaModel->findAll(); // Extraigo todas las categorias almacenadas en la base de datos

        echo view('Header');
        echo view('Nav');
        echo view('Form_altaCategoria', ['categorias' => $categorias]);
        echo view('Footer');
    }

    // Valida que el campo este completo y da de alta la categoria
    public function altaCategoria(){
        $categoriaModel = new Categoria_model();

        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
        ]);

        $data = [
            'categoria_descripcion' => $this->request->getPost('categoria_descripcion'),
            'categoria_estado' => 1 
        ];

        if (!$input) {
            $categoriaModel->insert($data);
            return redirect()->to(base_url('altaCategoria'))->with('mensaje', 'Categoría añadida exitosamente');
        } else {
            return redirect()->back()->with('mensaje', 'Error al añadir la categoría');
        }
    }

    public function modificarCategoria($id){
        $categoriaModel = new Categoria_model();
        $categoria = $categoriaModel->find($id);
        
        $data = ['categoria' => $categoria];

        echo view('Header');
        echo view('Nav');
        echo view('Form_modificarCategoria', $data);
        echo view('Footer');
    }

    public function actualizarCategoria($id){
        $categoriaModel = new Categoria_model();
        
        // Valido todos los campos
        $input = $this->validate([
            'descripcion' => 'required|min_length[3]',
        ]);

        if($input){
            $formData = $this->request->getVar('descripcion');
            $categoriaModel->update($id, $formData);
            return redirect()->to(base_url('gestionCategorias'));
        } else {
            $categoria = $categoriaModel->find($id);

            $data = [
                'categoria' => $categoria,
                'validation' => $this->validator
            ];

            echo view('Header');
            echo view('Nav');
            echo view('Form_modificarCategoria', $data);
            echo view('Footer');
        }
    }

    public function eliminarCategoria($id){
        $categoria = new Categoria_model();
        
        $categoria->eliminarCategoria($id);

        return redirect()->to(base_url('gestionCategorias'));
    }

    public function activarCategoria($id){
        $categoria = new Categoria_model();
        $categoria->activarCategoria($id);

        return redirect()->to(base_url('gestionCategorias'));
    }

    // Funcion que muestra la vista donde se gestionan las usuarios
    public function gestionUsuarios(){
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->findAll();

        echo view('Header');
        echo view('Nav');
        echo view('GestionUsuarios', $data);
        echo view('Footer');
    }

    public function eliminarUsuario($id){
        $usuario = new Usuarios_model();
        
        $usuario->eliminarUsuario($id);

        return redirect()->to(base_url('gestionUsuarios'));
    }

    public function activarUsuario($id){
        $usuario = new Usuarios_model();
        $usuario->activarUsuario($id);

        return redirect()->to(base_url('gestionUsuarios'));
    }

    //Lista todas las ventas realizadas
    // public function mostrarDetalleVentas($id){
    //     $salesModel = new DetalleFactura_model();
    //     $request = \Config\Services::request();
                
    //     $data['purchases'] = $salesModel->getDetalleFactura($id);
    //     $data = array('purchases' => $data);
    //     var_dump($data); die;
    //     return view('Header').view('Nav').view('DetalleVenta', $data).view('Footer');       
    // }

    // public function getDetalleFactura($id) {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('detalle_factura');
    //     $builder->select('*');
        
    //     $builder->join('productos', 'productos.id_producto = detalle_factura.id_producto');
    //     $query= $builder->where('id_venta', $id);
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }             
    
    // /**MUESTRA LOS DETALLES DE LA VENTA */
    // public function  getDetalleVentaAll(){
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('facturas');
    //     $builder->select('');
        
    //     $builder->join('productos', 'productos.id_producto = detalle_factura.id_producto');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    public function mostrarDetalleVentas($id_venta){
        $factura = new Factura_model();
        $detalle = new DetalleFactura_model();

        // Pasar los datos a la vista
        $data['factura'] = $factura->getFacturaById($id_venta);
        $data['detalles'] = $detalle->getDetallesByVentaId($id_venta);

        echo view('Header');
        echo view('Nav');
        echo view('DetalleVenta', $data);
        echo view('Footer');
    }

}
?>