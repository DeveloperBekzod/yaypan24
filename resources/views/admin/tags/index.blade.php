@extends('layouts.admin')

@section('title')
	Tags
@endsection

@section('content')
	<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-10">
					<div class="card">
						@if (session('message'))
							<div class="alert alert-success alert-dismissible show fade">
								<div class="alert-body">
									<button class="close" data-dismiss="alert">
										<span>×</span>
									</button>
									{{session('message')}}
								</div>
							</div>
						@endif
						<div class="card-header">
							<h4>Categories Table</h4>
							<div class="card-header-form">
								<a href="{{route('admin.tags.create')}}" class="btn btn-primary float-right">Create new tag</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tbody><tr>
										<th>#</th>
										<th>Tag Name Uz</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
									@forelse ($tags as $tag)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$tag->name_uz}}</td>
											<td>{{$tag->slug_uz}}</td>
											<td>
												<a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary">Detail</a>
												<a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
												<form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="d-inline">
													@csrf
													@method('delete')
													<button type="submit" onclick=" confirm('Are You shure delete tag !!!')"  class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</button>
												</form>
											</td>
										</tr>
										@empty
											<tr>
												<th colspan="5" class="text-center">No Tags !!!</th>
											</tr>
										@endforelse
									</tbody></table>
							</div>
						</div>
						<div class="card-footer text-right">
							<nav class="d-inline-block">
								{{$tags->links()}}
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection