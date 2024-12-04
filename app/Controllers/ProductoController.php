<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController {

    protected $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    // Mostrar todos los productos
    public function index() {
        $productos = $this->productoModel->findAll();

        $data = [
            'productos' => $productos
        ];

        return view('productos/index', $data);
    }

    // Mostrar formulario para crear producto
    public function create() {
        return view('productos/create');
    }

    // Guardar nuevo producto
    public function store() {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $this->request->getPost('imagen'),
            'usuario_id' => session()->get('id') // Suponiendo que usas sesión para obtener el ID de usuario
        ];

        $this->productoModel->save($data);
        return redirect()->to('/productos');
    }

    // Mostrar formulario para editar un producto
    public function edit($id) {
        $producto = $this->productoModel->find($id);

        $data = [
            'producto' => $producto
        ];

        return view('productos/edit', $data);
    }

    // Actualizar producto
    public function update($id) {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $this->request->getPost('imagen')
        ];

        $this->productoModel->update($id, $data);
        return redirect()->to("/productos/$id");
    }

    // Eliminar producto
    public function delete($id) {
        $this->productoModel->delete($id);
        return redirect()->to('/productos');
    }

    // Mostrar detalles de un producto
    public function show($id) {
        $producto = $this->productoModel->find($id);

        $data = [
            'producto' => $producto
        ];

        return view('productos/show', $data);
    }
}
