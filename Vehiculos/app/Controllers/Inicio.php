<?php

namespace App\Controllers;

use App\Models\InicioModel;
use CodeIgniter\Controller;

class Inicio extends Controller
{
    public function index()
    {
        $model = new InicioModel();
        $data['vehiculos'] = $model->findAll();

        return view('inicio', $data);
    }

    public function ingreso()
    {
        // Verifica si se envió el formulario de ingreso
        if ($this->request->getMethod() === 'post') {
            $model = new InicioModel();

            // Recupera los datos del formulario
            $marca = $this->request->getPost('marca');
            $modelo = $this->request->getPost('modelo');
            $placa = $this->request->getPost('placa');

            // Inserta el nuevo vehículo en la base de datos con el tiempo de ingreso
            $model->insert(['marca' => $marca, 'modelo' => $modelo, 'placa' => $placa, 'tiempo_ingreso' => time()]);

            // Redirige a la página de inicio después del ingreso exitoso
            return redirect()->to('/vehiculo');
        }

        // Muestra el formulario de ingreso de vehículo
        return view('vehiculos/ingreso');
    }

    public function salida($id)
    {
        $model = new InicioModel();

        // Recupera el vehículo de la base de datos según su ID
        $vehiculo = $model->find($id);

        // Verifica si el vehículo existe y tiene un tiempo de ingreso registrado
        if ($vehiculo && $vehiculo['tiempo_ingreso']) {
            // Calcula el tiempo de estadía en segundos
            $tiempo_ingreso = $vehiculo['tiempo_ingreso'];
            $tiempo_salida = time();
            $tiempo_estadia = $tiempo_salida - $tiempo_ingreso;

            // Actualiza el vehículo en la base de datos con el tiempo de estadía
            $model->update($id, ['tiempo_salida' => $tiempo_salida, 'tiempo_estadia' => $tiempo_estadia]);

            // Redirige a la página de inicio después de la salida exitosa
            return redirect()->to('/vehiculo');
        }

        // Redirige a la página de inicio si el vehículo no existe o no tiene un tiempo de ingreso registrado
        return redirect()->to('/vehiculo');
    }
}
