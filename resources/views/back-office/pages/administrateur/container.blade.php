@extends('back-office.layout.admin')
@section('title', 'Espace administrateur')

@push('livewire-styles')
    @livewireStyles
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">
        @yield('breadcrumb')
    </div>
    @include('partials.flash-message')
    @yield('content')
</div>
@endsection

@push('livewire-scripts')
    @livewireStyles
@endpush
