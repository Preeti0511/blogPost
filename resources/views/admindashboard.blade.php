<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <style>
    body {
      margin: 0;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 25%;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    li a {
      display: block;
      color: #000;
      padding: 8px 16px;
      margin: 5px 0px;
      text-decoration: none;
      background-color: #04AA6D
    }

    li a.active {
      background-color: #04AA6D;
      color: white;
    }

    li a:hover:not(.active) {
      background-color: #555;
      color: white;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <ul>
    <li><a href="{{route('category.index')}}"> Category Management</a></li>
    <li><a href="{{route('seeusers')}}"> User Management</a></li>
    <li> <a href="{{route('post.index')}}"> Post Management</a></li>
    <li><a href="{{route('comment.index')}}">Comment Management</a></li>
    <li><a href="{{route('seedetails.show', Auth::id())}}"> See Profile</a></li>
    <li> <a href="{{route('users.edit', Auth::id())}}"> Update Profile</a></li>
    <li><a href="{{route('adminlogout')}}"> Logout</a>
    </li>
  </ul>

  <div style="margin-left:25%;padding:1px 16px;height:1000px; ">
    <h1 class="pt-4">Welcome {{Auth::user()->name}}</h1>
     @include('alerts') 
    <div class="container text-center ">
      <div class="row">
        <div class="col bg-info m-2 p-4">
          <h5>Total Comments <br>
            {{$totalComments}}</h5>
        </div>
        <div class="col bg-info m-2 p-4">
          <h5> Posts <br> {{$totalPosts}}</h5>
        </div>
        <div class="col bg-info m-2 p-4">
          <h5> Users <br>{{$totalUsers}}</h5>
        </div>
        <div class="col bg-info m-2 p-4">
          <h5> Pending Commnets <br> {{$pendingComments}}</h5>
        </div>
        <div class="col bg-info m-2 p-4">
          <h5>Total Category <br> {{$totalCategory}}</h5>
        </div>
        <div class="col bg-info m-2 p-4">
          <h5>Approved Comments <br> {{$approvedComments}} </h5>
        </div>
      </div>
    </div>






  </div>



</body>

</html>