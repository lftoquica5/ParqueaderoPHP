<?php

namespace App\Controllers;

use App\Models\VehiculoModel;

class Vehiculos extends BaseController
{
    public function exito()
    {
        return view('vehiculos/exito');
    }
    
    public function agregar()
    {
        // Validar y procesar los datos recibidos del formulario de agregar vehículo
        if ($this->request->getMethod() === 'post') {
            // Obtener los datos del formulario
            $marca = $this->request->getPost('marca');
            $modelo = $this->request->getPost('modelo');
            $placa = $this->request->getPost('placa');

            // Validar los datos

            // Crear una instancia del modelo de vehículos
            $vehiculoModel = new VehiculoModel();

            // Guardar los datos en la base de datos
            $data = [
                'marca' => $marca,
                'modelo' => $modelo,
                'placa' => $placa,
            ];

            $vehiculoModel->insert($data);

            // Redireccionar a la página de éxito o a otra página deseada
            return redirect()->to('/vehiculos/exito');
        }

        // Cargar la vista del formulario de agregar vehículo
        return view('vehiculos/agregar');
    }

    public function guardar()
{
    // Obtén los datos enviados por el formulario
    $marca = $this->request->getPost('marca');
    $modelo = $this->request->getPost('modelo');
    $placa = $this->request->getPost('placa');

    // Valida los datos ingresados (puedes agregar más validaciones según tus necesidades)
    $validationRules = [
        'marca' => 'required',
        'modelo' => 'required|numeric',
        'placa' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        // Si la validación falla, muestra los mensajes de error y redirige de vuelta al formulario
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Crea una instancia del modelo de vehículos
    $vehiculoModel = new VehiculoModel();

    // Prepara los datos a insertar en la base de datos
    $data = [
        'marca' => $marca,
        'modelo' => $modelo,
        'placa' => $placa
    ];

    // Inserta los datos en la base de datos
    if ($vehiculoModel->insert($data)) {
        // Recupera todos los vehículos de la base de datos
        $vehiculos = $vehiculoModel->findAll();

        // Si la inserción fue exitosa, redirige a una página de éxito y pasa los vehículos como datos adicionales
        return view('vehiculos/exito', ['marca' => $marca, 'vehiculos' => $vehiculos ]);
    } else {
        // Si la inserción falló, muestra un mensaje de error
        return redirect()->back()->withInput()->with('error', 'Error al guardar el vehículo');
    }
}
}
