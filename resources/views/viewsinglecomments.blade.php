<!DOCTYPE html>
<html lang="en">

<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="container">

    <a href="{{route('comment.create')}}" class="btn btn-primary"> ADD button</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Post Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($comments as $comment)
                <tr>
                    <th>{{$comment->id}}</th>
                    <th>{{$comment->post->title}}</th>
                    <th>{{$comment->user->name}}</th>
                    <th>{{$comment->content}}</th>
                      <th>{{$comment->status}}</th>
                   
                    <td><a href="{{route('comment.edit', $comment->id)}}">EDIT</a>
@can('isAdmin')
                        <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete">
                        </form>
                        @endcan
                </tr>
            @endforeach


        </tbody>
    </table>
</body>

</html>