
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="{{old('title',$post->title)}}">
        @error('title')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_clean">URL Limpia:</label>
        <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{old('url_clean',$post->url_clean)}}">
    </div>

    <div class="form-group">
        <label for="category_id">Categorias</label>
        <select name="category_id" class="form-control" id="category_id">
            @foreach ($categories as $title => $id)
                <option {{$post->category_id == $id ? "selected='selected'" : ""}} value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for=posted>Posted</label>
        <select name="posted" class="form-control" id="posted">
            @include('dashboard.partials.option-yes-not')
        </select>
    </div>

    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control" type="text" name="content" id="content" rows="3" >{{old('content',$post->content)}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>