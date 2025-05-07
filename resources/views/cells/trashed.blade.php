<x-admin-layout :title="__('message.cells')">
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-link class="btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('cells.index')" />
            </x-slot:left>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.department') }}</th>
                        <th scope="col">{{ __('message.deleted') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedCells as $cell)
                        <tr>
                            <td>{{ $cell->id }}</td>
                            <td>{{ $cell->name }}</td>
                            <td>{{ $cell->department->name ?? '—' }}</td>
                            <td>{{ $cell->deleted_at->format('d.m.Y H:i') }}</td>

                            <td class="text-end">
                                <x-btn-restore :route="route('cells.restore', $cell)" />
                                <x-btn-force-delete :route="route('cells.forceDelete', $cell)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        {{ $deletedCells->links() }}
    </div>
</x-admin-layout>
