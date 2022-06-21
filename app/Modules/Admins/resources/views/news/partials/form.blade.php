<div class="row mt-4">
    <div class="col-lg-8 mt-lg-0 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bolder">News Information</h5>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" 
                        @if (request()->query('view') == 'update')
                        value="{{$news->name}}"
                        @else
                        value="{{ old('name') }}" 
                        @endif
                         />
                    </div>
                    @error('name')
                        <div style="color:red">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-sm-6">
                    <label class="mt-4">Details</label>

                    <div id="edit-deschiption-edit" class="h-50">
                        <textarea name="details">
                            @if (request()->query('view') == 'update')
                                {{$news->details}}
                            @endif
                        </textarea>
                    </div>
                    @error('details')
                        <div style="color:red"> {{ $message }}</div>
                    @enderror
                </div> <br>
                <div class="col-lg-6 text-right d-flex flex-column ">
                    <button
                        type="submit"class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2 ">Save</button>
                   
                </div>
            </div>

        </div>
    </div>
