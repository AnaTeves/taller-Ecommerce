<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFactura_model extends Model{

    protected $table      = 'detalle_factura';
    protected $primaryKey = 'id_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_venta', 'id_producto', 'detalle_cantidad', 'detalle_precio'];

    protected $useTimestamps = false;
    protected $createdField  = '' ;//'created_at';
    protected $updatedField  = '' ;//'updated_at';
    protected $deletedField  = '' ;//'deleted_at';

    protected $validationRules    = [

    ];

    protected $validationMessages = [
 
    ];
    protected $skipValidation = false;

    public function getDetalleFactura($id) {
        
        $db = \Config\Database::connect();
        $builder = $db->table('detalle_factura');
        $builder->select('*');
        
        //$builder->join('detalle_venta', 'detalle_venta.id_venta = venta.id_venta');
        //$builder->join('gabinetes', 'gabinetes.gabinete_id = detalle_venta.id_producto');
        $builder->join('productos', 'productos.id_producto = detalle_factura.id_producto');
        $query= $builder->where('id_factura', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }   
    
    public function getDetallesByVentaId($id_venta) {
        $db = \Config\Database::connect();
        $builder = $db->table('detalle_factura');
    
        $builder->select('*');
        
        $builder->join('productos', 'detalle_factura.id_producto = productos.id_producto');
        $query = $builder->where('detalle_factura.id_venta', $id_venta);
        $query = $builder->get();
        return $query->getResultArray();
    }
             
}