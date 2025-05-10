<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="text-center mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-person-circle fs-1 text-primary"></i>
                            <h4 class="fw-bold mt-2 mb-0">{{ __('message.login') }}</h4>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-label for="login" :value="__('message.log_in')" class="form-label fw-semibold" />
                                <x-input id="login" type="text" name="login" class="form-control"
                                    :value="old('login')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('login')" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-label for="password" :value="__('message.password')" class="form-label fw-semibold" />
                                <x-input id="password" type="password" name="password" class="form-control" required
                                    autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <x-input id="remember_me" type="checkbox" class="form-check-input" name="remember"
                                        :value="old('remember')" />
                                    <x-label for="remember_me" class="form-check-label" :value="__('message.remember_me')" />
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <x-button class="btn-outline-primary px-4 py-2">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> {{ __('message.login') }}
                                </x-button>
                            </div>

                            <div class="d-grid">
                                <x-btn-link class="btn-outline-secondary px-4 py-2" route="{{ route('register') }}"
                                    icon="bi bi-person-plus" message="{{ __('message.register') }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
