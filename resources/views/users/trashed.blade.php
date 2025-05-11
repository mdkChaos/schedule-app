<x-admin-layout :title="__('message.users')">
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('users.index')" />
            </x-slot:left>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.log_in') }}</th>
                        <th scope="col">{{ __('message.role') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td class="text-end">
                                <x-btn-restore :route="route('users.restore', $user)" />
                                <x-btn-force-delete :route="route('users.forceDelete', $user)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
</x-admin-layout>
