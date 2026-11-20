<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Services\EmployeService;
use Illuminate\Http\Request;
use Exception;

class EmployeController extends Controller
{

    public function listEmployes(){
        try {
            $service = new EmployeService();
            $employes = $service->getListEmployes();
            return view('listEmployes', compact('employes'));
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }

    }

    public function addEmploye()
    {
        try {
            $employe = new Employe();
            return view('formEmploye', compact('employe'));
        }   catch (Exception $exception) {
            return  view('error', compact('exception'));
        }

    }

    public function validEmploye(Request $request)
    {
        try {
            $id = $request->input('id');
            if ($id) {
                $service = new EmployeService();
                $employe = $service->getEmploye($id);
            } else {
                $employe = new Employe();
            }
            $employe->civilite = $request->input('civi');
            $employe->prenom = $request->input('prenom');
            $employe->nom = $request->input('nom');
            $pwd = $request->input('pwd');
            if (strlen($pwd) > 0) {
                $employe->pwd = password_hash($request->input('pwd'), PASSWORD_DEFAULT);
            }
            $employe->profil = $request->input('profil');
            $employe->interet = $request->input('interet');
            $employe->equipe = $request->input('equipe');
            $employe->message = $request->input('msg');

            $service = new EmployeService();
            $service-> saveEmploye($employe);

            return view('home');
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }

    }

    public function editEmploye($id)
    {
        try {
            $service = new EmployeService();
            $employe = $service ->getEmploye($id);
            return view('formEmploye', compact('employe'));
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }
    }
}
