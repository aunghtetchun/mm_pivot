@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Blog" => route("blog.index"),
    ]])
        @slot("last") Edit Blog @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Blog @endslot
                @slot('button')
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $blog->title }}" placeholder="Title">
                                @error('title')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="blog_category_id">Category</label>
                                <select name="blog_category_id" id="blog_category_id" class="form-control">
                                    <option selected disabled>Select Category</option>
                                    @foreach(\App\BlogCategory::latest()->get() as $c)
                                        <option value="{{ $c->id }}" {{ $blog->blog_category_id == $c->id ? "selected":"" }} >{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('blog_category_id')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $blog->description }}</textarea>
                                @error('description')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Blog</button>
                        </form>

                    </div>

                @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add New Photo @endslot
                @slot('button')
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('blog_photo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="input-images"></div>
                            <button type="submit" class="btn mt-2 btn-primary" ><i class="feather-upload"></i> Upload</button>
                            @error('images')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </form>
                    </div>
                @endslot
            @endcomponent
                @component("component.card")
                    @slot('icon') <i class="feather-file text-primary"></i> @endslot
                    @slot('title') Uploaded Photo @endslot
                    @slot('button')
                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-list fa-fw"></i>
                        </a>
                    @endslot
                    @slot('body')
                            <div class="d-flex mx-2" style="overflow-x: scroll;">
                                @foreach($blog->getBlogPhoto as $photo)
                                    <div class="my-3 border mr-2 position-relative" >
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/thumbnail/".$photo->patch) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$photo->patch) }}" class=" rounded" alt="image alt" style="height: 120px" />
                                            @endslot
                                            @slot('body')
                                                <form action="{{ route('blog_photo.destroy',$photo->id) }}"  method="post" style="position: absolute; bottom: 3px; right: 3px;">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button href="" class="btn mt-1 btn-sm btn-danger">
                                                        <i class="feather-trash-2"></i>
                                                    </button>
                                                </form>
                                            @endslot
                                        @endcomponent
                                    </div>
                                @endforeach
                            </div>

                    @endslot
                @endcomponent
        </div>

    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            CKEDITOR.replace( 'description', {
                extraPlugins : 'autogrow',
            });
            $('.input-images').imageUploader({
            });
        });
    </script>
@endsection
