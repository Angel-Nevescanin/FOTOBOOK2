<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController {
    protected $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    // Listar todos los Productos
    public function index() {
        $productos = $this->productoModel->findAll();

        return view(
            'productos/index', ['productos' => $productos]);
    }
      // Mostrar detalles del producto
      public function show($id) {
        $producto = $this->productoModel->find($id);

        if (!$producto) {
            return redirect()->to('/productos')->with('error', 'Producto no encontrado.');
        }

        return view('productos/show', ['producto' => $producto]);
    }

   

    // Mostrar formulario para crear producto
    public function create() {
        return view('productos/create');
    }

    // Guardar un nuevo producto
    public function store() {
        // Validar los datos del formulario
        if (!$this->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required|decimal',
            'Imagen' => 'is_image[Imagen]|max_size[Imagen,2048]' // Asegúrate de que sea una imagen y no pese más de 2MB
        ])) {
            // Si la validación falla, redirige de vuelta con los errores y los datos ingresados
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Recopilar los datos del formulario
        $data = array(
            'Nombre' => $this->request->getPost('Nombre'),
            'Descripcion' => $this->request->getPost('Descripcion'),
            'Precio' => $this->request->getPost('Precio'),
            'Imagen' => null, // Imagen aún no se ha procesado
            'usuario_id' => 1 // Asignar un usuario predeterminado (por ejemplo, el usuario con id=1)
        );
    
        // Manejar subida de imagen
        $imagen = $this->request->getFile('Imagen');
        if ($imagen && $imagen->isValid()) {
            $newName = $imagen->getRandomName();
            $imagen->move('uploads/', $newName);
            $data['Imagen'] = $newName;
        }
    
        // Guardar el nuevo producto
        if (!$this->productoModel->save($data)) {
            return redirect()->back()->with('errors', $this->productoModel->errors());
        }
    
        // Redirigir a la lista de productos después de guardar
        return redirect()->to('/productos')->with('success', 'Producto creado correctamente.');
    }
    
    

    // Mostrar formulario de edición
    public function edit($id) {
        $producto = $this->productoModel->find($id);

        if (!$producto) {
            return redirect()->to('/productos')->with('error', 'Producto no encontrado.');
        }

        return view('productos/edit', ['producto' => $producto]);
    }

    // Actualizar producto
    public function update($id) {
        $producto = $this->productoModel->find($id);
    
        if (!$producto) {
            return redirect()->to('/productos')->with('error', 'Producto no encontrado.');
        }
    
        $data = [
            'Nombre' => $this->request->getPost('Nombre'),
            'Descripcion' => $this->request->getPost('Descripcion'),
            'Precio' => $this->request->getPost('Precio'),
        ];
    
        // Manejo de imagen
        $imagen = $this->request->getFile('Imagen');
        if ($imagen && $imagen->isValid()) {
            $newName = $imagen->getRandomName();
            $imagen->move('uploads/', $newName);
            $data['Imagen'] = $newName;
    
            // Eliminar la imagen anterior
            if (!empty($producto['Imagen']) && file_exists('uploads/' . $producto['Imagen'])) {
                unlink('uploads/' . $producto['Imagen']);
            }
        }
    
        if (!$this->productoModel->update($id, $data)) {
            return redirect()->back()->with('errors', $this->productoModel->errors());
        }
    
        return redirect()->to('/productos')->with('success', 'Producto actualizado correctamente.');
    }
    

    // Eliminar producto
    public function delete($id) {
        $producto = $this->productoModel->find($id);

        if ($producto && !empty($producto['Imagen']) && file_exists('uploads/' . $producto['Imagen'])) {
            unlink('uploads/' . $producto['Imagen']);
        }

        $this->productoModel->delete($id);

        return redirect()->to('/productos')->with('success', 'Producto eliminado correctamente.');
    }

  
}