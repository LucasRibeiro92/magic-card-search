@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            @isset($cards)
                @foreach($cards as $card)
                    <div class="col-sm-4">
                        <div class="card">
                            @if(@isset($card->imageUrl))
                                <img class="card-img-top" src="{{$card->imageUrl}}" alt="Card image cap">
                            @else
                                <img class="card-img-top" src="{{ $imageDefault }}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->name }}</h5>
                                @isset($card->text)
                                    <p class="card-text">{{ $card->text }}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
