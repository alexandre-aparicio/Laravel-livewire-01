<!-- Update Marca Modal -->
<div wire:ignore.self class="modal fade" id="updateMarcaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Marcas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="updateMarca">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="name">Nombre</label>
                  <input type="text" wire:model.defer="name" class="form-control">
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror           
               </div>
               <div class="mb-3">
                  <label for="slug">Slug</label>
                  <input type="text" wire:model.defer="slug" class="form-control">
                  @error('slug') <small class="text-danger">{{ $message }}</small> @enderror 
               </div>
               <div class="mb-3">
                  <label for="status">Status</label>
                  <input type="checkbox" wire:model.defer="status" >
                  @error('status') <small class="text-danger">{{ $message }}</small> @enderror 
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>


<!--Add Marca Modal -->
<div wire:ignore.self class="modal fade" id="addMarcaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Marcas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="storeMarca">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="name">Nombre</label>
                  <input type="text" wire:model.defer="name" class="form-control">
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror           
               </div>
               <div class="mb-3">
                  <label for="slug">Slug</label>
                  <input type="text" wire:model.defer="slug" class="form-control">
                  @error('slug') <small class="text-danger">{{ $message }}</small> @enderror 
               </div>
               <div class="mb-3">
                  <label for="status">Status</label>
                  <input type="checkbox" wire:model.defer="status" >
                  @error('status') <small class="text-danger">{{ $message }}</small> @enderror 
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Create</button>
            </div>
         </form>
      </div>
   </div>
</div>