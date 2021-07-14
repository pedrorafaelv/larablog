
@extends('dashboard.master')
@section('content')
    
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" readonly name="title" id="title" class="form-control" value="{{$category->title}}" placeholder="Título del Post" aria-describedby="title">
       
    </div>
    <div class="form-group">
        <label for="url_limpia">Url limpia</label>
        <input type="text" readonly name="url_clean" id="url_clean" class="form-control"  value="{{$category->url_clean}}" placeholder="Url Limpia" aria-describedby="url_clean">
        
        </div> 
       
@endsection