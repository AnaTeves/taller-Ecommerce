<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class Login_controller extends Controller{

    public function __construct(){
        helper(['form', 'url', 'session']);
    }

    // Muestra el view del login
    public function create(){
        echo view('Header');
        echo view('Nav');
        echo view('Login');
        echo view('Footer');
    }

    public function login_usuario(){
        $session = session();

        // Obtengo los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Instancio un modelo usuario
        $usersModel = new Usuarios_model();

        // $user compara el email que trae de la base de datos con el ingresado por el formulario
        $user = $usersModel->where('email', $email)->first();

        if($user != null && $user['baja']  != 1){
            return redirect()->to(base_url('ingreso'));
        } else {

        // Si existe el usuario entra al if
        if($user){
            $passUser = $user['password']; // recupera el password de la base de datos
            $passVerif = password_verify($password, $passUser); // Verifica que las contraseñas sean iguales

            // Si estan bien ingresa aca
            if($passVerif){
                // Creo un arreglo con los datos del usuario que extraigo de la base de datos
                $data = [
                    'id_usuario' => $user['id_usuario'],
                    'nombre' => $user['nombre'],
                    'apellido' => $user['apellido'],
                    'id_perfil' => $user['id_perfil'],
                    'email' => $user['email'],
                    'login' => TRUE
                ];

                // Asigno el arreglo a la sesion para tenerlos disponibles y poder mostrarlos como el "perfil" del cliente
                $session->set($data);

                switch(session('id_perfil')){
                    case '1':
                        // redirecciona a la ruta userAdmin
                        return redirect()->to(base_url('userAdmin'));
                        break;
                    case '2':
                        // te lleva al inicio
                        return redirect()->to(base_url('inicio'));
                }
            }
            // Si no paso el password
            else {
                $session->setFlashdata('mensaje', 'Email y/o contraseña incorrecta');
                return redirect()->to(base_url('ingreso'));
            }
          }
        }

        // Si no encontro al usuario
        $session->setFlashdata('mensaje', 'Email y/o contraseña incorrecta');
        return redirect()->to(base_url('ingreso'));
    }

    // Funcion que cierra la sesion y redirecciona al inicio
    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('inicio'));
    }
}           
?>