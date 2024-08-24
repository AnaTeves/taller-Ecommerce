<?php
namespace App\Libraries;

// Creacion de libreria Cart para funcionalidades basicas de carrito -->
class Cart {
    protected $cart = [];

    // Metodo constructor
    public function __construct() {
        $this->cart = session()->get('cart') ?? [];
    }

    // Inserta un nuevo producto
    public function insert($item) {
        // Verifica si el producto ya está en el carrito
        foreach ($this->cart as $rowid => $existingItem) {
            if ($existingItem['id'] == $item['id']) {
            // Incrementa la cantidad del producto existente
            $this->cart[$rowid]['qty'] += $item['qty'];
            $this->save();
            return;
        }
    }
    $rowid = uniqid();
    $this->cart[$rowid] = $item;
    $this->save();
        // $rowid = md5($item['id'] . serialize($item['options']));
        // if (isset($this->cart[$rowid])) {
        //     $this->cart[$rowid]['qty'] += $item['qty'];
        // } else {
        //     $item['rowid'] = $rowid;
        //     $this->cart[$rowid] = $item;
        // }
        // $this->save();
    }

    // Se usa para modificar
    public function update($rowid, $qty) {
        if (isset($this->cart[$rowid])) {
            $this->cart[$rowid]['qty'] = $qty;
            $this->save();
        }
    }

    // En la clase Cart (simplificado para demostración)
    public function remove($id) {
        foreach ($this->cart as $rowid => $item) {
            if ($item['id'] == $id) {
                unset($this->cart[$rowid]);
                $this->save();
                break; // Importante: Romper el bucle una vez que se elimina el producto
        }
    }
}


    // Extrae lo contenido en el carrito
    public function contents() {
        return $this->cart;
    }

    // Retorna la cantidad total de productos
    public function totalProductos() {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['qty'];
        }
        return $total;
    }

    // Retorna la sumatoria de los precios de los productos
    public function total() {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }

    public function destroy() {
        $this->cart = [];
        $this->save();
    }

    protected function save() {
        session()->set('cart', $this->cart);
    }
}