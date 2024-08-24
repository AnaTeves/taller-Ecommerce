<?php
namespace App\Models;
use CodeIgniter\Model;

class Factura_model extends Model{
    protected $table = 'facturas'; // nombre de nuestra tabla en phpMyAdmin 
    protected $primaryKey = 'id_venta'; // clave primaria de nuestra tabla
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_venta', 'id_usuario', 'fecha_venta', 'total_venta'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [

    ];

    protected $validationMessages = [
 
    ];
    protected $skipValidation     = false;

    public function getCabeceraFactura(){
        $db = \Config\Database::connect(); // Establece la conexion con la base de datos
        $builder = $db->table('facturas'); // Creamos un objeto de tipo consulta para la tabla de facturas
        $builder->select(''); // Seleccionamos todas las columnas
        $builder->join('usuarios', 'usuarios.id_usuario = facturas.id_usuario'); // Unimos las tablas, coinciden los valores de id
        $query = $builder->get(); // Ejecutamos la consulta y almacenamos en query
        return $query->getResultArray(); // Obtenemos un arreglo con los resultados de la tabla
    }

    public function getDetalleFactura(){
        $db = \Config\Database::connect();
        $builder = $db->table('facturas');
        $builder->select('*');
        
        $builder->join('usuarios', 'usuarios.id_usuario = facturas.id_usuario');
        $query = $builder->where('facturas.id_usuario', session('id_usuario'));
        $query = $builder->get();
        return $query->getResultArray();
    } 

    public function getFacturaById($id_venta){
        $db = \Config\Database::connect();
        $builder = $db->table('facturas');
    
        $builder->select('*');
        
        $builder->join('usuarios', 'usuarios.id_usuario = facturas.id_usuario');
        $query = $builder->where('facturas.id_venta', $id_venta);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
?>