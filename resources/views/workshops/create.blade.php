<x-admin-layout :title="__('message.workshops')">
    <div class="container">
        <x-page-header :title="__('message.create')" :iconClass="'bi bi-plus-circle text-success'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('workshops.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('workshops.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="mb-3">
                                <label for="factory_id"
                                    class="form-label fw-semibold">{{ __('message.factory') }}</label>
                                <select name="factory_id" id="factory_id"
                                    class="form-select @error('factory_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('message.choose') }}</option>
                                    @foreach ($factories as $factory)
                                        <option value="{{ $factory->id }}"
                                            {{ old('factory_id') == $factory->id ? 'selected' : '' }}>
                                            {{ $factory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('factory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                    :route="route('workshops.index')" />
                                <x-button class="btn-outline-success">
                                    <i class="bi bi-check-circle"></i> {{ __('message.create') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
