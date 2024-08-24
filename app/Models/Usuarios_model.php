<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model{
    protected $table = 'usuarios'; // nombre de nuestra tabla en phpMyAdmin 
    protected $primaryKey = 'id_usuario'; // clave primaria de nuestra tabla
    protected $allowedFields = ['nombre', 'apellido', 'password', 'id_perfil', 'email', 'baja'];

    public function actualizarUsuario($id, $data){
        return $this->update($id, $data);
    }

    public function eliminarUsuario($id){
        $data = ['baja' => '0'];
        return $this->actualizarUsuario($id, $data);
    }

    public function activarUsuario($id){
        $data = ['baja' => '1'];
        return $this->actualizarUsuario($id, $data);
    }
}