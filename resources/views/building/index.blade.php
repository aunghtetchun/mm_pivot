@extends('dashboard.app')

@section("title") Building Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Building" => route("building.index"),
    ]])
        @slot("last") Building List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Building List @endslot
                @slot('button')
                    <a href="{{ route('building.create') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Preview</th>
                                <th scope="col">Project</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Floor</th>
                                <th scope="col">B Column</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buildings as $b)
                                <tr>
                                    <th scope="row">{{ $b->id }}</th>
                                    <td>
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/preview/".$b->photo) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/preview/".$b->photo) }}" class=" rounded" alt="image alt" style="height: 50px" />
                                            @endslot
                                            @slot('body')

                                            @endslot
                                        @endcomponent
                                    </td>
                                    <td>{{ $b->getProject->name }}</td>
                                    <td>
                                        @foreach($b->getProjectPhoto as $photo)
                                            @component("component.venobox")
                                                @slot('original')
                                                    {{ asset("/storage/building/".$photo->patch) }}
                                                @endslot
                                                @slot('thumbnail')
                                                    <img src="{{ asset("/storage/building/".$photo->patch) }}" class=" rounded" alt="image alt" style="height: 50px" />
                                                @endslot
                                                @slot('body')

                                                @endslot
                                            @endcomponent
                                        @endforeach
                                    </td>
                                    <td>{{ $b->floor }}</td>
                                    <td>{{ $b->b_column }}</td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('building.edit',$b->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <form action="{{ route('building.destroy',$b->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('building.show',$b->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
                                    </td>
                                    <td>{{ $b->created_at }}</td>
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
