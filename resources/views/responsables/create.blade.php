@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('responsable.index')}}">Responsables</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('responsable.create')}}">New Responsable</a>
    </li>
</ul>
<div class="card uper">
  <div class="card-header">
    Ajouter Responsable
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
      <form method="post" action="{{ route('responsable.store') }}" enctype="multipart/form-data">
              @csrf
          <div class="form-group">
              <label for="nom">Nom:</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="prenom">Prenom:</label>
              <input type="text" class="form-control" name="prenom"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
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
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection