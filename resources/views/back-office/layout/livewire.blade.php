@extends('back-office.layout.admin')

@push('livewire-styles')
    @livewireStyles
@endpush

@section('content')
@yield('livewire-component')
@endsection

@push('livewire-scripts')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> --}}
    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />
@endpush
