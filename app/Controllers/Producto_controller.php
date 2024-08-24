<?php
namespace App\Controllers;
use App\Models\Producto_model;
use App\Models\Categoria_model;
use CodeIgniter\Controller;

class Producto_controller extends Controller{

    public function __construct(){
        helper(['form', 'url']);
    }

    // Funcion que muestra el formulario de alta de producto
    public function create(){
        $categoriaModel = new Categoria_model(); // Instancio un modelo de categoria
        $categorias = $categoriaModel->findAll(); // Extraigo todas las categorias almacenadas en la base de datos

        echo view('Header');
        echo view('Nav');
        echo view('Form_altaProducto', ['categorias' => $categorias]);
        echo view('Footer');
    }

    // Funcion para la gestion de los productos
    public function gestion(){
        $producto = new Producto_model(); // Instancio un producto model
        $categoriaModel = new Categoria_model(); // Instancio una categoria model
        $data['categorias'] = $categoriaModel->findAll(); // Extraigo las categorias y las almaceno en un array

        $categoriaId = $this->request->getVar('categoria'); // Extraigo el id de la categoria seleccionada en mi vista

        // Enlazo la tabla de productos con la de categorias para poder extraer la descripcion de la categoria
        $builder = $producto->builder();
        $builder->select('productos.*, categorias.categoria_descripcion');
        $builder->join('categorias', 'productos.producto_categoria = categorias.id_categoria');

        if ($categoriaId) {
            $builder->where('productos.producto_categoria', $categoriaId);
        }
    
        $data['productos'] = $builder->get()->getResultArray();

        echo view('Header');
        echo view('Nav');
        echo view('GestionProductos', $data); // Envio el array con los productos
        echo view('Footer');
    }

