@extends('layouts.main')

@section('content') 
@foreach ($orders as $order)
<x-admin-card :order="$order" />
@endforeach
@endsection 