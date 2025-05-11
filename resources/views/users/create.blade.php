<x-admin-layout :title="__('message.users')">
    <div class="container">
        <x-page-header :title="__('message.create')" :iconClass="'bi bi-plus-circle text-primary'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('users.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="mb-3">
                                <x-label for="login" :value="__('message.log_in')" class="form-label fw-semibold" />
                                <x-input id="login" type="text" name="login" class="form-control"
                                    :value="old('login')" required autofocus autocomplete="login" />
                                <x-input-error :messages="$errors->get('login')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="password" :value="__('message.password')" class="form-label fw-semibold" />
                                <x-input id="password" type="password" name="password" class="form-control" required
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <div class="mb-3">
                                <x-label for="password_confirmation" :value="__('message.confirm_password')"
                                    class="form-label fw-semibold" />
                                <x-input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-x-lg'" :message="__('message.cancel')"
                                    :route="route('users.index')" />
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
