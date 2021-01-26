@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Product" => route("product.index"),
    ]])
        @slot("last") Edit Product @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Product @endslot
                @slot('button')
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div class="d-flex flex-wrap justify-content-between ">
                        <div class="col-12 col-md-6">
                            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $product->name }}" placeholder="Name">
                                    @error('name')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $product->price }}" placeholder="Price">
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
                                            <option value="{{ $c->id }}" {{ $product->product_category_id == $c->id ? "selected":"" }} >{{ $c->name }}</option>
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
                                    <input type="file" class="form-control p-1 @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ $product->photo }}" placeholder="Title">
                                    @error('photo')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $product->description }}</textarea>
                                    @error('description')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Product</button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 pl-2">
                            <form class="col-12" action="{{ route('product_photo.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-row justify-content-between">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="file"   multiple class="col-10 mt-2 form-control p-1 @error('images') is-invalid @enderror" accept="image/png, .jpeg, .jpg, image/gif" name="images[]" id="images" value="" >
                                        <button type="submit" class="btn col-2 mt-2 btn-primary" >Upload</button>
                                        @error('images')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                            </form>
                            <div class="d-flex mx-2 " style="overflow-x: scroll;">
                                @foreach($product->getProductPhoto as $photo)
                                    <div class="my-3 mr-2">
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/thumbnail/".$photo->patch) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$photo->patch) }}" class=" rounded mx-2 mb-3" alt="image alt" style="height: 120px" />
                                            @endslot
                                            @slot('body')
                                                <form action="{{ route('product_photo.destroy',$photo->id) }}"  method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button href="" class="btn mt-1 btn-sm btn-outline-danger text-left">
                                                        <i class="feather-trash-2"></i> Delete
                                                    </button>
                                                </form>
                                            @endslot
                                        @endcomponent
                                    </div>
                                @endforeach
                            </div>
                        </div>

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
