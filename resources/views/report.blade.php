@extends('layouts.app')

@section('content')
@if(Auth::user())
<report-component :report='{{$report}}'> </report-component>
@endif

@endsection
