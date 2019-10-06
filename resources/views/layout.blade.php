<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ENSAS Admin Dashboard</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
	  .nav {
	    margin-top: 40px;
	  }
  </style>
</head>
<body>
  <div class="container">
  	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link active" href="{{ route('departement.index')}}">Departements</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="{{ route('prof.index')}}">Profs</a>
	  </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('responsable.index')}}">Responsable</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('coordinateur.index')}}">Coordinateurs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('filiere.index')}}">Filieres</a>
    </li>
	</ul>
    @yield('content')
  </div>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script>
    // Confirm delete
    $(document).on('submit', '.delete', function(){
        return confirm("Are you sure about deleting this item?");
    });

    // Delete with Ajax
    $(".deleteRecord").click(function(){
      var id = $(this).data("id");
      var token = $(this).data("token");
      $.ajax(
      {
          url: "prof/"+id,
          type: 'DELETE',
          data: {
              "id": id,
              "_token": token,
          },
          success: function (data){
            $('#msg').html(data).fadeIn('slow');
            $('#msg').html("Prof deleted successfully").fadeIn('slow')
            $('#msg').delay(5000).fadeOut('slow');
          }
      });
    });
  </script>
</body>
</html>