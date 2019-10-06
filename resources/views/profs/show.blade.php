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
            <td>{{$prof->id}}</td>
            <td>{{$prof->nom}}</td>
            <td>{{$prof->prenom}}</td>
            <td>{{$prof->description}}</td>
            <td><img src="{{ url('/') }}/profs/images/{{$prof->image}}" height="40" width="60" alt="No Image"></td>
            <td>{{$prof->departement->titre}}</td>
            <td><a href="{{ route('prof.show',$prof->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('prof.edit',$prof->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form class="delete" action="{{ route('prof.destroy', $prof->id)}}" method="post">
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
