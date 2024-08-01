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
              <ul>
               <li>
                   <h2>
                       {{ $post->name }}
                   </h2>
                   <p>
                       {{ $post->description }}
                   </p>
                   @auth
                   <a>Update</a>
                   <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button>Delete</button>
                   </form>   
                   @endauth
               </li>
           </ul>
      </body>
      </html>
