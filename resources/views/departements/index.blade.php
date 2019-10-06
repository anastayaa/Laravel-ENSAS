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
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($departements as $departement)
        <tr>
            <td>{{$departement->id}}</td>
            <td>{{$departement->titre}}</td>
            <td><img src="{{ url('/') }}/departements/images/{{$departement->image}}" height="40" width="60" alt="No Image"></td>
            <td><a href="{{ route('departement.show',$departement->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('departement.edit',$departement->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form class="delete" action="{{ route('departement.destroy', $departement->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $departements->links() }}
<div>
@endsection
