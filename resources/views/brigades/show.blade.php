<x-admin-layout :title="__('message.brigades')">
    <div class="container">
        <x-page-header :title="$brigade->name" :iconClass="'bi bi-people text-secondary'">
            <x-slot:left>
                <x-btn-link class="btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('brigades.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')" :route="route('brigades.edit', $brigade)" />
                <x-btn-delete :route="route('brigades.destroy', $brigade)" />
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary text-center fw-semibold">
                            <i class="bi bi-info-circle"></i> {{ __('message.details') }}
                        </h5>
                        <dl class="row mb-0">
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">ID</dt>
                                <dd class="col-sm-8 mb-0">{{ $brigade->id }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.brigade') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $brigade->name }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.created') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $brigade->created_at->format('d.m.Y H:i') }}</dd>
                            </div>
                            <div class="row align-items-center py-2">
                                <dt class="col-sm-4">{{ __('message.updated') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $brigade->updated_at->format('d.m.Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
