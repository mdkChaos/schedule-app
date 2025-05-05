@extends('layouts.admin')

@section('title', __('message.edit'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.edit')" :iconClass="'bi bi-pencil-square text-primary'">
            <x-slot:left>
                <x-btn-back :route="route('shifts.index')" />
            </x-slot:left>
            <x-slot:right>
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('shifts.update', $shift) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $shift->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-cancel :route="route('shifts.index')" />
                                <x-btn-save />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
