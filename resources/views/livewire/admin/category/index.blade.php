<div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form wire:submit.prevent="destroyCategory">
      <div class="modal-body">
        <h6>Estas seguro que quieres borrar esta categoría?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Borrar</button>
      </div>
      </form>

    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="cart">
            <div class="cart-header mb-4">
                <h4>Categorias
                    <a href="{{ url('admin/categoria/crear') }}" class="btn btn-primary float-end">Añadir categoria</a>
                </h4>

            </div>
            <div class="cart-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Staus</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>{{ $categoria->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ url('/admin/categoria/'. $categoria->id.'/edit') }}" class="btn btn-success">Editar</a>
                                <a href="#" wire:click="deleteCategory({{$categoria->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Borrar</a>
                            </td>
                        </tr>                            
                        @endforeach 
                                             
                    
                    </tbody>
                </table>
                <div>
                    {{ $categorias->links() }}
                </div>
                
            </div>
        </div>
    </div>
</div>    
</div>

@push('script')

<script>
    window.addEventListener('closeModal', event => {
     $("#deleteModal").modal('hide'); 
     console.log("Has hecho Click")               
})
</script>

@endpush
