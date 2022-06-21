@extends('Admins::layouts.admin')
@section('title')
    NewsFeed
@endsection
@section('content')
   
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">All News</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    @if (request()->query('view') != 'trash')
                                    <a href="{{ route('admin.news.create') }}"
                                        class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                                       Add News Feed</a>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Admins::news.partials.table')
                </div>
            </div>
        </div>
    </div>
    @include('Admins::news.partials.scripts')
@endsection
