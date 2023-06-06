@extends('layouts.app')

@section('title', 'Questions')

@section('content')

<a href="{{route('questions.create')}}" class="btn btn-primary">ADSD eerste</a>
<a href="{{route('questions.create', ['graduate'=> 1])}}" class="btn btn-primary">ADSD Afstudeer</a>
<a href="" class="btn btn-primary">HBO</a>

@endsection