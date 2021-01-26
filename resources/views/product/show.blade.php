@extends('dashboard.app')

@section("title") Product Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Product" => "product.index"
    ]])
        @slot("last") See Product @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Product @endslot
                @slot('button')
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('product.destroy',$product->id) }}"  method="post">
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
                                <tr>
                                    <td>
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/thumbnail/".$product->photo) }}
                                            @endslot
                                            @slot('thumbnail')
                                                <img src="{{ asset("/storage/thumbnail/".$product->photo) }}" class=" rounded mx-2 mb-3" alt="image alt" style="height: 150px" />
                                            @endslot
                                            @slot('body')
                                            @endslot
                                        @endcomponent
                                    </td>
                                    <td class="text-center">
                                        <table class="w-100  table-borderless text-left">
                                            <tbody>
                                            <tr >
                                                <td>Name</td>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Category</td>
                                                <td>{{ $product->getProductCategory->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>{{ $product->price }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                </tr>
                                <tr >
                                    <td colspan="2">
                                        <h4>Description</h4>
                                        {{ $product->description }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-flex" style="overflow-x: scroll; height: 120px;">
                                @foreach($product->getProductPhoto as $photo)
                                    <div class="mx-2">
                                        @component("component.venobox")
                                            @slot('original')
                                                {{ asset("/storage/product/".$photo->patch) }}
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

