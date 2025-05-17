<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{route('category.update',$category->id)}}" method="POST">
    @method('PUT')
    @csrf
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="{{$category->name}}"><br>
 
  <input type="submit" value="Submit">
</form> 
 
</body>
</html>