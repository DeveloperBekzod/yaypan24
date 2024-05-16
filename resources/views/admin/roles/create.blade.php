@extends('layouts.admin')

@section('title')
    Create Role
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Role</h4>
                                <div class="card-header-form">
                                    <a href="{{ route('admin.roles.index') }}" class="btn mr-2 btn-dark float-right">Go
                                        Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.roles.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Permissions</label>
                                        @forelse ($permissions as $permission)
                                            <div class="form-check form-check-inline">
                                                <input name="permissions[]" class="form-check-input" type="checkbox"
                                                    id="{{ $permission->name }}" value="{{ $permission->name }}">
                                                <label class="form-check-label"
                                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Create</button>
                                        <button class="btn btn-secondary" type="reset">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
