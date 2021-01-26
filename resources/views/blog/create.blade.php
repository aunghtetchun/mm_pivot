@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Blog" => route("blog.index"),
    ]])
        @slot("last") Add Blog @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Blog @endslot
                @slot('button')
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row align-items-center justify-content-between">
                                <div class="col-12 col-md-6 pr-lg-1">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Title">
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
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('blog_category_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
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
                                </div>
                                <div class="col-12 col-md-6 pl-lg-1">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Blog</button>
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
            CKEDITOR.replace( 'description', {
                extraPlugins : 'autogrow',
            });
            $('.input-images').imageUploader({
            });
        });
    </script>
@endsection
