@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Partner" => route("partner.index"),
    ]])
        @slot("last") Partner List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Partner List @endslot
                @slot('button')
                    <a href="{{ route('partner.create') }}" class="btn btn-sm btn-outline-primary">
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
                                <th scope="col">Link</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/partner/".$p->photo) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$p->photo) }}" class=" rounded" alt="image alt" style="height: 50px" />
                                            @endslot
                                            @slot('body')

                                            @endslot
                                        @endcomponent
{{--                                        <img src="{{ asset("/storage/thumbnail/".$p->photo) }}" class=" rounded" alt="image alt" style="height: 45px" />--}}
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
@section("foot")
    <script>
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
@endsection
