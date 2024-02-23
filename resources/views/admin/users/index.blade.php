@extends('layouts.admin')

@section('title')
    Users
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
                                <h4>Users Table</h4>
                                <div class="card-header-form">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">Create
                                        new user</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Permissions</th>
                                                <th>Actions</th>
                                            </tr>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ($user->roles as $role)
                                                            <div class="badge  badge-primary mb-1">{{ $role->name }}</div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($user->permissions as $permission)
                                                            <div class="badge  badge-primary mb-1">{{ $permission->name }}
                                                            </div>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="btn btn-icon icon-left btn-primary"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick=" confirm('Are You shure delete user !!!')"
                                                                class="btn btn-icon icon-left btn-danger"><i
                                                                    class="fas fa-times"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="5">No Users !!!</th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{-- {{ $users->links() }} --}}
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
