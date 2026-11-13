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
            $liste = Employe::query()->select()->orderBy('nom')->get();
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }

    public function saveEmploye(Employe $employe)
    {
        $employe->save();
    }

    public function getEmploye($id)
    {
        $employe = Employe::query()->find($id);
        return $employe;
    }
}
