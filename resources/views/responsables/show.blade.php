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
<div class="uper">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Description</td>
          <td>Image</td>
          <td>Departement</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$responsable->id}}</td>
            <td>{{$responsable->nom}}</td>
            <td>{{$responsable->prenom}}</td>
            <td>{{$responsable->description}}</td>
            <td><img src="{{ url('/') }}/responsables/images/{{$responsable->image}}" height="40" width="60" alt="No Image"></td>
            <td>{{$responsable->departement->titre}}</td>
            <td><a href="{{ route('responsable.show',$responsable->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('responsable.edit',$responsable->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form class="delete" action="{{ route('responsable.destroy', $responsable->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
  </table>
<div>
@endsection
