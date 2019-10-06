@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('coordinateur.index')}}">Coordinateurs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('coordinateur.create')}}">New Coordinateur</a>
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
            <td>{{$coordinateur->id}}</td>
            <td>{{$coordinateur->nom}}</td>
            <td>{{$coordinateur->prenom}}</td>
            <td>{{$coordinateur->description}}</td>
            <td><img src="{{ url('/') }}/coordinateurs/images/{{$coordinateur->image}}" height="40" width="60" alt="No Image"></td>
            <td>{{$coordinateur->departement->titre}}</td>
            <td><a href="{{ route('coordinateur.show',$coordinateur->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('coordinateur.edit',$coordinateur->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form class="delete" action="{{ route('coordinateur.destroy', $coordinateur->id)}}" method="post">
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
