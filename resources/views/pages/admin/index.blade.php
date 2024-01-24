@extends('layout.dashboard')
@section('content')
@if(session('success'))
@include('aleart.success')
@endif
@endsection
