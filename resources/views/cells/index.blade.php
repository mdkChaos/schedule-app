<x-admin-layout :title="__('message.cells')">
    <div class="container">
        <x-page-header :title="__('message.cells')" :iconClass="'bi bi-grid text-info'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-primary" :icon="'bi-plus-lg'" :message="__('message.add')" :route="route('cells.create')" />
                <x-btn-link class="me-1 btn-outline-danger" :icon="'bi-trash3'" :message="__('message.trashed')" :route="route('cells.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.cell') }}</th>
                        <th scope="col">{{ __('message.department') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cells as $cell)
                        <tr>
                            <td>{{ $cell->id }}</td>
                            <td>{{ $cell->name }}</td>
                            <td>{{ $cell->department->name ?? '—' }}</td>

                            <td class="text-end">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-eye'" :message="__('message.view')"
                                    :route="route('cells.show', $cell)" />
                                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')"
                                    :route="route('cells.edit', $cell)" />
                                <x-btn-delete :route="route('cells.destroy', $cell)" />
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
        {{ $cells->links() }}
    </div>
</x-admin-layout>
