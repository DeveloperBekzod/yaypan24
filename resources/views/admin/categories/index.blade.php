@extends('layouts.admin')

@section('title')
    Categories
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
                                        {{ session('message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="card-header">
                                <h4>Categories Table</h4>
                                @can('create category')
                                    <div class="card-header-form">
                                        <a href="{{ route('admin.categories.create') }}"
                                            class="btn btn-primary float-right">Create new category</a>
                                    </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                            @forelse ($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name_uz }}</td>
                                                    <td>{{ $category->slug_uz }}</td>
                                                    <td>
                                                        <div class="badge badge-success">Active</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.categories.show', $category->id) }}"
                                                            class="btn btn-primary">Detail</a>
                                                        @can('edit category')
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                                class="btn btn-icon icon-left btn-primary"><i
                                                                    class="far fa-edit"></i> Edit</a>
                                                        @endcan
                                                        @can('delete category')
                                                            <form
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick=" confirm('Are You shure delete category !!!')"
                                                                    class="btn btn-icon icon-left btn-danger"><i
                                                                        class="fas fa-times"></i> Delete</button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="5">No Categories !!!</th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{ $categories->links() }}
                                    {{-- <ul class="pagination mb-0">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
									</li>
								</ul> --}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
