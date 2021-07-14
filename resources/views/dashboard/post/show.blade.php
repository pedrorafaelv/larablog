
@extends('dashboard.master')
@section('content')
    


    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" readonly name="title" id="title" class="form-control" value="{{$post->title}}" placeholder="Título del Post" aria-describedby="title">
       
    </div>
    <div class="form-group">
        <label for="url_limpia">Url limpia</label>
        <input type="text" readonly name="url_clean" id="url_clean" class="form-control"  value="{{$post->url_clean}}" placeholder="Url Limpia" aria-describedby="url_clean">
        
        </div> 
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea readonly name="content" id="content" rows="3" class=" ckeditor form-control"  placeholder="Contenido" > {{$post->content}}</textarea>
     
    </div>   

    

@endsection