    // Funcion donde se valida el formulario y se da de alta el producto, o caso contrario, se muestran errores de validacion
    public function agregar(){
        // Validamos los datos ingresados por el formulario
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]',
            'precio' => 'required|regex_match[/^\d{1,10}(\.\d{1,2})?$/]',
            'stock' => 'required',
            'producto_categoria' => 'required',
            'producto_imagen' =>  [
                'uploaded[producto_imagen]',
                'mime_in[producto_imagen,image/jpg,image/jpeg,image/png]',
                'max_size[producto_imagen,2048]',
            ]
            ]);
    
            // Si se validan los datos entra al if
            if($input){
                $img = $this->request->getFile('producto_imagen'); //Extraemos la imagen y guardamos en la variable img
                $randomName = $img->getRandomName(); // Le asignamos un nombre random a nuestra imagen
                $img->move(ROOTPATH.'assets/uploads', $randomName); // Guardamos la imagen ingresada en la carpeta uploads con un nombre random

                // Creamos un array con los datos ingresados del formulario alta de producto
                $formData = [
                    'producto_imagen' => $img->getName(),
                    'producto_nombre' => $this->request->getVar('nombre'),
                    'producto_descripcion' => $this->request->getVar('descripcion'),
                    'producto_stock' => $this->request->getVar('stock'),
                    'producto_precio' => $this->request->getVar('precio'),
                    'producto_estado' => 1, // Asignamos estado "activo" al producto
                    'producto_categoria' => $this->request->getVar('producto_categoria'),
                ];

                // Instanciamos el modelo del producto
                $formModel = new Producto_model();
                // Guardamos el array en el modelo instanciado
                $formModel->save($formData);
            }

                $categorias = new Categoria_model();
                $formData['categorias'] = $categorias->findAll();
                $formData['validation'] = $this->validator;

                // Si se validaron todos los campos muestra un mensaje
                if($input){
                    echo view('Header');
                    echo view('Nav');
                    echo view('MensajeEnviado');
                    echo view('Principal');
                    echo view('Footer');
            
                } else { // si no, mostramos el formulario de alta de producto con sus correspondientes errores de validcion
                    echo view('Header');
                    echo view('Nav');
                    echo view('Form_altaProducto', ['validation' => $this->validator, 'categorias' => $categorias]);
                    echo view('Footer');
                }
    }

    // Funcion para eliminar un producto
    public function eliminarProducto($id){
        $producto = new Producto_model();
        
        $producto->eliminarProducto($id);

        return redirect()->to(base_url('gestionProducto'));
    }

    // Funcion para activar un producto previamente eliminado
    public function activarProducto($id){
        $producto = new Producto_model();
        $producto->activarProducto($id);

        return redirect()->to(base_url('gestionProducto'));

    }

    /** Muestra las vistas correspondientes al CATALOGO con filtrado por categoría y por precio*/
    public function mostrarProductos(){
        $producto = new Producto_Model(); // Instanciamos un producto model
        $categoriasModel = new Categoria_model(); // Instanciamos una categoria model
        $data['categorias'] = $categoriasModel->findAll(); 
    
        $categoriaId = $this->request->getVar('categoria'); // Almaceno el id de la categoria seleccionada en el catalogo
        $ordenPrecio = $this->request->getVar('orden_precio'); // Almaceno el orden del precio seleccionado en el catalogo
    
        $productoQuery = $producto->where('producto_estado', 1); // Guardo en la variable todos los productos que esten activos
        
        if ($categoriaId) {
            // Verifico si la categoría está activa
            $categoria = $categoriasModel->find($categoriaId);
            if ($categoria && $categoria['categoria_estado'] == 1) {
                $productoQuery = $productoQuery->where('producto_categoria', $categoriaId);
            } else {
                // Si la categoría está inactiva, no mostrar ningún producto
                $productoQuery = $producto->where('producto_categoria', null); // Esto hace que la consulta no devuelva resultados
            }
        } else {
            // Si no se especifica una categoría, excluye productos de categorías inactivas
            $categoriasActivas = $categoriasModel->where('categoria_estado', 1)->findAll();
            $categoriasActivasIds = array_column($categoriasActivas, 'id_categoria');
            $productoQuery = $productoQuery->whereIn('producto_categoria', $categoriasActivasIds);
        }
    
        if ($ordenPrecio) {
            $productoQuery = $productoQuery->orderBy('producto_precio', $ordenPrecio);
        }

        // Paginacion
        $perPage = 12;
        // $page = $this->request->getVar('page') ?? 1;
        // $total = $productoQuery->countAllResults(false);
    
        $data['productos'] = $productoQuery->paginate($perPage, 'productos'); 
        $data['pager'] = $productoQuery->pager;
    
        echo view('Header');
        echo view('Nav');
        echo view('Catalogo', $data); // Envio el arreglo para ser recorrido y mostrado en la vista
        echo view('Footer');
    }    

    // Funcion que abre el formulario de modificacion de producto
    public function modificarProducto($id){
        $productoModel = new Producto_model();
        $categoriaModel = new Categoria_model();
        
        $producto = $productoModel->find($id); // Extraigo con el id el producto que se desea modificar
        $categorias = $categoriaModel->findAll();

        $data = [
            'producto' => $producto,
            'categorias' => $categorias
        ];

        echo view('Header');
        echo view('Nav');
        echo view('Form_modificarProducto', $data);
        echo view('Footer');
    }

    // Función para actualizar el producto en la base de datos
    public function actualizarProducto($id){
        $productoModel = new Producto_model();

        // Valido todos los campos
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]',
            'precio' => 'required|regex_match[/^\d{1,10}(\.\d{1,2})?$/]',
            'stock' => 'required',
            'producto_categoria' => 'required',
            'producto_imagen' => [
                'mime_in[producto_imagen,image/jpg,image/jpeg,image/png]',
                'max_size[producto_imagen,2048]',
            ]
        ]);
        // Si se validan los datos
        if($input){
            $img = $this->request->getFile('producto_imagen'); //extraigo la imagen
            // almaceno en un array los campos ingresados por el formulario
            $formData = [
                'producto_nombre' => $this->request->getVar('nombre'),
                'producto_descripcion' => $this->request->getVar('descripcion'),
                'producto_stock' => $this->request->getVar('stock'),
                'producto_precio' => $this->request->getVar('precio'),
                'producto_categoria' => $this->request->getVar('producto_categoria'),
            ];
            // si existe la imagen y si esta es valida
            if ($img && $img->isValid() && !$img->hasMoved()) {
                $randomName = $img->getRandomName(); // le asigno un nombre aleatorio
                $img->move(ROOTPATH . 'assets/uploads', $randomName); // muevo la imagen a la carpeta uploads
                $formData['producto_imagen'] = $img->getName(); // asigno en el arreglo la imagen
            }

            $productoModel->update($id, $formData);
            return redirect()->to(base_url('gestionProducto')); // redirecciono nuevamente a la vista de gestion de productos
        } else {
            $categoriaModel = new Categoria_model(); // instancio un modelo categoria
            $categorias = $categoriaModel->findAll(); // extraigo todas las categorias del modelo
            $producto = $productoModel->find($id); // extraigo el producto que corresponde al id_producto
            
            $data = [
                'producto' => $producto,
                'categorias' => $categorias,
                'validation' => $this->validator
            ];

            echo view('Header');
            echo view('Nav');
            echo view('Form_modificarProducto', $data);
            echo view('Footer');
        }
    }

    // Permite realizar la busqueda de productos
    public function buscarProductos() {
        $productModel = new Producto_model(); // instancio un modelo de producto
        $categoriasModel = new Categoria_model(); // instancio un modelo de categorias
        $data['categorias'] = $categoriasModel->findAll(); // obtengo todas las categorias

        $query = $this->request->getVar('query'); //obtengo el termino de busqueda del formulario

        $productoQuery = $productModel->where('producto_estado', 1); // Solo los productos activos

        if ($query) {
            $productoQuery = $productoQuery->like('producto_nombre', $query) // permite buscar coincidencias parciales en la base de datos (con el nombre)
                                            ->orlike('producto_descripcion', $query); // (o con la descripcion)
        }

        // Paginación
        $perPage = 12;
        $data['productos'] = $productoQuery->paginate($perPage, 'productos'); 
        $data['pager'] = $productoQuery->pager;
    
        echo view('Header');
        echo view('Nav');
        echo view('Catalogo', $data); // Envio el array para ser recorrido y mostrado en la vista
        echo view('Footer');
    }
}
?>