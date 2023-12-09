@extends('layouts.admin')

@section('title')
	Posts
@endsection
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
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
							<h4>Posts DataTable</h4>
							<div class="card-header-form">
								<a href="{{ route('admin.posts.create')}}" class="btn btn-primary float-right">Create new Post</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Post title</th>
											<th>Post Category</th>
											<th>Image</th>
											<th>Updated Date</th>
											<th>Views</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($posts as $post)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{ $post->title_uz}}</td>
											<td>{{$post->category->name_uz}}</td>
											<td>
												<img alt="image" src="/img/posts/{{$post->image}}" width="35">
											</td>
											<td>{{$post->created_at}}</td>
											<td>
												<div class="badge badge-success badge-shadow">{{ $post->view }}</div>
											</td>
											<td>
												<a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Detail</a>
												<a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a>
												<form method="POST" action="{{route('admin.posts.destroy', $post->id)}}" class="d-inline">
													@csrf
													@method('delete')
													<button  type="submit" class="btn btn-danger" onclick="return confirm('Are you want delete this post !!!')"><i class="fas fa-times"></i> Delete</button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	
@endsection


@section('js')
	 <!-- JS Libraies -->
	 <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
	 <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	 <script src="/admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
	 <!-- Page Specific JS File -->
	 <script src="/admin/assets/js/page/datatables.js"></script>
@endsection