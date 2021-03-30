@extends('dashboard.master')

@section('content')


@include('dashboard.partials.validation-error')

<form action="{{route('post.update',$post->id)}}" method="POST">
    @method('PUT')
    @include('dashboard.post._form')
</form>
<br>


<form action="{{ route('post.image',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col">
            <input type="submit" value="SUBIR"  class="btn btn-primary">
        </div>
    </div>  
</form>

<div class="row mt-4">
    @foreach ($post->images as $image)
        <div class="col-3">
            <img class="w-100" src="{{$image->getImageUrl()}}">
            <a class="float-left btn btn-success btn-sm mt-1" href="{{route('post.image-download',$image->id)}}">Descargar</a>
            <form action="{{route('post.image-delete',$image->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button  class=" float-right btn btn-danger btn-sm mt-1" type="submit">BORRAR</button>
            </form>
        </div>
    @endforeach
</div>
@endsection