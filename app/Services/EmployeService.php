<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\Employe;
use Illuminate\Database\QueryException;
class EmployeService
{
    public function getListEmployes()
    {
        try {
            $liste = Employe::query()
                ->select('employe.*', 'profil.libelle_profil')
                ->join('profil', 'profil.id_profil', '=', 'employe.profil')
                ->orderBy('numEmp')
                ->get();
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }

    public function saveEmploye(Employe $employe)
    {
        try {
            $employe->save();
        } catch (QueryException $exception) {
            $userMessage = "Impossible de sauvegarder cet employé";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function getEmploye($id)
    {
        try {
            $employe = Employe::query()->find($id);
            return $employe;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
}
