<x-admin-layout :title="__('message.shifts')">
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-link class="btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('shifts.index')" />
            </x-slot:left>
        </x-page-header>

        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.deleted') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shifts as $shift)
                        <tr>
                            <td>{{ $shift->id }}</td>
                            <td>{{ $shift->name }}</td>
                            <td>{{ $shift->deleted_at->format('d.m.Y H:i') }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">

                                <x-btn-restore :route="route('shifts.restore', $shift)" />
                                <x-btn-force-delete :route="route('shifts.forceDelete', $shift)" />

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        {{ $shifts->links() }}
    </div>
</x-admin-layout>
