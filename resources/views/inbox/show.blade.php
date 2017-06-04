@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">对话列表</div>

                    <div class="panel-body">
                        <form action="{{ url('inbox/'.$dialogId.'/store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" class="form-control"> </textarea>
                            </div>
                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success btn-xs">发送私信</button>
                            </div>
                        </form>
                        @foreach($messages as $key => $message)
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="{{ $message->fromUser->avatar }}" style="width: 48px; height: 48px;">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{ $message->fromUser->name }}
                                    </h4>
                                    {{ $message->body }}
                                    <span class="pull-right">{{ $message->created_at->format('Y-m-d H:i') }}</span>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
