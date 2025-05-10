<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="text-center mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-person-plus fs-1 text-primary"></i>
                            <h4 class="fw-bold mt-2 mb-0">{{ __('message.register') }}</h4>
                        </div>

                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <x-label for="login" :value="__('message.log_in')" class="form-label fw-semibold" />
                                <x-input id="login" type="text" name="login" class="form-control"
                                    :value="old('login')" required autofocus autocomplete="login" />
                                <x-input-error :messages="$errors->get('login')" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-label for="password" :value="__('message.password')" class="form-label fw-semibold" />
                                <x-input id="password" type="password" name="password" class="form-control" required
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <x-label for="password_confirmation" :value="__('message.confirm_password')" class="form-label fw-semibold" />
                                <x-input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            <div class="d-grid mb-3">
                                <x-button class="btn-outline-primary px-4 py-2">
                                    <i class="bi bi-person-plus me-1"></i> {{ __('message.register') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
