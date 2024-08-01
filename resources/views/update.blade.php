<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Create Post</title>
</head>

<body>

    <h2>Update Post</h2>


    <form action="{{route('post.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form_group">
            <label for="name">Name</label>
            <input type="text" id="name" value="{{$post->name}}" name="name">
        </div>
        <div class="form_group">
            <label for="description">Description</label>
            <input type="text" id="descriiption" value="{{$post->description}}" name="description">
        </div>
        <button>Update Post</button>
    </form>

</body>

</html>

