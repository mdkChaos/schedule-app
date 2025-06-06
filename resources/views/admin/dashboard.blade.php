<x-admin-layout>
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3">{{ __('message.admin_panel') }}</h1>
        </div>
        <div class="row justify-content-center g-4">
            @role('Manager')
                <x-dashboard-card icon="bi bi-person-badge" iconColor="danger" :title="__('message.employees')" :text="__('message.employees_management')"
                    :route="route('employees.index')" />
            @endrole

            @role('Admin')
                <x-dashboard-card icon="bi bi-building" iconColor="primary" :title="__('message.factories')" :text="__('message.factories_management')"
                    :route="route('factories.index')" />
                <x-dashboard-card icon="bi bi-gear-wide-connected" iconColor="success" :title="__('message.workshops')" :text="__('message.workshops_management')"
                    :route="route('workshops.index')" />
                <x-dashboard-card icon="bi bi-diagram-3" iconColor="warning" :title="__('message.departments')" :text="__('message.departments_management')"
                    :route="route('departments.index')" />
                <x-dashboard-card icon="bi bi-grid" iconColor="info" :title="__('message.cells')" :text="__('message.cells_management')"
                    :route="route('cells.index')" />
                <x-dashboard-card icon="bi bi-people" iconColor="secondary" :title="__('message.brigades')" :text="__('message.brigades_management')"
                    :route="route('brigades.index')" />
                <x-dashboard-card icon="bi bi-person-vcard" iconColor="dark" :title="__('message.positions')" :text="__('message.positions_management')"
                    :route="route('positions.index')" />
                <x-dashboard-card icon="bi bi-calendar" iconColor="danger" :title="__('message.shifts')" :text="__('message.shifts_management')"
                    :route="route('shifts.index')" />
            @endrole

            @role('Super Admin')
                <x-dashboard-card icon="bi bi-shield-lock" iconColor="primary" :title="__('message.roles')" :text="__('message.roles_management')"
                    :route="route('roles.index')" />
                <x-dashboard-card icon="bi bi-person" iconColor="success" :title="__('message.users')" :text="__('message.users_management')"
                    :route="route('users.index')" />
            @endrole
        </div>
    </div>

    <style>
        .hover-zoom:hover {
            transform: translateY(-8px) scale(1.03);
            transition: 0.2s;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15) !important;
        }
    </style>
</x-admin-layout>
