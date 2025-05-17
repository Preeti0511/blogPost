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

<body class="container">
    <h1> Edit your post here</h1>
    <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
     
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <label for="title">Title:</label><br>
        <input type="text" class="form-control" value = "{{old('title', $post->title)}}" id="name" name="title" value=""><br>

        <label for="name">Content:</label><br>
        <input type="text" class="form-control" id="name" value = {{old('content', $post->content)}} name="content" value=""><br>

        <label for="category_id">Select Category:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value= "{{old('category_id', $post->category_id)}}"></option>
            @foreach ($categories as $category)
                 <option value="{{ $category->id }}"
            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
            @endforeach
        </select><br>
 <label for="image">Previous Selected image:</label><br><br>
     @if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="Previous Image" width="150">
@endif
<br><br>
        <label for="image">Upload new Image:</label><br>
        <input type="file" class="form-control" id="name" name="image" value=""><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>