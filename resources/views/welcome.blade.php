@extends('layouts.app')
@section('content')
<div class="w-100 d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-white display-4">Questimize.ME</h1>
    <nav-bar></nav-bar>
    <router-view/>
    <quest-component></quest-component>
</div>
@endsection