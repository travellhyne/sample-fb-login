@extends('layouts.app')

@section('content')
<div id="app">
    <my-app user="{{ Auth::user()->id }}"></my-app>
</div>
@endsection
