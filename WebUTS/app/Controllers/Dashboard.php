<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        if($session->get('logged_in')){
            echo view('dashboard/header');
            echo "<h1>Welcome back, ".$session->get('user_name')."</h1>";
            echo view('dashboard/footer');
            // echo view('dashboard/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}