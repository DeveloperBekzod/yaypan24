@extends('layouts.admin')

@section('title')
	Edit Category
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
							<h4>Edit category</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="{{route('admin.categories.update', $category->id)}}">
								@csrf
								@method('put')
								<div class="form-group">
									<label for="name_uz">Name Uz</label>
									<input id="name_uz" type="text" name="name_uz" class="form-control @error('name_uz') is-invalid @enderror" value="{{$category->name_uz}}">
									@error('name_uz')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="name_ru">Name Ru</label>
									<input id="name_ru" type="text" name="name_ru" class="form-control @error('name_uz') is-invalid @enderror" value="{{ $category->name_ru }}">
									@error('name_ru')
									<span class="invalid-feedback" role="alert">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="meta_title_uz">Meta Title Uz</label>
									<input id="meta_title_uz" type="text" name="meta_title_uz" class="form-control" value="{{ $category->meta_title_uz }}" >
								</div>
								<div class="form-group">
									<label for="meta_title_ru">Meta Title Ru</label>
									<input id="meta_title_ru" type="text" name="meta_title_ru" class="form-control" value="{{ $category->meta_title_ru }}" >
								</div>
								<div class="form-group">
									<label for="meta_keywords_uz">Meta Keywords Uz</label>
									<input type="text" id="meta_keywords_uz" name="meta_keywords_uz" class="form-control" value="{{ $category->meta_keywords_uz }}">
								</div>
								<div class="form-group">
									<label for="meta_keywords_ru">Meta Keywords Ru</label>
									<input type="text" id="meta_keywords_ru" name="meta_keywords_ru" class="form-control" value="{{ $category->meta_keywords_ru }}">
								</div>
								<div class="form-group">
									<label for="meta_description_uz">Meta Description Uz</label>
									<textarea id="meta_description_uz" name="meta_description_uz" class="form-control" value="{{ $category->meta_description_uz }}">
									</textarea>
								</div>
								<div class="form-group">
									<label for="meta_description_ru">Meta Description Ru</label>
									<textarea id="meta_description_ru" name="meta_description_ru" class="form-control"  value="{{ $category->meta_description_ru }}">
									</textarea>
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