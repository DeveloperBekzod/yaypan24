@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('title')
	Create Post
@endsection
{{-- @dd($categories) --}}
@section('content')
	<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h4>Create new post</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="title_uz">Title Uz</label>
									<input class="form-control" id="title_uz" type="text" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror" value="{{old('title_uz')}}" required>
									@error('title_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title_ru">Title Ru</label>
									<input class="form-control" id="title_ru" type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" value="{{old('title_ru')}}" required>
									@error('title_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<div class="control-label">Special post</div>
									<label class="custom-switch mt-2">
										<input type="checkbox" name="is_special" value='1' class="custom-switch-input">
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description">This post shows on the top of home page</span>
										@error('is_special')
										<span class="invalid-feedback" role="alert">{{$message}}</span>
										@enderror
									</label>
								</div>
								<div class="form-group">
									<label for="category_id">Post category</label>
									<select name="category_id" id="category_id" class="form-control" required>
										<option>Select category</option>
										@foreach ($categories as $category)
											<option value={{$category->id}}>{{$category->name_uz}}</option>
										@endforeach
									</select>
									@error('category_id')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="tags">Post tags</label>
									<select name="tags[]" id="tags" class="form-control select2" multiple required>
										@foreach ($tags as $tag)
											<option value={{$tag->id}}>{{$tag->name_uz}}</option>
										@endforeach
									</select>
									@error('tags')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="image">Post image</label>
									<input class="form-control" id="image" type="file" name="image">
								</div>
								<div class="form-group">
									<label for="text_uz">Post text Uz</label>
									<textarea id="text_uz" name="text_uz" class="form-control" value="{{old('text_uz')}}" required>
									</textarea>
									@error('text_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="text_ru">Post text Ru</label>
									<textarea id="text_ru" name="text_ru" class="form-control" value="{{old('text_ru')}}" required>
									</textarea>
									@error('text_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<hr>
								<fieldset>
									<legend>Meta data:</legend>
									<div class="form-group">
										<label for="meta_title_uz">Meta Title Uz</label>
										<input class="form-control" id="meta_title_uz" type="text" name="meta_title_uz" value="{{old('meta_title_uz')}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_title_ru">Meta Title Ru</label>
										<input class="form-control" id="meta_title_ru" type="text" name="meta_title_ru" value="{{old('meta_title_ru')}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_keywords_uz">Meta Keywords Uz</label>
										<input class="form-control" type="text" id="meta_keywords_uz" name="meta_keywords_uz" value="{{old('meta_keywords_uz')}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_keywords_ru">Meta Keywords Ru</label>
										<input class="form-control" type="text" id="meta_keywords_ru" value="{{old('meta_keywords_ru')}}" name="meta_keywords_ru" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_description_uz">Meta Description Uz</label>
										<textarea id="meta_description_uz" name="meta_description_uz" value="{{old('meta_description_uz')}}" class="form-control">
										</textarea>
									</div>
									<div class="form-group">
										<label for="meta_description_ru">Meta Description Ru</label>
										<textarea id="meta_description_ru" name="meta_description_ru" value="{{old('meta_description_ru')}}" class="form-control">
										</textarea>
									</div>
								</fieldset>
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

@section('js')
	<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'text_uz', {
			filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
			filebrowserUploadMethod: 'form'
		});
		CKEDITOR.replace( 'text_ru', {
					filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
					filebrowserUploadMethod: 'form'
			});
	</script>
	<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection