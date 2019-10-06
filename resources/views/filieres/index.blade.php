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
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Titre</td>
          <td>Image</td>
          <td>Departement</td>
          <td>Responsable</td>
          <td>Coordinateur</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($filieres as $filiere)
        <tr>
            <td>{{$filiere->id}}</td>
            <td>{{$filiere->titre}}</td>
            <td><img src="{{ url('/') }}/filieres/images/{{$filiere->image}}" height="40" width="60" alt="No Image"></td>
            <td>{{$filiere->departement->titre}}</td>
            <td>{{$filiere->responsable->nom}} {{$filiere->responsable->prenom}}</td>
            <td>{{$filiere->coordinateur->nom}} {{$filiere->coordinateur->prenom}}</td>
            <td><a href="{{ route('filiere.show',$filiere->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('filiere.edit',$filiere->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form class="delete" action="{{ route('filiere.destroy', $filiere->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $filieres->links() }}
<div>
@endsection
