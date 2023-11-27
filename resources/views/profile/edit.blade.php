@extends('layouts.admin')

@section('content')
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-8">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
								{{ session('status') }}
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<h4 class="px-4">Profile Information</h4>
							<p class="px-4">Update your account's profile information and email address.</p>
							<form method="POST" action="{{ route('admin.profile.update') }}" class="composeForm">
								@csrf
								@method('patch')
								<div class="form-group">
									<label for="name" class="form-label">User name</label>
									<input type="text" id="name" class="form-control" name="name" value="{{old('name', $user->name)}}">
								</div>
								<div class="form-group">
									<label for="email" class="form-label">Email</label>
									<input type="email" id="email" class="form-control" name="email" value="{{old('email', $user->email)}}">
								</div>
								<button type="submit" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<h4 class="px-4">Update Password</h4>
							<p class="px-4">Ensure your account is using a long, random password to stay secure.</p>
							<form method="POST" action="{{ route('admin.password.update') }}" class="composeForm">
								@csrf
								@method('put')
								<div class="form-group">
									<label for="current_password" class="form-label">Current Password</label>
									<input type="password" id="current_password" class="form-control" name="current_password">
								</div>
								<div class="form-group">
									<label for="password" class="form-label">New Password</label>
									<input type="password" id="password" class="form-control" name="password">
								</div>
								<div class="form-group">
									<label for="password_confirmation" class="form-label">Confirm Password</label>
									<input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
								</div>
								<button type="submit" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<h4 class="px-4">Delete Account</h4>
							<p class="px-4">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
							<x-danger-button x-data="" class="px-4" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>
							<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
								<form method="POST" action="{{ route('admin.profile.destroy') }}" class="composeForm">
									@csrf
									@method('delete')

									<h4 class="px-4">Delete Account</h4>
									<p class="px-4">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

									<div class="mt-6">
										<x-input-label for="password" value="{{ __('Password') }}" class="" />
		
										<x-text-input
												id="password"
												name="password"
												type="password"
												class=""
												placeholder="{{ __('Password') }}"
										/>
		
										<x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
									</div>
									<div>
											<x-secondary-button x-on:click="$dispatch('close')">
													{{ __('Cancel') }}
											</x-secondary-button>
			
											<x-danger-button class="ms-3">
													{{ __('Delete Account') }}
											</x-danger-button>
									</div>
									<button type="submit" class="btn btn-primary">Delete Account</button>
								</form>
							</x-modal>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

	
@endsection

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}