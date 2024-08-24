<?php
namespace App\Models;
use CodeIgniter\Model;

class Categoria_model extends Model{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false; //Con esta funcion se hacen las bajas lógicas 

    protected $allowedFields = ['categoria_descripcion', 'categoria_estado']; //Especifica los campos de la tabla que se pueden modificar. Cualquier campo que no aparezca en este array no se podra modificar

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function actualizarCategoria($id, $data){
        return $this->update($id, $data);
    }

    public function eliminarCategoria($id){
        $data = ['categoria_estado' => '0'];
        return $this->actualizarCategoria($id, $data);
    }

    public function activarCategoria($id){
        $data = ['categoria_estado' => '1'];
        return $this->actualizarCategoria($id, $data);
    }
}
?>