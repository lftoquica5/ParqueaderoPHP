<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Model\UsuarioModel;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    
    public function index()
    {

        return view('login');
    }

    public function login()
    {
        // Procesa los datos de inicio de sesión y verifica las credenciales
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Verifica las credenciales utilizando el modelo
        $usuModel = new \App\Models\UsuarioModel();
        $loggedIn = $usuModel->verifyCredentials($username, $password);
    
        if ($loggedIn) {
            // Inicia la sesión del usuario
            $session = \Config\Services::session();
            $session->set('logged_in', true);
    
            // Imprime el estado de la sesión
            var_dump($session->get('logged_in'));
    
            // Redirige a la página de inicio después del inicio de sesión exitoso
            return redirect()->to(site_url('conductores'));
        } else {
            // Muestra el formulario de inicio de sesión con un mensaje de error
            $data['error'] = 'Verificar usuario &/o Contraseña';
            return view('login', $data);
        }
    }
    
}

