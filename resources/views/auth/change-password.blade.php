<x-admin-layout :title="__('message.change_password')">
    <div class="container">
        <x-page-header :title="__('message.change_password')" :iconClass="'bi bi-key-fill text-warning'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            {{-- Current Password --}}
                            <div class="mb-3">
                                <x-label for="current_password" :value="__('message.current_password')" class="form-label fw-semibold" />
                                <x-input id="current_password" type="password" name="current_password" required
                                    autocomplete="current-password" class="form-control" />
                                <x-input-error :messages="$errors->get('current_password')" />
                            </div>

                            {{-- New Password --}}
                            <div class="mb-3">
                                <x-label for="password" :value="__('message.new_password')" class="form-label fw-semibold" />
                                <x-input id="password" type="password" name="password" required
                                    autocomplete="new-password" class="form-control" />
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <x-label for="password_confirmation" :value="__('message.confirm_password')"
                                    class="form-label fw-semibold" />
                                <x-input id="password_confirmation" type="password" name="password_confirmation"
                                    required autocomplete="new-password" class="form-control" />
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <x-button class="btn-outline-success">
                                    <i class="bi bi-check-circle"></i> {{ __('message.save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
