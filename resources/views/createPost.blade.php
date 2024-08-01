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

    <h2>Create Post</h2>


    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form_group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form_group">
            <label for="description">Description</label>
            <input type="text" id="descriiption" name="description">
        </div>
        <button>Create Post</button>
    </form>

</body>

</html>
