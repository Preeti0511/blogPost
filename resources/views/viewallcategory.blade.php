<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body class="container">
   @include('alerts')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
      <a href="{{route('category.create')}}" class="btn btn-primary">Add</a>
      {{-- <div class="row">
        <div class="col-8">
          @if(session('success'))
        <div class="alert alert-success mt-4">
        {{session('success')}}
        </div>
      @endif
        </div>
      </div> --}}
      @foreach ($category as $cat)
      <tr>
      <th>{{$cat->id}}</th>
      <td>{{$cat->name}}</td>

      <td><a href="{{route('category.edit', $cat->id)}}">EDIT</a>

        <form action="{{route('category.destroy', $cat->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" value="Delete">
        </form>
      </tr>
    @endforeach


    </tbody>
  </table>
</body>

</html>