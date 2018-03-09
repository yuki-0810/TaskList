<ul class="media-list">
@foreach ($taskposts as $taskpost)
    <?php $user = $taskpost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                <span class="text-muted">posted at {{ $taskpost->created_at }}</span>
            </div>
            <div>
                <p>タスク: {!! link_to_route('taskposts.edit', $taskpost->content , ['id' => $taskpost->id]) !!}
                <br>進行状況: {!! link_to_route('taskposts.edit', $taskpost->status , ['id' => $taskpost->id]) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $taskpost->user_id)
                    {!! Form::open(['route' => ['taskposts.destroy', $taskpost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $taskposts->render() !!}