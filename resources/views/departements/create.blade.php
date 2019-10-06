@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('departement.index')}}">Departements</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('departement.create')}}">New Departement</a>
    </li>
  </ul>
<div class="card uper">
  <div class="card-header">
    Ajouter departement
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
      <form method="post" action="{{ route('departement.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="titre">Titre:</label>
              <input type="text" class="form-control" name="titre"/>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection