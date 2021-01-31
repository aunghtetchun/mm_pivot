@extends('dashboard.app')

@section("name") Category Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Partner" => route("partner.index"),
    ]])
        @slot("last")  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title')  {{ isset($partner) ? 'Edit Partner ' : "Add Partner" }}@endslot
                @slot('button')  @endslot
                @slot('body')
                    @if(isset($partner))
                        <div>
                            <form action="{{ route('partner.update',$partner->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-inline">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $partner->name }}" placeholder="Name">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ $partner->link }}" placeholder="Link">
                                    <input type="file" onchange="previewFile()" class="p-1 form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Photo">
                                    <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Partner</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div>
                            <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-inline">
                                    <input type="file" onchange="previewFile()" class="p-1 form-control mr-2 @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Photo">
                                    <input type="text" class="form-control mr-2 @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                                    <input type="text" class="form-control mr-2 @error('link') is-invalid @enderror" name="link" id="link" value="{{old('link')}}" placeholder="Link">
                                    <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Partner</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div>
                        <table class="table mt-4 table-bordered table-hover mb-0 table-responsive-sm table-responsive-md">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Partner::latest()->get() as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/partner/".$p->photo) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$p->photo) }}" class="rounded" alt="image alt" style="height: 50px" />
                                            @endslot
                                            @slot('body')

                                            @endslot
                                        @endcomponent
                                    </td>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        @isset($p->link)
                                            <a class="btn btn-outline-primary" href="{{ $p->link }}"><i class="feather-link"></i></a>
                                        @endisset
                                    </td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('partner.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <form action="{{ route('partner.destroy',$p->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                        {{--                                        <a href="{{ route('partner.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">--}}
                                        {{--                                            <i class="feather-eye"></i>--}}
                                        {{--                                        </a>--}}
                                    </td>
                                    <td>{{ $p->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endslot
            @endcomponent

        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection





































