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
<body>
<div class="container mt-4">
    <h2>All Posts</h2>

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <h6>Comments:</h6>
                        @forelse ($post->comments as $comment)
                            <p>• {{ $comment->content }}</p>
                        @empty
                            <p>No comments yet.</p>
                        @endforelse
                    </div>
                     <a href="{{ route('comment.create')}}" class="btn btn-primary">Add a comment</a>
                </div>
            </div>
        @empty
            <p>No posts found.</p>
        @endforelse
    </div>
</div>

</body>
</html>