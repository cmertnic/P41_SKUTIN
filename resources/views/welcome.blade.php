@extends('layouts.main')

@section('content')
    @foreach ($orders as $order)
        <x-order-card :order="$order" />
    @endforeach
    <form class="flex justify-center" method="GET" action="{{ route('request.create') }}">
        @csrf
        <x-primary-button>
            {{ __('подать заявку') }}
        </x-primary-button>
    </form>
@endsection
