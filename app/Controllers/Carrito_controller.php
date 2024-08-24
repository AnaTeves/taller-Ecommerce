<?php
namespace App\Controllers;
use App\Models\Factura_model; 
use App\Models\DetalleFactura_model; 
use App\Models\Producto_model; 
use App\Libraries\Cart;
use Codeigniter\Controller;

class Carrito_controller extends BaseController{
    protected $cart;

    public function __construct(){
        $this->cart = new Cart(); // Instanciamos una Cart para las funcionalidades basicas del carrito
    }
    
    // Funcion que agrega un producto al carrito
    public function agregarCarrito(){
        $request = \Config\Services::request();
        // Extrae los datos del producto con metodo post del catalogo
        $this->cart->insert([
            'id'      => $request->getPost('id'),
            'qty'     => 1,
            'price'   => $request->getPost('precio'),
            'name'    => $request->getPost('nombre'),
            'options' => ['Size' => 'L', 'Color' => 'Red'],
        ]);
        
        session()->setFlashdata('mensaje', '¡Producto agregado!');
        // Redirecciona al view del carrito para mostrar el producto agregado
        return redirect()->to(base_url('catalogo'));
    }

    // Funcion que le pasa al view del carrito los datos almacenados en cart
    public function verCarrito() {
        $data['carrito'] = $this->cart->contents(); // Extraigo los productos agregados al carrito
        $data['totalProductos'] = $this->cart->totalProductos(); // Extraigo la cantidad de productos
        $data['total'] = $this->cart->total(); // Extraigo el monto total
        
        echo view('Header');
        echo view('Nav');
        echo view('Carrito', $data);
        echo view('Footer');
    }

    public function eliminarProducto($id) {
        $this->cart->remove($id);

        return redirect()->to(base_url('verCarrito'));
    }

    // Elimina todos los productos del carrito
    public function vaciarCarrito() {
        $this->cart->destroy();

        return redirect()->to(base_url('verCarrito'));
    }

    public function terminarCompra(){
         //Primera parte: encabezado de venta
         $factura = new Factura_model(); //instancio el modelo de la cabecera
         $detalle = new DetalleFactura_model(); //instancio el modelo del cuerpo de la factura
         $producto = new Producto_model();
         $request = \Config\Services::request();
        
         $data = [
             'id_usuario'=> session('id_usuario'), // extraigo el id del usuario de la sesion
             'fecha_venta' => date('y-m-d'), // Guardo la fecha de la compra realizada
             'total_venta' => $this->cart->total() // Extraigo del carrito el monto total
         ];

         $factura_id = $factura->insert($data); 
        
         echo 'Inserto la cabecera'; 
        
         //segunda parte: cuerpo de la factura (detalle) 
         $cart1 = $this->cart->contents();

         foreach ($cart1 as $item){

             $detalleFactura = array(
                 'id_venta' => $factura_id,
                 'id_producto' => $item['id'],
                 'detalle_cantidad' => $item['qty'],
                 'detalle_precio' => $item['price'] * $item['qty']
             );
        
           $productoStock = $producto->where('id_producto', $item['id'])->first();
          //Controlar el stock (si existe stock del producto entonces agregar)
          if($item['qty'] <= $productoStock['producto_stock']){
             $data = [
                 'producto_stock' => $productoStock['producto_stock'] - $item['qty'], // Descuento 1 del stock del producto
             ];

             $producto->update($item['id'], $data);
             $detalle->insert($detalleFactura);
             echo 'inserto el producto';
          } else {
              echo 'no hay stock del producto id: '. $item['id'];
            }         
         }

         $this->cart->destroy();
         $session = session();
         $session->setFlashdata('mensajeProducto', 'Gracias por su compra!');
         return redirect()-> route('catalogo');
    }
    
     public function verCompras(){
        $factura = new Factura_model();
               
        $data = $factura->getDetalleFactura();
        $data = array('purchases' => $data);
       
        return view('Header').view('Nav').view('VerCompras', $data).view('Footer');       
     }

    
    public function listarVentas(){
        $salesModel = new Factura_model();
        $request = \Config\Services::request();
                
        $data['purchases'] = $salesModel->getCabeceraFactura();

        return view('Header').view('Nav').view('Ventas', $data).view('Footer');       
    }    
}
?>