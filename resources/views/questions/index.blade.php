@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($questions as $question)
                    <div class="media">
                        <a class="media-left" href="">
                            <img src="{{ $question->user->avatar }}" style="width: 64px; height: 64px;" alt="{{ $question->user->name }}">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ url('questions/'.$question->id) }}">
                                    {{ $question->title }}
                                </a>
                            </h4>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
