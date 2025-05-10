<x-admin-layout :title="__('message.workshops')">
    <div class="container">
        <x-page-header :title="__('message.workshops')" :iconClass="'bi bi-gear-wide-connected text-success'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-primary" :icon="'bi-plus-lg'" :message="__('message.add')" :route="route('workshops.create')" />
                <x-btn-link class="me-1 btn-outline-danger" :icon="'bi-trash3'" :message="__('message.trashed')" :route="route('workshops.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.workshop') }}</th>
                        <th scope="col">{{ __('message.factory') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td>{{ $workshop->id }}</td>
                            <td>{{ $workshop->name }}</td>
                            <td>{{ $workshop->factory->name ?? '—' }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-eye'" :message="__('message.view')"
                                    :route="route('workshops.show', $workshop)" />
                                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')"
                                    :route="route('workshops.edit', $workshop)" />
                                <x-btn-delete :route="route('workshops.destroy', $workshop)" />
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
        {{ $workshops->links() }}
    </div>
</x-admin-layout>
