@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Gallery" => route("gallery.index"),
    ]])
        @slot("last") Add Gallery @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Gallery @endslot
                @slot('button')
                    <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

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
                                        <label for="group">Group</label>
                                        <input type="text" class="form-control @error('group') is-invalid @enderror" name="group" id="group" value="{{old('group')}}" placeholder="Group">
                                        @error('group')
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
                                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Gallery</button>

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
