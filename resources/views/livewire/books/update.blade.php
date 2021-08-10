<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="code"></label>
                                <input wire:model="code" type="text" class="form-control" id="code" placeholder="Code">@error('code') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="name"></label>
                                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                    <img id="blah" src="{{ asset('storage/files/'.$image) }}" class="img-thumbnail" alt="preview image" style="max-height: 100px;">
                </div>
                <div class="form-group">
                        <div class="custom-file">
                        <input wire:model="image" type="file" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="imgInp">Choose file</label>
                        </div>@error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                       
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="author"></label>
                                <input wire:model="author" type="text" class="form-control" id="author" placeholder="Author Del Libro">@error('author') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price"></label>
                                <input wire:model="price" type="text" class="form-control" id="price" placeholder="Precio">@error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="year"></label>
                                <input wire:model="year" type="text" class="form-control" id="year" placeholder="Año De Publicacion">@error('year') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="n_pages"></label>
                                <input wire:model="n_pages" type="text" class="form-control" id="n_pages" placeholder="Numero De Paginas">@error('n_pages') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="format_b"></label>
                        <input wire:model="format_b" type="text" class="form-control" id="format_b" placeholder="Formato Del Libro">@error('format_b') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="editorial"></label>
                        <input wire:model="editorial" type="text" class="form-control" id="editorial" placeholder="Editorial">@error('editorial') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description"></label>
                        <input wire:model="description" type="text" class="form-control" id="description" placeholder="Descripcion">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>