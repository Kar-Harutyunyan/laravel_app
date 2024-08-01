<x-authlayout>
    <form action="{{route('auth.register')}}" method="POST">
        @csrf
        @method('POST')
       <div class="form_group">
            <label for="name">Name</label>
            <input type="text" placeholder="name" value="{{old('name')}}" id="name" name="name">
            @error('name')
                <p>{{$message}}</p>
            @enderror
        </div>
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
    
        <div class="form_group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" placeholder="Password Confirmation" id="password_confirm" name="password_confirmation">
          @error('password_confirmation')
               <p>{{$message}}</p>
          @enderror
        </div>
      <button>Register</button>
        <a href="{{route("auth.login")}}">Already have an account?</a>
    </form>
</x-authlayout>