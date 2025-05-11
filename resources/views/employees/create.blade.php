<x-admin-layout :title="__('message.employees')">
    <x-page-header :title="__('message.create')" :iconClass="'bi bi-plus-circle text-primary'">
        <x-slot:left>
            <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('employees.index')" />
        </x-slot:left>
    </x-page-header>

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">{{ __('message.first_name') }}</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label fw-semibold">{{ __('message.surname') }}</label>
                            <input type="text" name="surname" id="surname"
                                class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}"
                                required>
                            @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                :route="route('employees.index')" />
                            <x-button class="btn-outline-success">
                                <i class="bi bi-check-circle"></i> {{ __('message.create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
