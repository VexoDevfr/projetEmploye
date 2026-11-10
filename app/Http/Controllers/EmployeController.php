<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Services\EmployeService;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function listEmployes(){
        $service = new EmployeService();
        $employes = $service->getListEmployes();
        return view('listEmployes', compact('employes'));
    }

    public function addEmploye()
    {
        $employe = new Employe();
        return view('formEmploye', compact('employe'));
    }

    public function validEmploye(Request $request)
    {
        $employe = new Employe();
        $employe->civilite = $request->input('civi');
        $employe->prenom = $request->input('prenom');
        $employe->nom = $request->input('nom');
        $employe->pwd = password_hash($request->input('pwd'), PASSWORD_DEFAULT);
        $employe->profil = $request->input('profil');
        $employe->interet = $request->input('interet');
        $employe->message = $request->input('msg');

        $service = new EmployeService();
        $service-> saveEmploye($employe);

        return view('home');
    }

    public function editEmploye($id)
    {
        $service = new EmployeService();
        $employe = $service ->getEmploye($id);
        return view('formEmploye', compact('employe'));
    }
}
