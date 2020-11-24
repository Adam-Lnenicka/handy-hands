
@extends('layouts.app')

@section('content')
<div class="center">
<h1>Messages</h1>

<form action="{{ action('MessageController@store', [$post_id ]) }}" method="POST">
    @csrf
    <label for="text">Type your message</label>
    <input type="text" name="text" id="text"/>

  <button>reply</button>
    
    <br/>
</form>

@foreach($messages as $message)
    <p>
            <strong>{{ $message->text }}</strong>

<div class="py-12">
    <div class=" sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <p >
                    <strong>{{ $message->text }}</strong>

                    @if ($message->fromUser)
                    <p>{{ $message->fromUser->name }}</p>
            
                    @endif
            </p>
        </div>
    </div>

@endforeach
@endsection

