@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('filiere.index')}}">Filieres</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('filiere.create')}}">New Filiere</a>
    </li>
</ul>
<div class="card uper">
  <div class="card-header">
    Ajouter Filiere
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('filiere.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="titre">Titre:</label>
              <input type="text" class="form-control" name="titre"/>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="departement_id">Deparetement:</label>
              <select class="form-control" name="departement_id">
                @foreach ($departements as $departement)
                  <option value="{{$departement->id}}">{{ $departement->titre }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="responsable_id">Responsable:</label>
              <select class="form-control" name="responsable_id">
                @foreach ($responsables as $responsable)
                  <option value="{{$responsable->id}}">{{ $responsable->nom }} {{ $responsable->prenom }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="coordinateur_id">Coordinateur:</label>
              <select class="form-control" name="coordinateur_id">
                @foreach ($coordinateurs as $coordinateur)
                  <option value="{{$coordinateur->id}}">{{ $coordinateur->nom }} {{ $coordinateur->prenom }}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection