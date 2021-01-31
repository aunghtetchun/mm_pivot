@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Project" => route("project.index"),
    ]])
        @slot("last") Edit Project @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Project @endslot
                @slot('button')
                    <a href="{{ route('project.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('project.update',$project->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $project->name }}" placeholder="Name">
                                @error('name')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Cover</label>
                                <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Click photo to edit">Info</span>
                                <input type="file" name="photo" class="d-none real-uploder" accept="image/*">
                                <div class="border rounded upload-iu">
                                    <img src="{{ asset("/storage/preview/".$project->photo) }}" class="img-fluid">
                                </div>

                                @error("photo")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Project</button>
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
                @endslot
                @slot('body')
                    <div class="col-12 p-0 ">
                        <form action="{{ route('project_photo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
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
                    @endslot
                    @slot('body')
                        <div class="d-flex mx-2" style="overflow-x: scroll;">
                            @foreach($project->getProjectPhoto as $photo)
                                <div class="my-3 border mr-2 position-relative" >
                                    @component("component.venobox")
                                        @slot('original')
                                            {{ asset("/storage/project/".$photo->patch) }}
                                        @endslot
                                        @slot('thumbnail')
                                            <img src="{{ asset("/storage/project/".$photo->patch) }}" class=" rounded " alt="image alt" style="height: 120px" />
                                        @endslot
                                        @slot('body')
                                            <form action="{{ route('project_photo.destroy',$photo->id) }}"  method="post" style="position: absolute; bottom: 3px; right: 3px;">
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
