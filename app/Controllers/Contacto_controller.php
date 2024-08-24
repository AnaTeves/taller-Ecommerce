<?php
namespace App\Controllers;
use App\Models\Contacto_model;
use App\Models\Consulta_model;
use CodeIgniter\Controller;

class Contacto_controller extends BaseController {

    public function __construct() {
        helper(['form', 'url', 'session']);
    }
    
    /** Funcion que va a mostrar la vista de la pagina */
    public function contacto() {
        echo view('Header');
        echo view('Nav');
        echo view('Contacto');
        echo view('Footer');
    }

    public function formValidation() {
        $session = session();

        // Si el usuario esta logueado ingresa aca
        if(session('login')){

             /** Aplicamos reglas de validacion a cada campo del formulario */
            $input = $this->validate([
                'asunto' => 'required|min_length[3]|max_length[20]',
                'consulta' => 'required|min_length[3]|max_length[400]',
            ]);

            /** Instanciamos el modelo */
            $formModel = new Consulta_model();

            if(!$input){ /** Si no se validan los datos */
                echo view('Header');
                echo view('Nav');
                echo view('Contacto', ['validation' => $this->validator]); // Muestra errores de validacion
                echo view('Footer');
            } 

            else{
                // Rescatamos de la sesion el nombre e email, y guardamos la consulta y el asunto realizado por el usuario
                $formData = [
                    'nombre' => session('nombre'),
                    'correo' => session('email'),
                    'asunto' => $this->request->getVar('asunto'),
                    'consulta' => $this->request->getVar('consulta'),
                ];

                // Guardamos el array en el modelo instanciado anteriormente
                $formModel->save($formData);
                
                $session->setFlashdata('mensaje', '¡Mensaje enviado con exito!');

                return redirect()->to(base_url('contacto'));
            }
        }

        // Si el usuario no esta logueado
        else{
            /** Aplicamos reglas de validacion a cada campo del formulario */
            $input = $this->validate([
                'nombre' => 'required|min_length[3]',
                'correo' => 'required|min_length[3]|valid_email',
                'asunto' => 'required|min_length[3]|max_length[20]',
                'consulta' => 'required|min_length[3]|max_length[400]',
            ]);

            /** Instanciamos el modelo */
            $formModel = new Contacto_model();

            if(!$input){ /** Si no se validan los datos */
                echo view('Header');
                echo view('Nav');
                echo view('Contacto', ['validation' => $this->validator]);
                echo view('Footer');
            } 

            else{
                /** Si pasa la validacion guardamos los datos en un array */
                $formData = [
                    'nombre' => $this->request->getVar('nombre'),
                    'correo' => $this->request->getVar('correo'),
                    'asunto' => $this->request->getVar('asunto'),
                    'consulta' => $this->request->getVar('consulta'),
                ];

                // Guardamos el array en el modelo instanciado anteriormente
                $formModel->save($formData);
                
                $session->setFlashdata('mensaje', '¡Mensaje enviado con exito!');

                return redirect()->to(base_url('contacto'));
            }
        }
    }

    /**MARCA COMO LEIDO UNA CONSULTA */
    public function activarLeidoConsulta($id=null){
        $producto = new Consulta_model();
        $data=array('leido'=>'1');
        $producto->update($id, $data);
        return redirect()->to(base_url('verConsultas')); 
    }

    /**MARCA COMO NO LEIDA UNA CONSULTA */
    public function desactivarLeidoConsulta($id){
        $producto = new Consulta_model();
        $data=array('leido'=>'0');

        $producto->update($id, $data);
        return redirect()->to(base_url('verConsultas')); 
    }

    /**MARCA COMO LEIDO UN CONTACTO */
    public function activarLeidoContacto($id=null){
        $producto = new Contacto_model();
        $data=array('leido'=>'1');
        $producto->update($id, $data);
        return redirect()->to(base_url('verConsultas')); 
    }

    /**MARCA COMO NO LEIDO UN CONTACTO */
    public function desactivarLeidoContacto($id){
        $producto = new Contacto_model();
        $data=array('leido'=>'0');
        $producto->update($id, $data);
        return redirect()->to(base_url('verConsultas')); 
    }

    public function verConsultas() {
        $consultaModel = new Consulta_model();
        $contactoModel = new Contacto_model();
        
        $estado = $this->request->getVar('estado');
        
        if ($estado == 'respondido') {
            $data['consultas'] = $consultaModel->where('leido', 1)->findAll();
            $data['contacto'] = $contactoModel->where('leido', 1)->findAll();
        } else if ($estado == 'no_respondido') {
            $data['consultas'] = $consultaModel->where('leido', 0)->findAll();
            $data['contacto'] = $contactoModel->where('leido', 0)->findAll();
        } else {
            $data['consultas'] = $consultaModel->findAll();
            $data['contacto'] = $contactoModel->findAll();
        }

        echo view('Header', $data);
        echo view('Nav', $data);
        echo view('Consultas', $data);
        echo view('Footer', $data);
    }
} 
?>