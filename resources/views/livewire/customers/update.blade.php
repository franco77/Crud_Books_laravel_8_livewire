<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">

                    <div class="form-group">
                        <label for="ic"></label>
                        <input wire:model="ic" type="text" class="form-control" id="ic" placeholder="Numero De Identificacion">@error('ic') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                    <div class="form-group">
                <label for="first_name"></label>
                <input wire:model="first_name" type="text" class="form-control" id="first_name" placeholder="First Name">@error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
                        </div>
                        <div class="col">
            <div class="form-group">
                <label for="last_name"></label>
                <input wire:model="last_name" type="text" class="form-control" id="last_name" placeholder="Last Name">@error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
                        </div>
                    </div>
                    
            <div class="form-group">
                <label for="email"></label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="phone"></label>
                <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Phone">@error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="address"></label>
                <input wire:model="address" type="text" class="form-control" id="address" placeholder="Address">@error('address') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
           

            <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input wire:model="gender" class="form-check-input" type="radio" id="gender" value="mujer">
                            <label class="form-check-label">Mujer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input wire:model="gender" class="form-check-input" type="radio" id="gender" value="hombre">
                            <label class="form-check-label">Hombre</label>
                        </div>
                        @error('gender') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>


            <div class="form-group">
                <label for="profile"></label>
                <textarea wire:model="profile" class="form-control" id="profile" placeholder="Profile"> </textarea>@error('profile') <span class="error text-danger">{{ $message }}</span> @enderror
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