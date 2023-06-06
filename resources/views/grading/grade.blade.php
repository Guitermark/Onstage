@extends('layouts.app')

@section('title', 'Questions')

@section('content')

<div class="row">
    @if($accepted)
        Opdracht is accepteerd
    @else
    <form action="{{route('user.reject', ['question'=> $assignment->id])}}" method="post">
        @csrf
        <input type="text" value="{{$key}}" hidden name="key"/>
        <label for="reason">Reden van afwijzen</label>
        <textarea name="reason" class="form-control" id="reason"></textarea>
        <button type="submit" name="submit" value="save" class="btn btn-primary">
            Feedback versturen
        </button>
    </form>
    @endif
    <h1></h1>
</div>

@endsection