@extends('Admins::layouts.admin')
@section('title')
    Edit News
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('Admins::news.partials.form')
        </form>
    </div>
    <br><br><br><br><br><br><br>
@endsection
