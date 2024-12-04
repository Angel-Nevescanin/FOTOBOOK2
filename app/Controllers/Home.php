<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    //imprimir algo
    public function saludar(){
        echo "<h1>Hola mundo</h1>";
    }

    public function saludar2( $nombre){
        echo "<h1>Hola $nombre</h1>";
    }

    public function saludar3($nombre, $edad){
        echo "Hola $nombre";
        echo ($edad>= 18)? "Eres mayor de edad" : "eres menor de edad";
    }

    public function calculadora($num1, $num2, $operacion) {
        echo "Numero 1: $num1 <br>";
        echo "Numero 2: $num2 <br>";
        echo "<hr>";

        switch ($operacion) {
            case 's': echo "<br>suma: ".( $num1 + $num2); break;
            case 'r': echo "<br>resta: ".( $num1 - $num2); break;
            case 'm': echo "<br>multiplicacion: ".( $num1 * $num2); break;
            case 'd': echo "<br>division: ".( $num1 / $num2); break;
            default: echo "Esa operacion no existe )="; break;
        }

    }

    public function plantilla(){

        return view("plantilla");

    }

}
