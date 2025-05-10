<x-app-layout>
    <div class="mb-4 text-secondary small">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <x-label for="password" :value="__('Password')" class="form-label fw-semibold" />
            <x-input id="password" type="password" name="password" class="form-control" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end mt-4">
            <x-button>
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
