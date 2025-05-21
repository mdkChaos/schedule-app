<x-admin-layout :title="__('message.employees')">
    <div class="container">
        <x-page-header :title="__('message.edit')" :iconClass="'bi bi-pencil-square text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('employees.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <x-label for="name" :value="__('message.first_name')" class="form-label fw-semibold" />
                                <x-input id="name" type="text" name="name" class="form-control"
                                    :value="old('name', $employee->name)" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="surname" :value="__('message.surname')" class="form-label fw-semibold" />
                                <x-input id="surname" type="text" name="surname" class="form-control"
                                    :value="old('surname', $employee->surname)" required autofocus autocomplete="surname" />
                                <x-input-error :messages="$errors->get('surname')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="position_id" :value="__('message.position')" class="form-label fw-semibold" />
                                <select name="position_id" id="position_id"
                                    class="form-select @error('position_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('message.choose') }}</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('position_id')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="cell_id" :value="__('message.cell')" class="form-label fw-semibold" />
                                <select name="cell_id" id="cell_id"
                                    class="form-select @error('cell_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('message.choose') }}</option>
                                    @foreach ($cells as $cell)
                                        <option value="{{ $cell->id }}"
                                            {{ old('cell_id', $employee->cell_id) == $cell->id ? 'selected' : '' }}>
                                            {{ $cell->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('cell_id')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="brigade_id" :value="__('message.brigade')" class="form-label fw-semibold" />
                                <select name="brigade_id" id="brigade_id"
                                    class="form-select @error('brigade_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>{{ __('message.choose') }}</option>
                                    @foreach ($brigades as $brigade)
                                        <option value="{{ $brigade->id }}"
                                            {{ old('brigade_id', $employee->brigade_id) == $brigade->id ? 'selected' : '' }}>
                                            {{ $brigade->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('brigade_id')" />
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                    :route="route('employees.index')" />
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
