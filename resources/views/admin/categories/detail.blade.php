@extends('layouts.admin')

@section('title')
	Category detail
@endsection
{{-- @dd($category) --}}
@section('content')
	<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h4>Category Details</h4>
							<div class="card-header-form">
								<a href="{{route('admin.categories.create')}}" class="btn btn-primary float-right">Create new category</a>
								<a href="{{route('admin.categories.index')}}" class="btn mr-2 btn-dark float-right">Go Back</a>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Column</th>
										<th scope="col">Values</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>ID:</td>
										<td>{{$category->id}}</td>
									</tr>
									<tr>
										<td>Name (Uz)</td>
										<td>{{$category->name_uz}}</td>
									</tr>
									<tr>
										<td>Name (Ru)</td>
										<td>{{$category->name_ru}}</td>
									</tr>
									<tr>
										<td>Meta title (Ru)</td>
										<td>{{$category->meta_title_ru}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection