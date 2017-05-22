@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $question->title }}


                    @foreach($question->topics as $topic)
                        <span class="topic" style="color: red;">{{ $topic->name }}</span>
                    @endforeach
                    </div>

                    <div class="panel-body">
                        {!! $question->body !!}
                    </div>

                    <div class="actions">
                        @if(Auth::check() && Auth::user()->owns($question))
                            <span class="edit"><a href="{{ url('questions/'.$question->id).'/edit' }}">编辑</a></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
