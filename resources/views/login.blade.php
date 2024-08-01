<x-authlayout>
    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form_group">
            <label for="email">Email</label>
            <input type="email" placeholder="email" value="{{old('email')}}" id="email" name="email">
           @error('email')
                <p>{{$message}}</p>
           @enderror
        </div>
        <div class="form_group">
            <label for="password">Password</label>
            <input type="password" placeholder="password"  id="password" name="password">
           @error('password')
                <p>{{$message}}</p>
           @enderror
        </div>
      <button>Login</button>
      <a href="{{route("auth.register")}}">Don't have an account?</a>
    </form>
</x-authlayout>