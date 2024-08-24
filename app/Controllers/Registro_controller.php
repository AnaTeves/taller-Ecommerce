<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;

class Registro_controller extends Controller{

    public function __construct(){
        helper(['form', 'url']);
    }

    // Muestra el formulario de registro
    public function create(){
        echo view('Header');
        echo view('Nav');
        echo view('Registro');
        echo view('Footer');
    }

    // Validamos los datos ingresados por el formulario
    public function formValidation(){
        $input = $this->validate([
            'nombre' => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'Contraseña' => 'required|min_length[5]',
            'password_confirm' => 'required|matches[Contraseña]',
            'email' => 'required|min_length[3]|valid_email',
        ]);

        $formModel = new Usuarios_model();

        if(!$input){
            echo view('Header');
            echo view('Nav');
            echo view('Registro', ['validation' => $this->validator]);
            echo view('Footer');
        } else {
            $formData = [
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'password' => password_hash($this->request->getVar('Contraseña'), PASSWORD_DEFAULT),
                'email' => $this->request->getVar('email'),
            ];

            $formModel->save($formData);

            $session = session();
            $session->setFlashdata('mensaje', 'Usuario registrado con exito');

            return redirect()->to(base_url('registro'));
        }
    }
}
?>