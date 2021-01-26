@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Product" => route("product.index"),
    ]])
        @slot("last") Add Product @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Product @endslot
                @slot('button')
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                                        @error('name')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}" placeholder="Price">
                                        @error('price')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_category_id">Category</label>
                                        <select name="product_category_id" id="product_category_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach(\App\ProductCategory::latest()->get() as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Preview <small class="text-muted"> ( preview photo must be squared )</small></label>
                                        <input type="file" class="p-1 form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Preview">
                                        @error('photo')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="3" class="form-control @error('street') is-invalid @enderror" name="description" id="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">

                                    <div class="form-group">
                                        <label for="images">Photo</label>
                                        <div class="input-images"></div>
                                        @error('images')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <div class="input-field">
                                            {{--                                        <label class="active">Photos</label>--}}
                                            <div class="input-images-2" style="padding-top: .5rem;"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Product</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader({
            });
        });
    </script>
@endsection
