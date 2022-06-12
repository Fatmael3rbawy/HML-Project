@extends('Suppliers::layouts.admin')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="container-fluid py-4">
        <form method="post" action="{{ route('supplier.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mt-4">
               
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Product Information</h5>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                                </div>
                                @error('name')
                                    <div style="color:red"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Price</label>
                                    <input class="form-control" type="text" name="price" value="{{ old('price') }}" />
                                </div>
                                @error('price')
                                    <div style="color:red"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mt-4">Description</label>

                                    <div id="edit-deschiption-edit" class="h-50">
                                        <textarea name="description"></textarea>
                                    </div>
                                    @error('description')
                                        <div style="color:red"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-4">Category</label>
                                    <select class="form-control" name="category" id="choices-category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <input type="file" name="images[]" multiple
                                    class="btn bg-gradient-primary btn-sm  me-2" />
                            </div>
                        </div>
                        @error('images')
                            <div style="color:red"> {{ $message }}</div>
                        @enderror <br> <br><br>
                       
                        <div class="row">
                            <div class="col-lg-8 text-right d-flex flex-column justify-content-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 "
                                    >Save</button>
                            </div><br>
                        </div>
                    </div> 
                   
                </div>
            </div>
        </form>
    </div>
    <br><br><br>
@endsection
