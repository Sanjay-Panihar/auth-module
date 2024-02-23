@extends('layouts.app')

@section('content')
    <h1>Web Leads</h1>
    @include('leads.table', ['leads' => $webLeads])

    <h1>Mobile Leads</h1>
    @include('leads.table', ['leads' => $mobileLeads])

    <h1>Auto Leads</h1>
    @include('leads.table', ['leads' => $autoLeads])

    <h1>Embedded Leads</h1>
    @include('leads.table', ['leads' => $embeddedLeads])
@endsection