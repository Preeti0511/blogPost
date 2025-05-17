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
 @include('alerts') 
  <a href = "{{route('post.create')}}" class = "btn btn-primary"> ADD</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
     <th scope="col">Category</th> 
     <th scope="col">Image</th>
     
    </tr>
  </thead>
  <tbody>
  
     @foreach ($posts as $post)
      <tr>
      <th >{{$post->id}}</th>
      <th >{{$post->title}}</th>
      <th >{{$post->content}}</th>
      <th >{{$post->category->name}}</th>
      <th ><img src = "{{asset('storage/'.$post->image )}}" style = "width:100px" ></th>
      <td>
        @cannot('isAdmin')
        <a href = "{{route('post.edit',$post->id)}}">EDIT</a> 
         @endcannot
         <form action = "{{route('post.destroy',$post->id)}}" method = "POST">
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