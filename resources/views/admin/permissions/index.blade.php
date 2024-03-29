@extends('layouts.admin')

@section('title')
    Permissions
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
                                <h4>Permissions Table</h4>
                                <div class="card-header-form">
                                    <a href="{{ route('admin.permissions.create') }}"
                                        class="btn btn-primary float-right">Create
                                        new permission</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                            @forelse ($permissions as $permission)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                            class="btn btn-icon icon-left btn-primary"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <form
                                                            action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick=" confirm('Are You shure delete permission !!!')"
                                                                class="btn btn-icon icon-left btn-danger"><i
                                                                    class="fas fa-times"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="5">No permissions !!!</th>
                                                </tr>
                                            @endforelse
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
