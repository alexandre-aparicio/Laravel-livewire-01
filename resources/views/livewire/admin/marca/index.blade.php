<div>
    @include('livewire.admin.marca.modal-form')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="cart">
                <div class="cart-header mb-4">
                    <h4>Marcas
                        <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addMarcaModal">Añadir Marca</a>
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
                        @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->name }}</td>
                            <td>{{ $marca->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="#" wire:click="editMarca({{$marca->id}})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateMarcaModal">Editar</a>
                                <a href="#" wire:click="deleteMarca({{$marca->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Borrar</a>
                            </td>
                        </tr>                            
                        @endforeach 
                                             
                    
                    </tbody>
                        
                    </table>
                    <div>
                       {{ $marcas->links() }} 
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {
     $("#addMarcaModal").modal('hide'); 
     $("#updateMarcaModal").modal('hide'); 
     console.log("Has hecho Click")               
})
</script>

@endpush
