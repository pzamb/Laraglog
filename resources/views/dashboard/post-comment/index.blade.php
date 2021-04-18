@extends('dashboard.master')

@section('content')

@if (count($postComments) > 0)
<table class="table">
    <thead>
        <tr>
            <td>
                id
            </td>
            <td>
                Título
            </td>
            <td>
                Aprovado
            </td>
            <td>
                Usuario
            </td>
            <td>
                Creacion
            </td>
            <td>
                Actualizacion
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($postComments as $postComment)
        <tr>
            <td>
               {{$postComment->id}}
            </td>
            <td>
                {{$postComment->title}}
            </td>
            <td>
                {{$postComment->approved}}
            </td>
            <td>
                {{$postComment->user->name}}
            </td>
            <td>
                {{$postComment->created_at->format('d-m-Y')}}
            </td>
            <td>
                {{$postComment->updated_at->format('d-m-Y')}}
            </td>
            <td>
                <a href="{{route('post-comment.show',$postComment->id)}}" class="btn btn-primary">Ver</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$postComment->id}}">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$postComments->links()}}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>¿Seguro que deseas borrar el registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form id="formDelete" method="POST" action="{{route('post-comment.destroy',0)}}" data-action="{{route('post-comment.destroy',0)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
window.onload= function(){
$('#deleteModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Eliminarás el POST: ' + id)

  action = $('#formDelete').attr('data-action').slice(0,-1)
  action +=id

  $('#formDelete').attr('action',action)
})
}
</script>
    
@else

<h1>NO EXISTEN COMENTARIOS PARA ESTE POST</h1>

@endif
@endsection