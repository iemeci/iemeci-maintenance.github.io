@extends('layouts.app')

@section('content')
    @foreach($prefs as $pref)
        {{ $pref->pref_name }}
    @endforeach
@endsection
