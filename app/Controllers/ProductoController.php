<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController{

    protected $productoModel;

    function __construct(){
        $this->productoModel = new ProductoModel();
    }

    // Lista de productos (VIEW)
    public function index(){
        $productos = $this->productoModel->findAll();

        $data = array(
            "productos" => $productos
        );

        return view("productos/index", $data);
    }

    // Información de un producto (VIEW)
    public function show($id){
        $producto = $this->productoModel->find($id);

        $data = array("producto" => $producto);

        return view("productos/show", $data);
    }

    // Formulario para crear un producto (VIEW)
    public function create(){
        return view("productos/create");
    }

    // Guardar producto en la base de datos (redirect -> index)
    public function store(){
        $file = $this->request->getFile("imagen");
        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $imageName);
        }

        $data = array(
            "Nombre" => $this->request->getPost("nombre"),
            "Descripcion" => $this->request->getPost("descripcion"),
            "Precio" => $this->request->getPost("precio"),
            "Imagen" => isset($imageName) ? $imageName : null,
            "usuario_id" => $this->request->getPost("usuario_id")
        );

        $this->productoModel->save($data);

        return redirect()->to("/productos");
    }

    // Formulario para editar un producto (VIEW)
    public function edit($id){
        $producto = $this->productoModel->find($id);

        $data = array(
            "producto" => $producto
        );

        return view("productos/edit", $data);
    }

    // Actualizar producto (redirect -> view)
    public function update($id){
        $file = $this->request->getFile("imagen");
        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $imageName);
        }

        $data = array(
            "Nombre" => $this->request->getPost("nombre"),
            "Descripcion" => $this->request->getPost("descripcion"),
            "Precio" => $this->request->getPost("precio"),
            "Imagen" => isset($imageName) ? $imageName : null,
            "usuario_id" => $this->request->getPost("usuario_id")
        );

        $this->productoModel->update($id, $data);

        return redirect()->to("/productos/$id");
    }

    // Eliminar un producto de la base de datos (redirect -> index)
    public function delete($id){
        $this->productoModel->delete($id);
        return redirect()->to("/productos");
    }
}
