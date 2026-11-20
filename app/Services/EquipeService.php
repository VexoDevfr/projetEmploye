<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\Equipe;
use Illuminate\Database\QueryException;
class EquipeService
{
    public function getListEquipes()
    {
        try {
            $liste = Equipe::query()->select()->orderBy('numEqu')->get();
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }

    public function saveEquipe(Equipe $equipe)
    {
        try {
            $equipe->save();
        } catch (QueryException $exception) {
            $userMessage = "Impossible de sauvegarder cette équipe";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function getEquipe($id)
    {
        try {
            $equipe = Equipe::query()->find($id);
            return $equipe;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
}
