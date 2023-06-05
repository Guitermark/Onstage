@extends('layouts.app')

@section('title', 'Questions')

@section('content')

<a href="{{route('questions.create')}}" class="btn btn-primary">ADSD Comakership 1</a>
<a href="{{route('questions.create', ['graduate'=> 1])}}" class="btn btn-primary">ADSD Afstudeer Comakership</a>
{{-- <a href="" class="btn btn-primary">HBO</a> --}}

@endsection