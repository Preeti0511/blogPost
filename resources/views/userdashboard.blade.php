<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
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
  text-decoration: none;
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
</head>

<body>
   
<ul>
  <li><a href="{{route('users.show',Auth::id())}}" > See Profile</a></li>
  <li><a href="{{route('post.show',Auth::id())}}" >My Posts </a></li>
  <li><a href="{{route('comment.show', Auth::id())}}" > My Comments</a></li>
  <li><a href="{{route('users.edit',Auth::id())}}"> Edit Profile</a></li>
   <li><a href="{{route('seeallpost')}}" > See All Post</a></li>
  <li><a href="{{route('logout')}}" > Logout</a></li>

</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
   
 <div class="container mt-4 "> 
    <h1> welcome {{Auth::user()->name}}</h1>
  <div class="row bg-success">
    <div class="col bg-info text-center p-5">
     Posts <br> {{$userPostsCount}}</h5>
    </div>
    <div class="col bg-info text-center p-5">
        Comments <br> {{$userCommentsCount}}</h5>
    </div>
    <div class="col bg-info text-center p-5">
         Approved Comments<br>{{$approvedCommentsCount}}</h5>
    </div>
  </div>
</div>
    



    
</div>
 
</body>

</html>
