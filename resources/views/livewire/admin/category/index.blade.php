<div>
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="cart">
            <div class="card-header">
                <h4>Categorias
                    <a href="{{ url('admin/categoria/crear') }}" class="btn btn-primary float-end">Añadir categoria</a>
                </h4>
            </div>
        </div>
    </div>
</div>    
</div>
