@extends('dashboard.app')

@section("name") Category Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last")
            Category
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-9">
                @component("component.card")
                    @slot('icon') <i class="feather-file text-primary"></i> @endslot
                    @slot('title')  {{ isset($blogCategory) ? 'Edit Category ' : "Manage Category" }}@endslot
                    @slot('button')  @endslot
                    @slot('body')
                        @if(isset($blogCategory))
                        <div>
                            <form action="{{ route('blog_category.update',$blogCategory->id )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-8">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $blogCategory->name }}" placeholder="Title">
                                        @error('name')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @else
                                <div>
                                    <form action="{{ route('blog_category.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row align-items-end">
                                            <div class="col-12 col-md-8">
                                                <label for="name">Title</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Title">
                                                @error('name')
                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Add Category</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div>
                                <table class="table mt-4 table-bordered table-hover mb-0 table-responsive-sm table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Controls</th>
                                        <th scope="col">Created_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\BlogCategory::latest()->get() as $c)
                                        <tr>
                                            <th scope="row">{{ $c->id }}</th>
                                            <td>{{ $c->name }}</td>
                                            <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                                <a href="{{ route('blog_category.edit',$c->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                    <i class="feather-edit"></i>
                                                </a>
                                            </td>
                                            <td>{{ $c->created_at }}</td>
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
