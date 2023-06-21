<?php

namespace App\Controllers;

use App\Models\TiempoModel;
use App\Models\VehiculoModel;
use App\Models\ConductorModel;

class Tiempos extends BaseController
{
    public function exito()
    {
        return view('tiempos/exito');
    }

    public function tabla()
{
    // Crear una instancia del modelo de tiempos
    $tiemposModel = new TiempoModel();

    // Obtener los tiempos de la base de datos
    $tiempos = $tiemposModel->findAll();

    // Verificar si existen tiempos
    if ($tiempos) {
        // Crear instancias de los modelos de vehículo y conductor
        $vehiculoModel = new VehiculoModel();
        $conductorModel = new ConductorModel();

        // Obtener todos los vehículos y conductores de la base de datos
        $vehiculos = $vehiculoModel->findAll();
        $conductores = $conductorModel->findAll();

        // Pasar los datos de los tiempos, vehículos y conductores a la vista
        return view('tiempos/tabla', ['tiempos' => $tiempos, 'vehiculos' => $vehiculos, 'conductores' => $conductores]);
} else {
        // Manejar el caso cuando no se encuentren tiempos
        return view('tiempos/tabla', ['tiempos' => $tiempos, 'vehiculos' => $vehiculos, 'conductores' => $conductores]);
    }
}

public function seleccionar()
{
    // Crear instancias de los modelos de vehículo y conductor
    $vehiculoModel = new VehiculoModel();
    $conductorModel = new ConductorModel();

    // Obtener todos los vehículos y conductores de la base de datos
    $vehiculos = $vehiculoModel->findAll();
    $conductores = $conductorModel->findAll();

    // Pasar los datos de vehículos y conductores a la vista
    $data = [
        'vehiculos' => $vehiculos,
        'conductores' => $conductores,
    ];

    // Cargar la vista de selección
    return view('seleccionar', $data);
}

public function guardar()
{
    // Obtener los datos enviados por el formulario
    $vehiculoId = $this->request->getPost('vehiculo');
    $conductorId = $this->request->getPost('conductor');
    $tiempo = $this->request->getPost('tiempo');

    // Aquí puedes procesar y guardar los datos según tus necesidades

    // Redirigir a la página de éxito
    return redirect()->to('/tiempos/exito');
}

    public function reportarTiempo()
    {
        // Validar los datos enviados por el formulario
        $validationRules = [
            'id_vehiculo' => 'required',
            'id_conductor' => 'required',
            'placa'=> 'required', 
            'hora_inicio' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            // Si la validación falla, mostrar errores y redirigir al formulario
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Obtener los datos enviados por el formulario
        $idVehiculo = $this->request->getPost('id_vehiculo');
        $idConductor = $this->request->getPost('id_conductor');
        $placVehiculo = $this->request->getPost('placa');
        $horaInicio = $this->request->getPost('hora_inicio');

        // Crear una instancia del modelo de tiempos
        $tiemposModel = new TiemposModel();

        // Guardar el registro de tiempo en la base de datos
        $tiemposModel->insert([
            'id_vehiculo' => $idVehiculo,
            'id_conductor' => $idConductor,
            'placa'=> $placVehiculo,
            'hora_inicio' => $horaInicio,
        ]);

        // Redirigir a la página de éxito
        return redirect()->to('/tiempos/exito');
    }

    public function mostrarTabla()
    {
        // Crear instancias de los modelos de vehículo y conductor
        $vehiculoModel = new VehiculoModel();
        $conductorModel = new ConductorModel();

        // Obtener todos los registros de tiempos
        $tiemposModel = new TiemposModel();
        $tiempos = $tiemposModel->findAll();

        // Obtener los datos de vehículos y conductores correspondientes a los tiempos
        $vehiculos = $vehiculoModel->findAll();
        $conductores = $conductorModel->findAll();

        // Pasar los datos a la vista
        $data = [
            'tiempos' => $tiempos,
            'vehiculos' => $vehiculos,
            'conductores' => $conductores,
        ];

        // Cargar la vista de la tabla
        return view('tiempos/tabla', $data);
    }
}
