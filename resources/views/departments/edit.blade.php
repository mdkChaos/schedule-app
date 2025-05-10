<x-admin-layout :title="__('message.departments')">
    <div class="container">
        <x-page-header :title="__('message.edit')" :iconClass="'bi bi-pencil-square text-warning'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('departments.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('departments.update', $department) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="workshop_id"
                                    class="form-label fw-semibold">{{ __('message.workshop') }}</label>
                                <select name="workshop_id" id="workshop_id"
                                    class="form-select @error('workshop_id') is-invalid @enderror" required>
                                    <option value="" disabled>{{ __('message.choose') }}</option>
                                    @foreach ($workshops as $workshop)
                                        <option value="{{ $workshop->id }}"
                                            {{ old('workshop_id', $department->workshop_id) == $workshop->id ? 'selected' : '' }}>
                                            {{ $workshop->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('workshop_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $department->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                    :route="route('departments.index')" />
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
