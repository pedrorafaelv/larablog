    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name', $user->name )}}" placeholder="Nombre de usuario" aria-describedby="name">
        @error('user')
        <small id="user" class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="surname">Apellido</label>
        <input type="text" name="surname" id="surname" class="form-control"  value="{{old('surname', $user->surname)}}" placeholder="Surname" aria-describedby="surname">
        @error('surname')
        <small id="surname" class="text-danger" {{$message}}</small>
            @enderror
   </div> 
   <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control"  value="{{old('email', $user->email)}}" placeholder="Email" aria-describedby="email">
        @error('email')
        <small id="email" class="text-danger" {{$message}}</small>
        @enderror
   </div> 
   @if ($passw)
       
   <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control"  value="{{old('password', $user->password)}}" placeholder="Password" aria-describedby="Password">
    @error('password')
    <small id="password" class="text-danger" {{$message}}</small>
    @enderror
</div> 
   @endif
    <input type="submit"  class="btn btn-primary" value="enviar">
