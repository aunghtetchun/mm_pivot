@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Team" => route("team.index"),
    ]])
        @slot("last") Add Team @endslot
    @endcomponent

    <div class="row ">
        <div class="col-12 col-md-7">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Team @endslot
                @slot('button')
                    <a href="{{ route('team.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div class="bg-white">
                        <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between">
                                <div class="col-12 col-md-6 bg-white">
                                    <div class="form-group">
                                        <label for="photo">Team Photo</label>
                                        <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Photo must be <br> square ratio <br> last then 1MB">Info</span>
                                        <input type="file" name="photo" class="d-none real-uploder">
                                        <div class="border rounded upload-iu">
                                            <div class="text-center d-flex align-items-center justify-content-center" style="height: 300px;">
                                                <i class="feather-upload fa-3x"></i>
                                            </div>
                                        </div>

                                        @error("photo")
                                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 bg-white">
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
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" value="{{old('position')}}" placeholder="Position">
                                        @error('position')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <label >Social Link</label>
                                    <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-html="true" data-placement="bottom" title="မရှိရင်အလွတ်ထားခဲ့နိုင်ပါတယ်">Info</span>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="facebook"><i class="feather-facebook"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{old('facebook')}}" placeholder="Facebook" aria-label="Input group example" aria-describedby="facebook">
                                    </div>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="google"><i class="fab fa-google"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('google') is-invalid @enderror" name="google" id="google" value="{{old('google')}}" placeholder="Google" aria-label="Input group example" aria-describedby="google">
                                    </div>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="twitter"><i class="feather-twitter"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter" value="{{old('twitter')}}" placeholder="Twitter" aria-label="Input group example" aria-describedby="twitter">
                                    </div>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="linkedin"><i class="feather-linkedin"></i></div>
                                        </div>
                                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" value="{{old('linkedin')}}" placeholder="Linkedin" aria-label="Input group example" aria-describedby="linkedin">
                                    </div>
                                </div>

                            </div>
                            <hr/>
                            <button class="btn mt-2 btn-primary"><i class="feather-plus-square"></i> Add Team</button>
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
    </script>
@endsection
