<x-base-layout>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <button data-url="{{ route('roles.create') }}" class="open-master-modal btn btn-primary float-start mt-5" data-bs-toggle="modal" data-bs-target="#master-modal">Novo perfil</button>
            @include('pages.manage.roles._table')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
