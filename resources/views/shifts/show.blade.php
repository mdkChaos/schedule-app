<x-admin-layout :title="__('message.shifts')">
    <div class="container">
        <x-page-header :title="$shift->name" :iconClass="'bi bi-building text-primary'">
            <x-slot:left>
                <x-btn-link class="me-1 btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('shifts.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="me-1 btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')" :route="route('shifts.edit', $shift)" />
                <x-btn-delete :route="route('shifts.destroy', $shift)" />
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
                                <dd class="col-sm-8 mb-0">{{ $shift->id }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.shift') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $shift->name }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.created') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $shift->created_at->format('d.m.Y H:i') }}</dd>
                            </div>
                            <div class="row align-items-center py-2">
                                <dt class="col-sm-4">{{ __('message.updated') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $shift->updated_at->format('d.m.Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
