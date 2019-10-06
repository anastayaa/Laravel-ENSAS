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
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
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
        @foreach($profs as $prof)
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
                <!--<form class="delete" action="{{ route('prof.destroy', $prof->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" data-id="{{$prof->id}}" type="submit" data-token="{{ csrf_token() }}">Delete</button>
                </form>-->
                <button class="deleteRecord btn btn-danger" data-id="{{$prof->id}}" type="submit" data-token="{{ csrf_token() }}" id="deleteRecord">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $profs->links() }}
  <div id='msg'></div>
<div>
@endsection

