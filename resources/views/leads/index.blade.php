@extends('layouts.app')

@section('content')
    <h1>Web Leads</h1>
    @include('partials.table', ['leads' => $leads['WEB']])

    <h1>Mobile Leads</h1>
    @include('partials.table', ['leads' => $leads['MOBILE']])

    <h1>Auto Leads</h1>
    @include('partials.table', ['leads' => $leads['AUTO']])

    <h1>Embedded Leads</h1>
    @include('partials.table', ['leads' => $leads['EMBEDDED']])
@endsection
