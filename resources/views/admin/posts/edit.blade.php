@extends('layouts.admin')

@section('title')
	Edit Post
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
							<h4>Edit post</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="{{route('admin.posts.update', $post->id)}}" enctype="multipart/form-data">
								@csrf
								@method('put')
								<div class="form-group">
									<label for="title_uz">Title Uz</label>
									<input class="form-control" id="title_uz" type="text" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror" value="{{ $post->title_uz }}" required>
									@error('title_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title_ru">Title Ru</label>
									<input class="form-control" id="title_ru" type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" value="{{ $post->title_ru }}" required>
									@error('title_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="category_id">Post category</label>
									<select name="category_id" id="category_id" class="form-control" required>
										<option>Select category</option>
										@foreach ($categories as $category)
											<option {{$category->id == $post->category_id ? 'selected' : ''}} value={{$category->id}}>{{$category->name_uz}}</option>
										@endforeach
									</select>
									@error('category_id')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="image">Post image</label>
									<input class="form-control" id="image" type="file" name="image">
								</div>
								<div class="form-group">
									<label for="text_uz">Post text Uz</label>
									<textarea id="text_uz" name="text_uz" class="form-control" required>{{$post->text_uz}}</textarea>
									@error('text_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="text_ru">Post text Ru</label>
									<textarea id="text_ru" name="text_ru" class="form-control" required>{{$post->text_ru}}</textarea>
									@error('text_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<hr>
								<fieldset>
									<legend>Meta data:</legend>
									<div class="form-group">
										<label for="meta_title_uz">Meta Title Uz</label>
										<input class="form-control" id="meta_title_uz" type="text" name="meta_title_uz" value="{{$post->meta_title_uz}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_title_ru">Meta Title Ru</label>
										<input class="form-control" id="meta_title_ru" type="text" name="meta_title_ru" value="{{$post->meta_title_ru}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_keywords_uz">Meta Keywords Uz</label>
										<input class="form-control" type="text" id="meta_keywords_uz" name="meta_keywords_uz" value="{{$post->meta_keywords_uz}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_keywords_ru">Meta Keywords Ru</label>
										<input class="form-control" type="text" id="meta_keywords_ru" value="{{$post->meta_keywords_ru}}" name="meta_keywords_ru" class="form-control">
									</div>
									<div class="form-group">
										<label for="meta_description_uz">Meta Description Uz</label>
										<textarea id="meta_description_uz" name="meta_description_uz"class="form-control">{{$post->meta_description_uz}}</textarea>
									</div>
									<div class="form-group">
										<label for="meta_description_ru">Meta Description Ru</label>
										<textarea id="meta_description_ru" name="meta_description_ru" class="form-control">{{$post->meta_description_ru}}</textarea>
									</div>
								</fieldset>
								<div class="card-footer text-right">
									<button class="btn btn-primary mr-1" type="submit">Edit</button>
									<a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
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
@endsection