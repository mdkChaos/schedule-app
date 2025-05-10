<x-admin-layout :title="__('message.departments')">
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('departments.index')" />
            </x-slot:left>
        </x-page-header>

        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.department') }}</th>
                        <th scope="col">{{ __('message.workshop') }}</th>
                        <th scope="col">{{ __('message.deleted') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedDepartments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->workshop->name ?? '—' }}</td>
                            <td>{{ $department->deleted_at->format('d.m.Y H:i') }}</td>

                            <td class="text-end">
                                <x-btn-restore :route="route('departments.restore', $department)" />
                                <x-btn-force-delete :route="route('departments.forceDelete', $department)" />
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
        {{ $deletedDepartments->links() }}
    </div>
</x-admin-layout>
