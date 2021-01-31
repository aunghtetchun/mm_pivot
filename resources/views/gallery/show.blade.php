@extends('dashboard.app')

@section("title") Gallery Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Gallery" => "gallery.index"
    ]])
        @slot("last") See Gallery @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Gallery @endslot
                @slot('button')
                    <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('gallery.destroy',$gallery->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button href="" class="btn  btn-sm btn-outline-danger text-left">
                            <i class="feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                    <div class="d-flex col-12 flex-wrap justify-content-around align-items-center">
                        <div class="col-12">
                            <table class="table">
                                <tbody>
                                <tr >
                                    <td>Group</td>
                                    <td>{{ $gallery->group }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $gallery->title }}</td>
                                </tr>
                                <tr >
                                    <td colspan="2">
                                        <h4>Description</h4>
                                        {{ $gallery->description }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-flex" style="overflow-x: scroll; height: 120px;">
                                @foreach($gallery->getGalleryPhoto as $photo)
                                    <div class="mx-1">
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/gallery/".$photo->patch) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$photo->patch) }}" class=" rounded mb-3" alt="image alt" style="height: 100px" />
                                            @endslot
                                            @slot('body')

                                            @endslot
                                        @endcomponent
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

