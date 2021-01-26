@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Team" => route("team.index"),
    ]])
        @slot("last") Add Team @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Team @endslot
                @slot('button')
                    <a href="{{ route('team.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" value="{{old('position')}}" placeholder="Position">
                                        @error('position')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{old('facebook')}}" placeholder="Facebook">
                                        @error('facebook')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter" value="{{old('twitter')}}" placeholder="Twitter">
                                        @error('twitter')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="google">Google</label>
                                        <input type="text" class="form-control @error('google') is-invalid @enderror" name="google" id="google" value="{{old('google')}}" placeholder="Google">
                                        @error('google')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" value="{{old('linkedin')}}" placeholder="Linkedin">
                                        @error('linkedin')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="photo">Photo <small class="text-muted"> ( team photo must be squared )</small></label>
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
                                        <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Team</button>
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
