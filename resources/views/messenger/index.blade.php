@extends('app')

@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)

            {{--@if($thread->participantsUserIds()[0] == Auth::id() || $thread->participantsUserIds()[1] == Auth::id())--}}

                <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                <div class=" {!!$class!!}"><!--media alert-->
                    <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                    <p>{!! $thread->latestMessage->body !!}</p>
                    <p><small><strong>Creator:</strong> {!! $thread->creator()->username !!}</small></p>
                    <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
                </div>
            {{--@endif--}}
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
@stop