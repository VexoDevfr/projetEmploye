<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Services\EquipeService;
use Illuminate\Http\Request;
use Exception;

class EquipeController extends Controller
{

    public function listEquipes(){
        try {
            $equipe = new EquipeService();
            $equipes = $equipe->getListEquipes();
            return view('listEquipes', compact('equipes'));
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }
    }

    public function addEquipe()
    {
        try {
            $equipe = new Equipe();
            return view('formEquipe', compact('equipe'));
        }   catch (Exception $exception) {
            return  view('error', compact('exception'));
        }

    }

    public function validEquipe(Request $request)
    {
        try {
            $id = $request->input('id');
            if ($id) {
                $service = new EquipeService();
                $equipe = $service->getEquipe($id);
            } else {
                $equipe = new Equipe();
            }
            $equipe->code = $request->input('code');
            $equipe->libelle = $request->input('libelle');
            $equipe->secteur = $request->input('secteur');
            $service = new EquipeService();
            $service-> saveEquipe($equipe);

            return view('home');
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }

    }
    public function editEquipe($id)
    {
        try {
            $service = new EquipeService();
            $equipe = $service ->getEquipe($id);
            return view('formEquipe', compact('equipe'));
        } catch (Exception $exception) {
            return  view('error', compact('exception'));
        }
    }
}
