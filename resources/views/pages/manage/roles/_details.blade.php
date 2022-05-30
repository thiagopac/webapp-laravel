<style>
    .dtr-details {
        display: block !important;
    }
</style>

<div class="table-responsive">
    <table class="table table-striped gy-4 gs-4">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="text-center w-550px">{{ __('Permissão') }}</th>
            <th class="text-center">{{ __('Tipo') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr class="text-center">
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
