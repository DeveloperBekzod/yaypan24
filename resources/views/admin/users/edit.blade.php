@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('title')
    Edit User
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
                                <h4>Edit User</h4>
                                <div class="card-header-form">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">Create
                                        new
                                        user</a>
                                    <a href="{{ route('admin.users.index') }}" class="btn mr-2 btn-dark float-right">Go
                                        Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="roles">User role</label>
                                        <select name="roles[]" id="roles" class="form-control select2" multiple>
                                            @foreach ($roles as $role)
                                                <option @if (in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif
                                                    value={{ $role->name }}>{{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Permissions</label>
                                        @forelse ($permissions as $permission)
                                            <div class="form-check form-check-inline">
                                                <input name="permissions[]" class="form-check-input" type="checkbox"
                                                    id="{{ $permission->name }}" value="{{ $permission->name }}"
                                                    @if (in_array($permission->id, $user->permissions->pluck('id')->toArray())) checked @endif>
                                                <label class="form-check-label"
                                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Edit</button>
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
@section('js')
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
