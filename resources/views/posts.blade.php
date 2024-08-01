<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav>
            <img src="https://www.shutterstock.com/image-vector/old-school-eagle-mascot-head-600nw-2426542287.jpg"
                alt="logo">
            @auth
                <div class="info_container">
                    <h3>{{ auth()->user()->name }}</h3>
                    <a href="{{ route('posts.create') }}">Create Post</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                </div>
            @endauth
            @guest
                <a href="{{ route('auth.showLogin') }}">Login</a>
            @endguest
        </nav>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <ul class="posts_container">
            @foreach ($posts as $post)
                <li class="post">

                    <a class="go_profile" href="{{ route('post.show', $post->id) }}">
                        Profile ➡️
                    </a>
                    <p>
                        {{ $post->name }}
                    </p>
                    <p>
                        {{ $post->description }}
                    </p>

                    @auth
                        @if (auth()->user()->id == $post->user->id)
                            <div class="buttons_container">
                                <a class="btn" href="{{ route('post.edit', $post->id) }}">Update</a>
                                <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                    @guest
                        <a class="btn" href="{{ route('auth.login') }}">Login</a>
                    @endguest
                </li>
            @endforeach
        </ul>

    </div>

    <footer>
        <p>Lorem ipsum dolor sit.</p>
        <p>Lorem ipsum dolor sit.</p>
        <p>Lorem ipsum dolor sit.</p>
</body>

</html>
