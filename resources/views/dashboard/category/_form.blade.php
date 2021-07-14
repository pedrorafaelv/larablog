    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" class="form-control" value="{{old('title', $category->title )}}" placeholder="Título de la Categoría" aria-describedby="title">
        @error('title')
        <small id="title" class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_limpia">Url limpia</label>
        <input type="text" name="url_clean" id="url_clean" class="form-control"  value="{{old('url_clean', $category->url_clean)}}" placeholder="Url Limpia" aria-describedby="url_clean">
        @error('url-limpia')
        <small id="url_clean" class="text-danger" {{$message}}</small>
            @enderror
        </div> 
        
    <input type="submit" value="enviar">
