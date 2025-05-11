<x-admin-layout :title="__('message.users')">
    <div class="container">
        <x-page-header :title="__('message.edit')" :iconClass="'bi bi-pencil-square text-primary'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('users.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <x-label for="login" :value="__('message.log_in')" class="form-label fw-semibold" />
                                <x-input id="login" type="text" name="login" class="form-control"
                                    :value="$user->login" required autofocus autocomplete="login" />
                                <x-input-error :messages="$errors->get('login')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="role_id" :value="__('message.role')" class="form-label fw-semibold" />
                                <select name="role_id" id="role_id"
                                    class="form-select @error('role_id') is-invalid @enderror" required>
                                    <option value="">{{ __('message.choose') }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('role_id')" />
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                    :route="route('users.index')" />
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
