@extends('dashboard.app')

@section("title") Building Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Building" => route("building.index"),
    ]])
        @slot("last") Edit Building @endslot
    @endcomponent
        <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Building @endslot
                @slot('button')
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('building.update',$building->id) }}" id="myform" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                            <label for="project_id">Project</label>
                            <select name="project_id" id="project_id" class="form-control">
                                <option selected disabled>Select Project</option>
                                @foreach(\App\Project::latest()->get() as $p)
                                    <option value="{{$p->id}}" {{ $building->project_id == $p->id ? "selected":"" }}>{{$p->name}}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="floor">Floor</label>
                                <input type="number" min="{{ $building->floor }}" class="form-control @error('floor') is-invalid @enderror" name="floor" id="floor" value="{{ $building->floor }}" placeholder="Floor">
                                @error('floor')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="b_column">Column</label>
                                <input type="number" min="{{ $building->b_column }}" class="form-control @error('b_column') is-invalid @enderror" name="b_column" id="b_column" value="{{ $building->b_column }}" placeholder="Column">
                                @error('b_column')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="information">Information</label>
                            <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Information can empty!!">Info</span>
                            <textarea name="information" id="information" rows="4" class="form-control @error('information') is-invalid @enderror">{{$building->information}}</textarea>
                            @error('information')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Condition can empty!!">Info</span>
                            <textarea name="condition" id="condition" rows="4" class="form-control @error('condition') is-invalid @enderror">{{ $building->condition }}</textarea>
                            @error('condition')
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
                                    <img src="{{ asset("/storage/preview/".$building->photo) }}" class="img-fluid">
                                </div>

                                @error("photo")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        <hr/>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" {{ $building->bardar==1?"checked":"" }} name="bardar" class="custom-control-input" id="bardar">
                                <label class="custom-control-label" for="bardar">Barder</label>
                            </div>
                            @error('bardar')
                            <small class="invalid-feedback font-weight-bold" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" form="myform" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Building</button>
                        </div>
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
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('project_photo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="building_id" value="{{ $building->id }}">
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
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div class="d-flex mx-2" style="overflow-x: scroll;">
                        @foreach($building->getProjectPhoto as $photo)
                            <div class="my-3 border mr-2 position-relative" >
                                @component("component.venobox")
                                    @slot('original')
                                        {{ asset("/storage/building/".$photo->patch) }}
                                    @endslot
                                    @slot('thumbnail')
                                        <img src="{{ asset("/storage/building/".$photo->patch) }}" class=" rounded" alt="image alt" style="height: 120px" />
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
            CKEDITOR.replace( 'description', {
                extraPlugins : 'autogrow',
            });
            $('.input-images').imageUploader({
            });
        });
    </script>
@endsection
