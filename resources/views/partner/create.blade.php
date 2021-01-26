@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Partner" => route("partner.index"),
    ]])
        @slot("last") Add Partner @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-7">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Partner @endslot
                @slot('button')
                    <a href="{{ route('partner.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between">
                                <div class="col-12 ">
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
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{old('link')}}" placeholder="Link">
                                        @error('link')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="photo">Photo <small class="text-muted"> ( partner photo must be squared )</small></label>
                                        <input type="file" onchange="previewFile()" class="p-1 form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Photo">
                                        @error('photo')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <div class="col-12 text-center">
                                            <img src="" class="mt-2 d-none" height="350" id="preview" alt="Image preview...">
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Partner</button>
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

        function previewFile() {
            const preview = document.getElementById('preview');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                // convert image file to base64 string
                preview.src = reader.result;
                preview.classList.remove('d-none');
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
