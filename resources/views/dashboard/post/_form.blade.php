    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" class="form-control" value="{{old('title', $post->title )}}" placeholder="Título del Post" aria-describedby="title">
        @error('title')
           <small id="title" class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="url_limpia">Url limpia</label>
        <input type="text" name="url_clean" id="url_clean" class="form-control"  value="{{old('url_clean', $post->url_clean)}}" placeholder="Url Limpia" aria-describedby="url_clean">
        @error('url-limpia')
          <small id="url_clean" class="text-danger" {{$message}}</small>
        @enderror
    </div> 

    <div class="form-group">
        <label for="Categoria">Catgoria</label>
        <select  class="form-control" name="category_id" >
            @foreach ($categories as $title=>$id)
              <option {{$post->category_id == $id? 'selected= "selected"': ''}} value="{{$id }}" id="category_id" >{{$title}}</option>
            @endforeach
        </select>       
        @error('categoria')
           <small id="category_id" class="text-danger" {{$message}}</small>
        @enderror
    </div> 
        
    <div class="form-group">
        <label for="Posted">Posted</label>
        <select  class="form-control" name="posted" id="posted">
           @include('dashboard.partials.option_yes_not', ['val'=>$post->posted])
        </select>       
        @error('posted')
          <small id="posted" class="text-danger" {{$message}}</small>
        @enderror
    </div> 

    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea name="content" id="content" rows="3" class="ckeditor form-control"  placeholder="Contenido" > {{old('content', $post->content)}}</textarea>
        @error('content')
          <small class="text-danger" >{{$message}}</small>
        @enderror
    </div>   
    <input type="submit"  class= "btn btn-primary" value="enviar">
    


    