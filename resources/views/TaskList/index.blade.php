@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
@if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
                {!! Form::open(['route' => 'taskposts.store']) !!}
                    <div class="form-group">
                        <h2>タスク</h2>
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                        <h2>進行状況</h2>
                        {!! Form::textarea('status', old('status'), ['class' => 'form-control', 'rows' => '1']) !!}
                    </div>
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </aside>
            <div class="col-xs-8">
                @if (count($taskposts) > 0)
                    @include('taskposts.taskposts', ['taskposts' => $taskposts])
                @endif
            </div>
        </div>
@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endif
@endsection