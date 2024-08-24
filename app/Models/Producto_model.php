<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; //Con esta funcion se hacen las bajas lógicas 

    protected $allowedFields = ['producto_nombre','producto_descripcion' ,'producto_precio', 'producto_stock', 'producto_imagen', 'producto_estado', 'producto_categoria']; //Especifica los campos de la tabla que se pueden modificar. Cualquier campo que no aparezca en este array no se podra modificar

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getProductoAll() {
        $db = \Config\Database::connect();
        $builder = $db->table('productos');
        $builder->select('');
        $builder->join('categorias', 'categorias.id_categoria = productos.producto_categoria');
        $query = $builder->get();
        return $query->getResultArray();
    }
    
    public function actualizarProducto($id, $data){
        return $this->update($id, $data);
    }

    public function eliminarProducto($id){
        $data = ['producto_estado' => '0'];
        return $this->actualizarProducto($id, $data);
    }

    public function activarProducto($id){
        $data = ['producto_estado' => '1'];
        return $this->actualizarProducto($id, $data);
    }
}
?>