@section('title', __('Books'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="float-left">
						<h4><i class="fas fa-book"></i> Lista De Libros</h4>
					</div>
					<div class="mt-10"></div>
					@if (session()->has('message'))
					<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
					@endif
					<div class="mt-10"></div>
					<div style="display: flex; justify-content: space-between;">
						<div class="col-5">
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-search"></i></div>
								</div>
								<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Libro">
							</div>
						</div>

						<div class="col-2">
							<select wire:model='perPage' class="custom-select my-1 mr-sm-2">
								<option value="5"> 5 Por Pagina</option>
								<option value="10"> 10 Por Pagina</option>
								<option value="25"> 25 Por Pagina</option>
								<option value="50"> 50 Por Pagina</option>
							</select>
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-plus"></i> Registrar Libro
						</div>
					</div>
				</div>

				<div class="card-body">
					
					  @include('livewire.books.update')
					
					  @include('livewire.books.create')
					

					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr>
									<td>#</td>
									<th>Code</th>
									<th>Name</th>
									<th width="120">Image</th>
									<th>Author</th>
									<th>Price</th>
									<th>Format B</th>
									<th>Editorial</th>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
								@foreach($books as $row)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $row->code }}</td>
									<td>{{ $row->name }}</td>
									<td><img class="rounded mx-auto" src="{{ asset('storage/files/'.$row->image) }}" width="100" height="100"></td>
									<td>{{ $row->author }}</td>
									<td>{{ number_format($row->price, 2) }}</td>
									<td>{{ $row->format_b }}</td>
									<td>{{ $row->editorial }}</td>
									<td width="90">
										<div class="btn-group">
											<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a data-toggle="modal" data-target="#updateModal" class="dropdown-item"  wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
												<a data-target="#destroyModal" data-toggle="modal" class="dropdown-item" href="#myModal" wire:click="deleteId({{$row->id}})"><i class="fa fa-trash"></i> Eliminar</a>
											</div>
										</div>
									</td>
									@endforeach
							</tbody>
						</table>
						@if($books->count())
						<div class="bg-white px-4 py-3">
							{{ $books->links() }}
						</div>
						@else
						<div class="bg-white px-4 py-3 text-grey-500">
							!No hay resultados para la Busqueda {{$keyWord}}
						</div>
						@endif
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