<div>
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="cart">
            <div class="cart-header">
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
                                <a href="" class="btn btn-danger">Borrar</a>
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
