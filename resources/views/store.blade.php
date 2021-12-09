@extends('layouts.app')

@section('content')
@if(Auth::user())
<store-component> </store-component>
@endif

@endsection
