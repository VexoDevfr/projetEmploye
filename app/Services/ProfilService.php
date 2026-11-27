<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\Equipe;
use App\Models\Profil;
use Illuminate\Database\QueryException;
class ProfilService
{
    public function getListProfils()
    {
        try {
            $liste = Profil::query()->select()->orderBy('id_profil')->get();
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }
}
?>
