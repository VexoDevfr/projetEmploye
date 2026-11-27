<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\Secteur;
use Illuminate\Database\QueryException;
class SecteurService
{
    public function getListSecteurs()
    {
        try {
            $liste = Secteur::query()->select()->orderBy('id_secteur')->get();
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }
}
?>
