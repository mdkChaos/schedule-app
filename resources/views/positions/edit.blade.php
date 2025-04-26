@extends('layouts.admin')

@section('title', __('message.edit_position'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.edit_position')" :iconClass="'bi bi-pencil-square text-dark'">
            <x-slot:left>
                <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.back') }}
                </a>
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('positions.update', $position) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $position->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg"></i> {{ __('message.cancel') }}
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-save"></i> {{ __('message.save_changes') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
