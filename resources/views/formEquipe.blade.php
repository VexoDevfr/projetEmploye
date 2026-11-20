@extends("layouts.master")

@section('content')
    <form method="POST" action="{{ url('validerEquipe')}}">
        {{ csrf_field() }}

        <h1>@if ($equipe->numEqu) Fiche @else Ajout @endif d'une équipe</h1>
        <input type="hidden" name="id" value="{{ $equipe->numEqu }}">
        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Code : </label>
                <div class="col-md-6">
                    <input type="text" name="code" value="{{ $equipe->code }}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Libellé :</label>
                <div class="col-md-6">
                    <input type="text" name="libelle" value="{{ $equipe->libelle }}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Secteur : </label>
                <div class="col-md-6">
                    <input type="text" name="secteur" value="{{ $equipe->secteur }}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie ?')) window.location='{{ url('/') }}' ">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection


