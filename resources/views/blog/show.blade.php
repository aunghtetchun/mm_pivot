@extends('dashboard.app')

@section("title") Blog Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Blog" => "blog.index"
    ]])
        @slot("last") See Blog @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-7">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Blog @endslot
                @slot('button')
                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-list fa-fw"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('blog.destroy',$blog->id) }}"  method="post">
                            @csrf
                            @method("DELETE")
                            <button href="" class="btn  btn-sm btn-outline-danger text-left">
                                <i class="feather-trash-2"></i>
                            </button>
                        </form>
                @endslot
                @slot('body')
                        <h5>{{ $blog->title }} ( <small>{{ $blog->getBlogCategory->name }}</small> )</h5>
                        <hr/>
                        <div class="d-flex flex-wrap justify-content-around align-items-center">
                            @foreach($blog->getBlogPhoto as $photo)
                                <div class="my-3 mr-2">
                                    @component("component.venobox")
                                        @slot('original')
                                            {{ asset("/storage/blog/".$photo->patch) }}
                                        @endslot
                                        @slot('thumbnail')
                                            <img src="{{ asset("/storage/thumbnail/".$photo->patch) }}" class=" rounded mx-2 mb-3" alt="image alt" style="height: 120px" />
                                        @endslot
                                        @slot('body')

                                        @endslot
                                    @endcomponent
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-2">{!! $blog->description !!} </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

