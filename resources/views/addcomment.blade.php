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
<body class = "container mt-4">
        <h1> Add your comment here</h1>
    <form action="{{route('comment.store')}}" method="POST">
        @csrf
       
        <label for="comment">Content:</label><br>
        <textarea class="form-control" id="name" name="content"></textarea><br>


         <label for="post_id">Select Post:</label>
        <select name="post_id" id="post_id" class="form-control" required>
            <option value="">-- Select Post --</option>
            @foreach ($posts as $post)
                <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                    {{ $post->title }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>