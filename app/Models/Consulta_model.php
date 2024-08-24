<?php
namespace App\Models;
use CodeIgniter\Model;

class Consulta_model extends Model{
    protected $table = 'consulta'; // nombre de nuestra tabla en phpMyAdmin 
    protected $primaryKey = 'id'; // clave primaria de nuestra tabla
    protected $allowedFields = ['nombre', 'correo', 'asunto', 'consulta', 'leido']; // todos los campos de la tabla
}
?>