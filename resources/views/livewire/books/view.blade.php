@section('title', __('Books'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
								Book Listing </h4>
						</div>
						<div wire:poll.60s>
							<code>
								<h5>{{ now()->format('H:i:s') }} UTC</h5>
							</code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Books">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-plus"></i> Add Books
						</div>
					</div>
				</div>

				<div class="card-body">
					@include('livewire.books.create')
					@include('livewire.books.update')
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr>
									<td>#</td>
									<th>Code</th>
									<th>Name</th>
									<th>Image</th>
									<th>Author</th>
									<th>Price</th>
									<th>Format B</th>
									<th>Editorial</th>
									<td>ACTIONS</td>
								</tr>
							</thead>
							<tbody>
								@foreach($books as $row)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $row->code }}</td>
									<td>{{ $row->name }}</td>
									<td><img class="img-thumbnail" src="{{ asset('storage/files/'.$row->image) }}" width="80"></td>
									<td>{{ $row->author }}</td>
									<td>{{ $row->price }}</td>
									<td>{{ $row->format_b }}</td>
									<td>{{ $row->editorial }}</td>
									<td width="90">
										<div class="btn-group">
											<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Actions
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
												<!-- <a class="dropdown-item" onclick="confirm('Confirm Delete Book id {{$row->id}}? \nDeleted Books cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteId({{$row->id}})"><i class="fa fa-trash"></i> Delete </a> -->
												<a data-target="#destroyModal" data-toggle="modal" class="dropdown-item" href="#myModal" wire:click="deleteId({{$row->id}})"><i class="fa fa-trash"></i> Eliminar</a>
												
												
											</div>
										</div>
									</td>
									@endforeach
							</tbody>
						</table>
						{{ $books->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>



	
<!-- Modal -->

<div wire:ignore.self class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="destroyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true close-btn">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure want to delete?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
				<button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
			</div>
		</div>
	</div>
</div>




</div>








