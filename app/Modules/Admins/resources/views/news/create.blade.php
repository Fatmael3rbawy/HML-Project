@extends('Admins::layouts.admin')
@section('title')
    Create News Feed
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form method="POST" action="{{ route('admin.news.store') }}" >
            @csrf
            @include('Admins::news.partials.form')
        </form>
    </div>
    <br><br><br><br><br><br><br>
@endsection
