<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    //
    public function produtos() {
        echo "<h1> Produtos </h1>";
        echo "<ol>";
        echo "<li> Tomate </li>";
        echo "<li> Tomate </li>";
        echo "<li> Tomate </li>";
        echo "<ol>";
    }
}
