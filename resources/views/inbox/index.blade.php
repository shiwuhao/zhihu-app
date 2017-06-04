@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">消息通知</div>

                    <div class="panel-body">
                        @foreach($messages as $key => $messageGroup)
                            <div class="media {{ $messageGroup->first()->shouldAddUnreadClass() ? 'unread' : '' }}">
                                <a class="media-left" href="#">
                                    @if(Auth::id() == $key)
                                    <img src="{{ $messageGroup->last()->fromUser->avatar }}" style="width: 48px; height: 48px;">
                                    @else
                                    <img src="{{ $messageGroup->last()->toUser->avatar }}" style="width: 48px; height: 48px;">
                                    @endif
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        @if(Auth::id() == $key)
                                        {{ $messageGroup->first()->fromUser->name }}
                                        @else
                                        {{ $messageGroup->first()->toUser->name }}
                                        @endif
                                    </h4>
                                    <p>
                                        <a href="{{ url('inbox/'.$messageGroup->last()->dialog_id) }}">
                                            {{ $messageGroup->last()->body }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
