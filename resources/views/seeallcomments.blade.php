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

<body class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Post Name</th>
                <th scope="col"> User Name</th>
                <th scope="col">Comment</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        
              
         <tbody>
            <a href="{{route('comment.create')}}" class="btn btn-primary">Add</a>
        @foreach ($posts as $post)
            @foreach ($post->comments as $comment)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ ucfirst($comment->status) }}</td>
                   <td>
    @can('isAdmin')
        <form action="{{ route('comments.toggle', $comment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')

            @if ($comment->status === 'approved')
                <button type="submit" class="btn btn-warning btn-sm">Set as Pending</button>
            @else
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            @endif
        </form>
    @endcan
</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
    </table>
</body>

</html>