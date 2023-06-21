<?php

namespace App\Controllers;

use App\Models\ConductorModel;

class Conductores extends BaseController
{
    public function agregar()
    {
        
        return view('conductores/agregar');
    }

    public function exito()
    {
        return view('conductores/exito');
    }
    
    public function guardar()
    {
        // Obtén los datos enviados por el formulario
        $nombre = $this->request->getPost('nombre');
        $numeroLicencia = $this->request->getPost('licencia');

        // Valida los datos ingresados (puedes agregar más validaciones según tus necesidades)
        $validationRules = [
            'nombre' => 'required',
            'licencia' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Si la validación falla, muestra los mensajes de error y redirige de vuelta al formulario
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Crea una instancia del modelo de conductores
        $conductorModel = new ConductorModel();

        // Prepara los datos a insertar en la base de datos
        $data = [
            'nombre' => $nombre,
            'numero_licencia' => $numeroLicencia
        ];

        // Inserta los datos en la base de datos
        if ($conductorModel->insert($data)) {
            // Recupera todos los conductores de la base de datos
            $conductores = $conductorModel->findAll();

            // Si la inserción fue exitosa, redirige a una página de éxito y pasa los conductores como datos adicionales
            return view('conductores/exito', ['nombre' => $nombre, 'conductores' => $conductores]);
        } else {
            // Si la inserción falló, muestra un mensaje de error
            return redirect()->back()->withInput()->with('error', 'Error al guardar el conductor');
        }
    }
}




