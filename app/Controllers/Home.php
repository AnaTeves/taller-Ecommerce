<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Header').view('Nav').view('Principal').view('Footer');
    }

    public function quienesSomos() {
        return view('Header').view('Nav').view('QuienesSomos').view('Footer');
    }

    public function comercializacion() {
        return view('Header').view('Nav').view('Comercializacion').view('Footer');
    }

    public function contacto() {
        return view('Header').view('Nav').view('Contacto').view('Footer');
    }

    public function terminosyusos(){
        return view('Header').view('Nav').view('TerminosYusos').view('Footer');
    }
}
