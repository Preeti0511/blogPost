<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class = "container mt-5">
   <form action="{{route('category.store')}}" method="POST">
    @csrf
  <label for="name" >Name:</label><br>
  <input type="text" id="name" name="name" value="" class = "form-control"><br>
 
  <input type="submit" value="Submit">
</form> 
 
</body>
</html>