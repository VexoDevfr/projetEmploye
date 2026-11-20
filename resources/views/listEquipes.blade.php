@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des équipes</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Numéro</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Secteur</th>
        </tr>
        </thead>
        @foreach($equipes as $equ)
            <tr>
                <td>{{$equ->numEqu}}</td>
                <td>{{$equ->code}}</td>
                <td>{{$equ->libelle}}</td>
                <td>{{$equ->secteur}}</td>
                <td><a href="{{ url('/editerEquipe/'.$equ->numEqu) }}">Afficher</a></td>
            </tr>
        @endforeach
    </table>
@endsection
