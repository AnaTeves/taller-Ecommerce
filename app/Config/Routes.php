<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('quienesSomos', 'Home::QuienesSomos');
$routes->get('comercializacion', 'Home::Comercializacion');
$routes->get('inicio', 'Home::index');

// Contacto
$routes->get('contacto', 'Contacto_controller::contacto');
$routes->post('Contacto_controller/formValidation', 'Contacto_controller::formValidation');

$routes->get('terminosyusos', 'Home::TerminosYusos');

//administrador
$routes->get('userAdmin', 'Admin_controller::administrador', ['filter' => 'authusers']);
// $routes->get('consulta', 'Admin_controller::consulta');

$routes->get('verConsultas', 'Admin_controller::mostrarConsultas', ['filter' => 'authusers']);
$routes->get('Contacto_controller/verConsultas', 'Contacto_controller::verConsultas', ['filter' => 'authusers']);

////////////////////////////////////////////// ADMIN ////////////////////////////////////////////////////
// Me lleva a la vista de gestion de productos
$routes->get('gestionProducto', 'Producto_controller::gestion', ['filter' => 'authusers']);

// Formulario para añadir un nuevo producto
$routes->get('altaProducto', 'Producto_controller::create', ['filter' => 'authusers']);

// Validacion de los datos y alta de producto
$routes->post('Producto_controller/agregar', 'Producto_controller::agregar', ['filter' => 'authusers']);

// Eliminar o agregar un producto
$routes->get('Producto_controller/eliminarProducto/(:num)', 'Producto_controller::eliminarProducto/$1', ['filter' => 'authusers']);
$routes->get('Producto_controller/activarProducto/(:num)', 'Producto_controller::activarProducto/$1', ['filter' => 'authusers']);

// Formulario para editar producto
$routes->get('/Producto_controller/modificarProducto/(:num)', 'Producto_controller::modificarProducto/$1', ['filter' => 'authusers']);

// Actualiza el producto
$routes->post('/Producto_controller/actualizarProducto/(:num)', 'Producto_controller::actualizarProducto/$1', ['filter' => 'authusers']);

// Funciones para activar leido en las consultas y contactos
$routes->get('Contacto_controller/activarLeidoConsulta/(:num)', 'Contacto_controller::activarLeidoConsulta/$1', ['filter' => 'authusers']);
$routes->get('Contacto_controller/activarLeidoContacto/(:num)', 'Contacto_controller::activarLeidoContacto/$1',['filter' => 'authusers']);

// Funciones para desactivar leido en las consultas y contactos
$routes->get('Contacto_controller/desactivarLeidoConsulta/(:num)', 'Contacto_controller::desactivarLeidoConsulta/$1', ['filter' => 'authusers']);
$routes->get('Contacto_controller/desactivarLeidoContacto/(:num)', 'Contacto_controller::desactivarLeidoContacto/$1', ['filter' => 'authusers']);

// Me lleva a la vista de la gestion de usuarios
$routes->get('gestionUsuarios', 'Admin_controller::gestionUsuarios', ['filter' => 'authusers']);

// Eliminar o agregar un usuario
$routes->get('Admin_controller/eliminarUsuario/(:num)', 'Admin_controller::eliminarUsuario/$1', ['filter' => 'authusers']);
$routes->get('Admin_controller/activarUsuario/(:num)', 'Admin_controller::activarUsuario/$1', ['filter' => 'authusers']);

// Me lleva a la vista de la gestion de categorias
$routes->get('gestionCategorias', 'Admin_controller::gestionCategorias', ['filter' => 'authusers']);

// Envia al formulario para dar de alta una categoria
$routes->get('altaCategoria', 'Admin_controller::create', ['filter' => 'authusers']);

// Da de alta la categoria
$routes->post('Admin_controller/altaCategoria', 'Admin_controller::altaCategoria', ['filter' => 'authusers']);

// Formulario para editar una categoria
$routes->get('Admin_controller/modificarCategoria/(:num)', 'Admin_controller::modificarCategoria/$1', ['filter' => 'authusers']);

// Actualiza la categoria
$routes->post('Admin_controller/actualizarCategoria/(:num)', 'Admin_controller::actualizarCategoria/$1', ['filter' => 'authusers']);

// Eliminar o agregar una categoria
$routes->get('Admin_controller/eliminarCategoria/(:num)', 'Admin_controller::eliminarCategoria/$1', ['filter' => 'authusers']);
$routes->get('Admin_controller/activarCategoria/(:num)', 'Admin_controller::activarCategoria/$1', ['filter' => 'authusers']);

// Lista las ventas realizadas de todos los usuarios
$routes->get('listarVentas', 'Carrito_controller::listarVentas', ['filter' => 'authusers']);

$routes->get('detalleVenta/(:num)', 'Admin_controller::mostrarDetalleVentas/$1');

// Buscar productos mediante formulario
$routes->get('buscarProductos', 'Producto_controller::buscarProductos');

////////////////////////////////////////////// CLIENTE /////////////////////////////////////////////////

// Abre el registro
$routes->get('registro', 'Registro_controller::create');

// Validacion del registro
$routes->post('Registro_controller/formValidation', 'Registro_controller::formValidation');

// Formulario inicio de sesion
$routes->get('ingreso', 'Login_controller::create');

// Validaciones
$routes->post('Login_controller/login_usuario', 'Login_controller::login_usuario');

// Cerrar sesion
$routes->get('logout', 'Login_controller::cerrar_sesion');

// Visualiza historial de compras
$routes->get('verCompras', 'Carrito_controller::verCompras', ['filter' => 'auth']);

// Muestra catalogo de productos
$routes->get('catalogo', 'Producto_controller::mostrarProductos');

// Muestra el carrito de compras
$routes->get('verCarrito', 'Carrito_controller::verCarrito', ['filter' => 'auth']);

// Inserta un producto al carrito
$routes->post('Carrito_controller/agregarCarrito', 'Carrito_controller::agregarCarrito', ['filter' => 'auth']);

$routes->get('Carrito_controller/incrementarCantidad/(:num)', 'Carrito_controller::incrementarCantidad/$1');

$routes->get('Carrito_controller/decrementarCantidad/(:num)', 'Carrito_controller::decrementarCantidad/$1');
// $routes->get('Producto_controller/mostrarProductos/(:num)', 'Producto_controller::mostrarProductos/$1');
$routes->get('Producto_controller/mostrarProductos', 'Producto_controller::mostrarProductos');

$routes->get('Carrito_controller/eliminarProducto/(:num)', 'Carrito_controller::eliminarProducto/$1', ['filter' => 'auth']);

// Elimina todos los productos del carrito
$routes->get('Carrito_controller/vaciarCarrito', 'Carrito_controller::vaciarCarrito', ['filter' => 'auth']);

// Finaliza la compra
$routes->get('Carrito_controller/terminarCompra', 'Carrito_controller::terminarCompra', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}