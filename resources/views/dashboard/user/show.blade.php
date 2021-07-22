
@extends('dashboard.master')
@section('content')
    
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" readonly name="name" id="name" class="form-control" value="{{$user->name}}" placeholder="Nombre" aria-describedby="name"> 
    </div>
    <div class="form-group">
        <label for="surname">Apellido</label>
        <input type="text" readonly name="surname" id="surname" class="form-control"  value="{{$user->surname}}" placeholder="Apellido" aria-describedby="surname">   
    </div> 
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" readonly name="email" id="email" class="form-control" value="{{$user->email}}" placeholder="email" aria-describedby="email">   
    </div>
    <div class="form-group">
        <label for="rol">Rol</label>
        <input type="text" readonly name="rol" id="rol" class="form-control"  value="{{$user->rol->key}}" placeholder="Rol" aria-describedby="rol">   
    </div> 
       
@endsection