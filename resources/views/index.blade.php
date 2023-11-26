@extends('layouts.site')

@section('title')
	Home page
@endsection

@section('content')

	@include('sections.mainPosts')
	@include('sections.latestPosts')
	
@endsection