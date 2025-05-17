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
        <th scope="col">Email</th>
        <th scope="col">Role</th>

      </tr>
    </thead>
    <tbody>

      @foreach ($users as $user)
      <tr>
      <th>{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role}}</td>
      <td>
        @can('isAdmin')

      <form action="{{route('users.destroy', $user->id)}}" method="POST">
      @method('DELETE')
      @csrf
      <input type="submit" value="Delete">
      </form>
      @else
      <a href="{{route('users.edit', $user->id)}}">EDIT</a>

      @endcan
      </tr>
    @endforeach


    </tbody>
  </table>
</body>

</html>