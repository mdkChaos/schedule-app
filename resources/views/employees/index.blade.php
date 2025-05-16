<x-admin-layout :title="__('message.employees')">
    <div class="container">
        <x-page-header :title="__('message.employees')" :iconClass="'bi bi-person-badge text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-primary" :icon="'bi-plus-lg'" :message="__('message.add')" :route="route('employees.create')" />
                <x-btn-link class="me-1 btn-outline-danger" :icon="'bi-trash3'" :message="__('message.trashed')" :route="route('employees.trashed')" />
            </x-slot:right>
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
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-eye'" :message="__('message.view')"
                                    :route="route('employees.show', $employee)" />
                                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')"
                                    :route="route('employees.edit', $employee)" />
                                <x-btn-delete :route="route('employees.destroy', $employee)" />
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
