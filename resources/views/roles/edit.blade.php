<x-admin-layout :title="__('message.roles')">
    <div class="container">
        <x-page-header :title="__('message.edit')" :iconClass="'bi bi-pencil-square text-primary'">
            <x-slot:left>
                <x-btn-link class="btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('roles.index')" />
            </x-slot:left>
            <x-slot:right>
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $role->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label fw-semibold">{{ __('message.level') }}</label>
                                <input type="number" name="level" id="level"
                                    class="form-control @error('level') is-invalid @enderror"
                                    value="{{ old('level', $role->level) }}" required>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <x-btn-link class="btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                        :route="route('roles.index')" />
                                    <x-button class="btn-outline-success">
                                        <i class="bi bi-save"></i> {{ __('message.save') }}
                                    </x-button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
