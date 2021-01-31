@extends('dashboard.app')

@section("title") Project Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Project" => route("project.index"),
    ]])
        @slot("last") Add Project @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Project @endslot
                @slot('button')
                    <a href="{{ route('project.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form class="row" action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                                    @error('name')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>



                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Cover</label>
                                    <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Photo must be <br> square ratio <br>">Info</span>
                                    <input type="file" name="photo" class="d-none real-uploder" accept="image/*">
                                    <div class="border rounded upload-iu">
                                        <div class="text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                            <i class="feather-upload fa-3x"></i>
                                        </div>
                                    </div>

                                    @error("photo")
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
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
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Project</button>
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
        $(".upload-iu").click(function () {
            $(".real-uploder").click();
        });
        $(".real-uploder").on("change",function () {
            let file = this.files[0];
            // console.log(file);
            let fileReader = new FileReader();
            fileReader.onload = function () {
                $(".upload-iu").empty();
                $(".upload-iu").append(`
                    <img src="${fileReader.result}" class="img-fluid">
                `);
            };
            fileReader.readAsDataURL(file);
        })
        $(document).ready(function() {
            $('.input-images').imageUploader({
            });
        });
    </script>
@endsection
