@extends('Admins::layouts.admin')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            @method('PUT')
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Category Image</h5>
                            <div class="row">

                                <div class="col-12">
                                    <img class="w-75 border-radius-lg shadow-lg mt-3"
                                        src="{{ asset('images\categories/' . $category->image) }}" alt="Category_image">
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="d-flex">
                                        <input type="file" name="image" class="btn bg-gradient-primary btn-sm mb-0 me-2" />
                                    </div>
                                </div>
                                @error('image')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Category Information</h5>
                            <br>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $category->name }}" />
                                </div>
                                @error('name')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
                                    <button type="submit"
                                        class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 ">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </form>
    </div>
    <br><br><br><br><br><br><br>
@endsection
