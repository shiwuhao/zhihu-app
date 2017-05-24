@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
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
                            <span class="edit">
                                <a class="btn btn-success btn-xs form-inline" href="{{ url('questions/'.$question->id).'/edit' }}">编辑</a>
                            </span>
                            <form action="{{ url('questions/'.$question->id) }}" method="post" class="pull-left form-inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs">删除</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default"  style="text-align: center;">
                    <div class="panel-heading">
                        <h2>{{ $question->followers_count }}</h2>
                        <span>关注者</span>
                    </div>
                    <div class="panel-body">
                        <question-follow-button question="{{ $question->id }}" user="{{ Auth::id() }}"></question-follow-button>
                        <a href="#editor" class="btn btn-primary">赚些答案</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $question->answers_count }} 个答案
                    </div>

                    <div class="panel-body">

                        @foreach($question->answers as $answer)
                            <div class="media" style="margin: 10px 0;">
                                <a class="media-left" href="">
                                    <img src="{{ $question->user->avatar }}" style="width: 32px; height: 32px;" alt="{{ $question->user->name }}">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ url('user/'.$question->user->id) }}">
                                            {!! $answer->body  !!}
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        @endforeach

                        @if(Auth::check())
                        <form action="{{ url('questions/'.$question->id.'/answer') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <script id="container" name="body" type="text/plain" style="height:200px;">
                                    {!! old('body') !!}
                                </script>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <button class="btn btn-success pull-right" type="submit">提交答案</button>
                        </form>
                        @else
                                <a href="{{ url('login') }}" class="btn btn-success btn-xs">登录提交答案</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('vendor.ueditor.assets')
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            toolbars: [
                ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode:true,
            wordCount:false,
            imagePopup:false,
            autotypeset:{ indent: true,imageBlockLine: 'center' }
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>
@endsection
