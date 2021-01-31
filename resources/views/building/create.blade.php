@extends('dashboard.app')

@section("title") Building Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Building" => route("building.index"),
    ]])
        @slot("last") Add Building @endslot
    @endcomponent

        <form class="row" action="{{ route('building.store') }}" id="myform" method="post" enctype="multipart/form-data">
            @csrf
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Building @endslot
                @slot('button')
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>

                            <div class="form-group">
                                <label for="project_id">Project</label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <option selected disabled>Select Project</option>
                                    @foreach(\App\Project::latest()->get() as $p)
                                        <option value="{{$p->id}}"  {{ Session::get('p_id')==$p->id ? "selected":"" }}>{{$p->name}}</option>
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
                                    <input type="number" min="1" class="form-control @error('floor') is-invalid @enderror" name="floor" id="floor" value="{{old('floor')}}" placeholder="Floor">
                                    @error('floor')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="b_column">Column</label>
                                    <input type="number" min="1" class="form-control @error('b_column') is-invalid @enderror" name="b_column" id="b_column" value="{{old('b_column')}}" placeholder="Column">
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
                                <textarea name="information" id="information" rows="4" class="form-control @error('information') is-invalid @enderror">{{old('information')}}</textarea>
                                @error('information')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="condition">Condition</label>
                                <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Condition can empty!!">Info</span>
                                <textarea name="condition" id="condition" rows="4" class="form-control @error('condition') is-invalid @enderror">{{old('condition')}}</textarea>
                                @error('condition')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Images @endslot
                @slot('button')
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('building.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Cover</label>
                                <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Photo must be <br> square ratio <br>">Info</span>
                                <input type="file" name="photo" class="d-none real-uploder" accept="image/*">
                                <div class="border rounded upload-iu">
                                    <div class="text-center d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="feather-upload fa-3x"></i>
                                    </div>
                                </div>

                                @error("photo")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                                <div class="form-group">
                                    <label for="images">Images</label>
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
                                <hr/>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="bardar" class="custom-control-input" id="bardar">
                                        <label class="custom-control-label" for="bardar">Barder</label>
                                    </div>
                                    @error('bardar')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col-12 text-right">
                                    <button type="submit" form="myform" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Building</button>
                                </div>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
        </form>
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
