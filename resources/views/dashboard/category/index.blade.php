
@extends('dashboard.master')
@section('content')


<div class="row">
<a  class="btn btn-success btn-sm mt-3 mb-3" href="{{route('category.create')}}">Crear</a>
    <table class="table">
     <thead>
         <td class="">
             Id
         </td>
         <td class="">   
             Titulo
         </td>    
         <td class="">
             Creado
         </td>
         <td class="">
             Actualizado
         </td>
         <td class="">
             Acciones
         </td>
     </thead>
     <tbody>
         @foreach ($categories as $category)
          <tr>
              <td class="">
                  {{$category->id}}
                </td>
                <td>   
                    {{$category->title}}
                </td>
               
                <td>
                    {{$category->created_at->format('d-M-Y')}} 
                </td>
                <td>
                    {{$category->updated_at->format('d-M-Y')}}
                </td>
                <td>
                    <a href="{{route('category.show', $category->id)}}" class="btn btn-primary">Ver</a>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Editar</a>
                    <button class= "btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}">Eliminar</button>
                </td>
            </tr>   
        @endforeach
        

        </tbody>
    </table>
    
    {{$categories->links()}}

    
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Eliminar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p> ¿ Esta seguro de eliminar el resistro seleccionado ? </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form id="formDelete" method="POST" action="{{ route('category.destroy', 0) }}" data-action="{{ route('category.destroy', 0) }}">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">Borrar</button>
              </div>
            </form>
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
                action= $("#formDelete").attr('data-action').slice(0,-1) 
                action +=id
                console.log(action)
                
                $("#formDelete").attr('action', action)
                var modal = $(this)
                modal.find('.modal-title').text('eliminaras la categoria ' + id)
            })
        }
            
    </script>
</div>
@endsection
