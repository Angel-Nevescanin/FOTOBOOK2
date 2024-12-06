<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController{

    protected $usuarioModel;

    function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }

    public function login()
    {
        return view('login');  // Asegúrate de que esta vista sea la que contiene el formulario.
    }

    public function validarLogin()
    {
        // Obtener datos del formulario
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validación básica (puedes agregar más validación aquí)
        if (!$email || !$password) {
            return redirect()->to('/login')->with('error', 'Correo y contraseña son requeridos');
        }

        // Instanciar el modelo de usuario
        $model = new UsuarioModel();

        // Verificar si el usuario existe y la contraseña es correcta
        $usuario = $model->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Establecer sesión (deberías tener configurado un sistema de sesión)
            session()->set('is_logged_in', true);
            session()->set('nombre', $usuario['nombre']);
            
            return redirect()->to('/');  // Redirige a la página de inicio o dashboard
        } else {
            return redirect()->to('/login')->with('error', 'Credenciales inválidas');
        }
    }

    //normalmente esta lista de usuarios (VIEW)
    public function index (){
        //crear, buscar, editar, eliminar usuarios

        $usuarios = $this->usuarioModel-> findAll();

        $data = array(
            "usuarios" => $usuarios
        );

        return view("usuarios/index",$data); //$usuarios

    
    }

    //Informacion de un usuario (VIEW)
    public function show($id){

        $usuario = $this->usuarioModel->find($id);

        $data = array( "usuario" => $usuario );

        return view("usuarios/show", $data);
    }

    //Formulario para crear usuario (VIEW)
    public function create(){

        return view("usuarios/create");
    }

    //Codigo para guardar usuario en la b Base de Datos "DB" (redirect -> index)
    public function store(){
       $data = array(
            "nombre" => $this->request->getPost("nombre"),
            "telefono" => $this->request->getPost("telefono"),
            "correo" => $this->request->getPost("correo"),
            "password" => $this->request->getPost("password")
        );

        $this->usuarioModel->save($data);

        return redirect()->to("/usuarios");
    }

    //Formulario para editar usuario (VIEW)
    public function edit($id){
        //buscamos al usuario a editar
        $usuario = $this->usuarioModel->find($id);

        //creamos el data que se le pasara al view
        $data = array(
            "usuario" =>$usuario
        );

        //retornamos la vista edit que esta en la carpeta usuario
        return view("usuarios/edit", $data);

    }

    //Codigo para actualizar usuario (redirect -> view)
    public function update($id){
        
        $data = array(
            "nombre" => $this->request->getPost("nombre"),
            "telefono" => $this->request->getPost("telefono"),
            "correo" => $this->request->getPost("correo"),
            "password" => $this->request->getPost("password")
        );
        $this->usuarioModel->update($id,$data);

        return redirect()->to("/usuarios/$id");
    }

    //Codigo para eliminar un usuario de la Base de Datos "DB" (redirect -> index)
    public function delete($id){
        
        $this->usuarioModel->delete($id);
        return redirect()->to("/usuarios");

    }
}