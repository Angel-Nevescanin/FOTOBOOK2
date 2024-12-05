public function update($id)
{
    $data = [
        'Nombre' => $this->request->getPost('nombre'),
        'Descripcion' => $this->request->getPost('descripcion'),
        'Precio' => $this->request->getPost('precio'),
    ];

    // Manejo de la imagen
    $imagen = $this->request->getFile('imagen');
    if ($imagen && $imagen->isValid()) {
        $nombreImagen = $imagen->getRandomName();
        $imagen->move('uploads', $nombreImagen);
        $data['Imagen'] = $nombreImagen;
    }

    // Validar y actualizar el producto
    if (!$this->productoModel->update($id, $data)) {
        return redirect()->back()->withInput()->with('errors', $this->productoModel->errors());
    }

    return redirect()->to('/productos')->with('success', 'Producto actualizado con éxito.');
}
