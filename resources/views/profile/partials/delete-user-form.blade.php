<section class="mb-4">
    <header>
        <h2 class="fs-5 fw-semibold text-danger">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-2 text-secondary small">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button type="button" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-3">
            @csrf
            @method('delete')

            <h2 class="fs-5 fw-semibold text-danger">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>
            <p class="mt-2 text-secondary small">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" class="form-label sr-only" />
                <x-text-input id="password" name="password" type="password" class="form-control w-75"
                    placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end gap-2">
                <x-secondary-button type="button" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
