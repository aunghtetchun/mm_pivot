@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Product" => route("team.index"),
    ]])
        @slot("last") Product List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Product List @endslot
                @slot('button')
                    <a href="{{ route('team.create') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Link</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $t)
                                <tr>
                                    <th scope="row">{{ $t->id }}</th>
                                    <td>
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/team/".$t->photo) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$t->photo) }}" class=" rounded" alt="image alt" style="height: 50px" />
                                            @endslot
                                            @slot('body')

                                            @endslot
                                        @endcomponent
{{--                                        <img src="{{ asset("/storage/thumbnail/".$t->photo) }}" class=" rounded" alt="image alt" style="height: 45px" />--}}
                                    </td>
                                    <td>{{ $t->name }}</td>
                                    <td>{{ $t->position }}</td>
                                    <td>
                                        @isset($t->facebook)
                                            <a class="btn btn-outline-primary" href="{{ $t->facebook }}"><i class="feather-facebook"></i></a>
                                        @endisset
                                            @isset($t->twitter)
                                                <a class="btn btn-outline-primary" href="{{ $t->twitter }}"><i class="feather-twitter"></i></a>
                                            @endisset
                                            @isset($t->google)
                                                <a class="btn btn-outline-primary" href="{{ $t->google }}"><i class="fab fa-google"></i></a>
                                            @endisset
                                            @isset($t->linkedin)
                                                <a class="btn btn-outline-primary" href="{{ $t->linkedin }}"><i class="feather-linkedin"></i></a>
                                            @endisset
                                    </td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('team.edit',$t->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <form action="{{ route('team.destroy',$t->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
{{--                                        <a href="{{ route('team.show',$t->id) }}" class="btn ml-2 btn-outline-success btn-sm">--}}
{{--                                            <i class="feather-eye"></i>--}}
{{--                                        </a>--}}
                                    </td>
                                    <td>{{ $t->created_at }}</td>
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
@section("foot")
    <script>
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
@endsection
