@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-lg-8 column">
                        <div class="row">
                            @foreach($tidings as $tiding)
                                <div class="col-lg-6">
                                    @include('tidings/tiding_item', ['data' => $tiding])
                                </div>
                            @endforeach
                        </div>
                    @if ($clearSearch==true)
                        {!! $tidings->links('tidings.pagination'); !!}
                    @endif
                </div>
                </div>
            </div>
        </div>


@endsection