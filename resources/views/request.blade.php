@extends('layouts.main')

@section('content') 
<x-guest-layout>
    <form class="flex justify-center flex-wrap items-center" method="POST" action="{{ route('request.store') }}">
        @csrf
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <strong>Произошла ошибка при регистрации:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h1 class="text-center mb-20 text-5xl"></h1>
        <h1 class="text-center text-blue-500/100 mb-10 text-4xl">Создание заявки</h1>
        <div class="mt-4 ">
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-text-input id="time" class="block mt-1 w-full" type="time" name="time" :value="old('time')" required autocomplete="time" />
            <x-input-error :messages="$errors->get('time')" class="mt-2" />
        </div>
        <select id="furniture_id" name="type" class="block mt-4 w-full" required>
            @foreach($furnitures as $furniture)
                <option value="{{ $furniture->id }}">{{ $furniture->title }}</option>
            @endforeach
        </select>
        <select name="payment" id="payment">
            <option value="наличными">наличными</option>
            <option value="банковская карта">банковская карта</option>
            <option value="безналичный расчет">безналичный расчет</option>
        </select>
       
        <div class="mt-4">
            <x-text-input id="count" class="block mt-1 w-full" type="count" name="count" :value="old('count')" required autocomplete="count" />
            <x-input-error :messages="$errors->get('count')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Создать заявку') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection      

        <!-- Service Selection 
        
-->