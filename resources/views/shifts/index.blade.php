<x-admin-layout :title="__('message.shifts')">
    <div class="container">
        <x-page-header :title="__('message.shifts')" :iconClass="'bi bi-calendar text-danger'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-primary" :icon="'bi-plus-lg'" :message="__('message.add')" :route="route('shifts.create')" />
                <x-btn-link class="me-1 btn-outline-danger" :icon="'bi-trash3'" :message="__('message.trashed')" :route="route('shifts.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        {{-- Table --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shifts as $shift)
                        <tr>
                            <td>{{ $shift->id }}</td>
                            <td>{{ $shift->name }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-eye'" :message="__('message.view')"
                                    :route="route('shifts.show', $shift)" />
                                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')"
                                    :route="route('shifts.edit', $shift)" />
                                <x-btn-delete :route="route('shifts.destroy', $shift)" />
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        {{ $shifts->links() }}
    </div>
</x-admin-layout>
