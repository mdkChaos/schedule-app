<x-admin-layout :title="__('message.employees')">
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('employees.index')" />
            </x-slot:left>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.first_name') }}</th>
                        <th scope="col">{{ __('message.surname') }}</th>
                        <th scope="col">{{ __('message.position') }}</th>
                        <th scope="col">{{ __('message.cell') }}</th>
                        <th scope="col">{{ __('message.brigade') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->position->name }}</td>
                            <td>{{ $employee->currentCell?->cell?->name ?? '—' }}</td>
                            <td>{{ $employee->currentBrigade?->brigade?->name ?? '—' }}</td>
                            <td class="text-end">
                                <x-btn-restore :route="route('employees.restore', $employee->id)" />
                                <x-btn-force-delete :route="route('employees.forceDelete', $employee->id)" />
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
        {{ $employees->links() }}
    </div>
</x-admin-layout>
