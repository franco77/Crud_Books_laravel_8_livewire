<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id_customer"></label>
                        <select wire:model="id_customer" class="form-control select2" id="id_customer" placeholder="CLIENTE">@error('id_customer') <span class="error text-danger">{{ $message }}</span> @enderror

                            @foreach($customers as $c)
                            <option value="{{ $c->id }}">{{ $c->ic }} - {{ $c->first_name }} {{ $c->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_book"></label>
                        <select wire:model="id_book" class="form-control select2" id="id_book" placeholder="Libro">@error('id_book') <span class="error text-danger">{{ $message }}</span> @enderror

                            @foreach($books as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="loan_date"></label>
                        <input wire:model="loan_date" type="text" class="form-control" id="loan_date" placeholder="Fecha Prestamo">@error('loan_date') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="notes"></label>
                        <input wire:model="notes" type="text" class="form-control" id="notes" placeholder="Notas">@error('notes') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status"></label>
                        <input wire:model="status" type="text" class="form-control" id="status" placeholder="Estado">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>