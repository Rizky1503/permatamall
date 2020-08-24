@extends('v2video::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('v2video.name') !!}
    </p>
@endsection
