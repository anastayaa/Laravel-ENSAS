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
    Modifier Filiere
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
      <form method="post" action="{{ route('departement.update', $departement->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
              <label for="titre">Titre:</label>
              <input type="text" class="form-control" name="titre" value="{{$filiere->titre}}" />
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <td><img src="{{ url('/') }}/filieres/images/{{$filiere->image}}" height="40" width="60" alt="No Image"></td>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="departement_id">Deparetement:</label>
              <select class="form-control" name="departement_id">
                @foreach ($departements as $departement)
                  @if($filiere->departement->titre==$departement->titre)
                    <option value="{{$departement->id}}" selected>{{ $departement->titre }}</option>
                  @else
                    <option value="{{$departement->id}}">{{ $departement->titre }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="departement_id">Responsable:</label>
              <select class="form-control" name="departement_id">
                @foreach ($responsables as $responsable)
                  @if($filiere->responsable==$responsable)
                    <option value="{{$responsable->id}}" selected>{{ $responsable->nom $responsable->prenom }}</option>
                  @else
                    <option value="{{$responsable->id}}">{{ $responsable->nom $responsable->prenom }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="departement_id">Coordinateur:</label>
              <select class="form-control" name="departement_id">
                @foreach ($coordinateurs as $coordinateur)
                  @if($filiere->coordinateur==$coordinateur)
                    <option value="{{$coordinateur->id}}" selected>{{ $coordinateur->nom $coordinateur->prenom }}</option>
                  @else
                    <option value="{{$coordinateur->id}}">{{ $coordinateur->nom $coordinateur->prenom }}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection