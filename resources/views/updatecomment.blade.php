<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Update your comment here</h1>
    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
        @method("PUT")
        @csrf
       
        <label for="comment">Content:</label><br>
        <textarea class="form-control" id="name" name="content">{{old('content' , $comment->content)}}</textarea><br>


         <label for="post_id">Select Post:</label>
        <select name="post_id" id="post_id" class="form-control" required>
            <option value="">-- Select Post --</option>
            @foreach ($posts as $post)
                <option value="{{ $post->id }}" {{ old('post_id', $selectedPostId ?? '') == $post->id ? 'selected' : '' }}>
                    {{ $post->title }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="update">
    </form>
</body>
</html>