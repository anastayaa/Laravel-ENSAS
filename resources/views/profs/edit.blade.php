@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('prof.index')}}">Profs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('prof.create')}}">New Prof</a>
    </li>
</ul>
<div class="card uper">
  <div class="card-header">
    Ajouter Prof
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
      <form method="post" action="{{ route('prof.update', $prof->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="nom">Nom:</label>
              <input type="text" class="form-control" name="nom" value="{{$prof->nom}}" />
          </div>
          <div class="form-group">
              <label for="prenom">Prenom:</label>
              <input type="text" class="form-control" name="prenom" value="{{$prof->prenom}}"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$prof->description}}"/>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <td><img src="{{ url('/') }}/profs/images/{{$prof->image}}" height="40" width="60" alt="No Image"></td>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="departement_id">Deparetement:</label>
              <select class="form-control" name="departement_id">
                @foreach ($departements as $departement)
                  @if($prof->departement->titre==$departement->titre)
                    <option value="{{$departement->id}}" selected>{{ $departement->titre }}</option>
                  @else
                    <option value="{{$departement->id}}">{{ $departement->titre }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection