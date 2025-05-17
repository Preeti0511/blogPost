      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Blog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class = "d-flex justify-content-center align-items-center vh-100">

    <div class="container text-center">
        <h1>Welcome to Our Blog!</h1>
        <p>Explore and share your thoughts with others.</p>

      
            <div class="auth-buttons">
              <a href = "{{route('login')}}" class="btn btn-primary">Login</a>   
                <a href = "{{route('register')}}" class="btn btn-primary">Register</a>
            </div>
  
            
       
    </div>

</body>
</html>
