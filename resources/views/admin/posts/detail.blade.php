@extends('layouts.admin')

@section('title')
    Post detail
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
                                <h4>Post Details</h4>
                                <div class="card-header-form">
                                    @can('create post')
                                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Create new
                                            post</a>
                                    @endcan
                                    <a href="{{ url()->previous() }}" class="btn mr-2 btn-dark float-right">Go Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Column</th>
                                            <th scope="col">Values</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Title (Uz)</td>
                                            <td>{{ $post->title_uz }}</td>
                                        </tr>
                                        <tr>
                                            <td>Title (Ru)</td>
                                            <td>{{ $post->title_ru }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tags</td>
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge badge-primary">{{ $tag->name_uz }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Text (Uz)</td>
                                            <td>{!! $post->text_uz !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Text (Ru)</td>
                                            <td>{!! $post->text_ru !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
