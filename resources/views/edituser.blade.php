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
<body class = "container">
    <form action="{{route('users.update',$user->id)}}" method="POST">
    @method("PUT")
        @csrf

  <div class="container">
    <h1>update your profile</h1>
    

    <label for="name"><b>Name</b></label>
    <input type="text" class = "form-control" name="name" id="name" value = "{{ old('name', $user->name) }}" required>

    <label for="email"><b>Email</b></label>
    <input type="email" class = "form-control" name="email" id="email" value = "{{ old('email', $user->email) }}" required>

    <label for="role"><b>Role:</b></label>
    <input type="text"class = "form-control" name="role" id="role" value = "{{ old('role', $user->role) }}" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" class = "form-control"  name="password" autocomplete="new-password" >

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" class = "form-control" name="password_confirmation" id="psw-repeat" autocomplete="new-password" >
    <hr>
    
    <button type="submit" class="registerbtn">Update</button>
  </div>
  
 
</form>
</body>
</html>