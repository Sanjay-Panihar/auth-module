@extends('layouts.app')

@section('content')
    @foreach ($leads as $leadType => $leadsOfType)
        @php
            $activeLeads = $leadsOfType->filter(function ($lead) {
                return $lead->user && $lead->user->status === 'ACTIVE';
            });
        @endphp

        <h1>{{ ucfirst(strtolower($leadType)) }} Leads</h1>
        @include('partials.table', ['leads' => $activeLeads])
    @endforeach
@endsection
