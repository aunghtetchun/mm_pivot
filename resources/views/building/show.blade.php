@extends('dashboard.app')

@section("title") Building Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Building" => "building.index"
    ]])
        @slot("last") See Building @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Building @endslot
                @slot('button')
                    <a href="{{ route('building.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('building.destroy',$building->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button href="" class="btn  btn-sm btn-outline-danger text-left">
                            <i class="feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    @component("component.venobox")
                                        @slot('original')
                                            {{ asset("/storage/preview/".$building->photo) }}
                                        @endslot
                                        @slot('thumbnail')
                                            <img src="{{ asset("/storage/preview/".$building->photo) }}" class=" rounded mx-2 mb-3" alt="image alt" style="height: 170px" />
                                        @endslot
                                        @slot('body')

                                        @endslot
                                    @endcomponent
                                </td>
                                <td>
                                    <table class="px-0 mx-0 table-borderless table">
                                        <tr>
                                            <td colspan="2">Project : {{ $building->getProject->name }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Floor : {{ $building->floor }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Column : {{ $building->b_column }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Bardar : {{ $building->bardar }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h5>Information</h5>
                                    <p>{{ $building->information }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h5>Condition</h5>
                                    <p>{{ $building->condition }}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <hr/>
                    <div class="d-flex" style="overflow-x: scroll;">
                        @foreach($building->getProjectPhoto as $photo)
                            <div class="my-3 mr-2">
                                @component("component.venobox")
                                    @slot('original')
                                        {{ asset("/storage/building/".$photo->patch) }}
                                    @endslot
                                    @slot('thumbnail')
                                        <img src="{{ asset("/storage/building/".$photo->patch) }}" class=" rounded mx-2 mb-3" alt="image alt" style="height: 120px" />
                                    @endslot
                                    @slot('body')

                                    @endslot
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Building Sample @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="d-flex flex-wrap pt-3" style="width: {{ 121*$building->b_column }}px">
                        <a href="" class="d-none">go</a>
                        @if($building->bardar==0)
                            <div id="trapezoid" style="width: {{ 121*$building->b_column }}px"></div>
                        @else
                            @foreach(\App\Room::where('building_id',$building->id)->where('room_number','=','Bardar')->get() as $bardar)
                            <div class="px-4 py-3 room text-center" style="width: 120px;border: 1px solid black; border-top: 7px solid red;" data-toggle="tooltip" data-placement="top" title="{{ 0 == $bardar->sell_status ? "Can Buy" : "Already Sell" }} , price - {{ $bardar->price }} , width - {{ $bardar->width }} , height - {{ $bardar->height }} , information - {{ $bardar->information }}">
                                <div onclick="location.href='{{\Illuminate\Support\Facades\URL::current().'#'.$bardar->room_number}}'" class="scroll py-3 border border-primary">
                                    Bardar
                                </div>
                            </div>
                            @endforeach
                            <div style="width: {{ 121*$building->b_column }}px; border-bottom: 10px solid red;" ></div>
                        @endif
                        @foreach($building->getRoom->reverse() as $room)
                                @if($room->room_number!=='Bardar')
                        <div class="px-4 py-3 border room text-center" style="width: 120px;" data-toggle="tooltip" data-placement="top" title="{{ 0 == $room->sell_status ? "Can Buy" : "Already Sell" }} , price - {{ $room->price }} , width - {{ $room->width }} , height - {{ $room->height }} , information - {{ $room->information }}">
                            <div onclick="location.href='{{\Illuminate\Support\Facades\URL::current().'#'.$room->room_number}}'" class="scroll py-3 border border-primary">
                                {{ $room->room_number }}
                            </div>
                        </div>
                                @endif
                            @endforeach
                    </div>
                    @endslot
            @endcomponent

        </div>
        <div class="col-12 col-md-10">
        @foreach($building->getRoom->reverse() as $room)
            <div class="pt-5" id="{{ $room->room_number }}">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') {{ $room->room_number }} @endslot
                @slot('button')
                @endslot
                @slot('body')
                        <div >
                        <form action="{{ route('room.update',$room->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-inline">
                                <input type="hidden" disabled class="form-control mr-2 @error('room_number') is-invalid @enderror" name="room_number" id="room_number" value="{{ $room->room_number }}" placeholder="Room Number">
                                <div class="btn-group btn-group-toggle mr-2" data-toggle="buttons">
                                    <label class="btn btn-outline-success">
                                        <input type="radio" name="sell_status"  value="0" {{ 0 == $room->sell_status ? "checked" : "" }}> Can Buy
                                    </label>
                                    <label class="btn btn-outline-danger">
                                        <input type="radio" name="sell_status"  value="1" {{ 1 == $room->sell_status ? "checked" : "" }}> Sell
                                    </label>
                                </div>
                                <input type="number" class="form-control mr-2 @error('price') is-invalid @enderror" name="price" id="price" value="{{ $room->price }}" placeholder="Price">
                                <input type="number" class="form-control mr-2 @error('width') is-invalid @enderror" name="width" id="width" value="{{ $room->width }}" placeholder="Width">
                                <input type="number" class="form-control mr-2 @error('height') is-invalid @enderror" name="height" id="height" value="{{ $room->height }}" placeholder="Height">

                                <button type="submit" class="btn btn-primary" ><i class="fas fa-plus-square mr-1"></i> Update Room</button>
                            </div>
                        </form>
                    </div>
                @endslot
            @endcomponent
            </div>
            @endforeach
        </div>

    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
