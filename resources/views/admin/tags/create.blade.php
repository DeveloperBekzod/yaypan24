@extends('layouts.admin')

@section('title')
	Create Tag
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
							<h4>Create new tag</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="{{route('admin.tags.store')}}">
								@csrf
								<div class="form-group">
									<label for="name_uz">Name Uz</label>
									<input id="name_uz" type="text" name="name_uz" class="form-control @error('name_uz') is-invalid @enderror" value="{{old('name_uz')}}">
									@error('name_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="name_ru">Name Ru</label>
									<input id="name_ru" type="text" name="name_ru" class="form-control @error('name_uz') is-invalid @enderror">
									@error('name_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="meta_title_uz">Meta Title Uz</label>
									<input id="meta_title_uz" type="text" name="meta_title_uz" class="form-control">
								</div>
								<div class="form-group">
									<label for="meta_title_ru">Meta Title Ru</label>
									<input id="meta_title_ru" type="text" name="meta_title_ru" class="form-control">
								</div>
								<div class="form-group">
									<label for="meta_keywords_uz">Meta Keywords Uz</label>
									<input type="text" id="meta_keywords_uz" name="meta_keywords_uz" class="form-control">
								</div>
								<div class="form-group">
									<label for="meta_keywords_ru">Meta Keywords Ru</label>
									<input type="text" id="meta_keywords_ru" name="meta_keywords_ru" class="form-control">
								</div>
								<div class="form-group">
									<label for="meta_description_uz">Meta Description Uz</label>
									<textarea id="meta_description_uz" name="meta_description_uz" class="form-control">
									</textarea>
								</div>
								<div class="form-group">
									<label for="meta_description_ru">Meta Description Ru</label>
									<textarea id="meta_description_ru" name="meta_description_ru" class="form-control">
									</textarea>
								</div>
								<div class="card-footer text-right">
									<button class="btn btn-primary mr-1" type="submit">Create</button>
									<a href="{{url()->previous()}}" class="btn btn-danger" type="reset">Cancel</a>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection