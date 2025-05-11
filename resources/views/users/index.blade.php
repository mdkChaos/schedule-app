<x-admin-layout :title="__('message.users')">
    <div class="container">
        <x-page-header :title="__('message.users')" :iconClass="'bi bi-person text-success'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-primary" :icon="'bi-plus-lg'" :message="__('message.add')" :route="route('users.create')" />
                <x-btn-link class="me-1 btn-outline-danger" :icon="'bi-trash3'" :message="__('message.trashed')" :route="route('users.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.login') }}</th>
                        <th scope="col">{{ __('message.role') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->role?->name }}</td>
                            <td class="text-end">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-eye'" :message="__('message.view')"
                                    :route="route('users.show', $user)" />
                                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')"
                                    :route="route('users.edit', $user)" />
                                <x-btn-delete :route="route('users.destroy', $user)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="
                                5" class="text-center text-muted">
                                {{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
</x-admin-layout>
