@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $task->id }} のタスクの詳細ページ</h1>
    
    <p>{{ $task->status }}</p>
    <p>{{ $task->content }}</p>
    
    {!! link_to_route('tasks.edit', 'このメッセージ編集', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection