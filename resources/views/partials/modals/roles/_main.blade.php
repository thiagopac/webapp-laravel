@php
    $role = $role ?? null;

    if (!$role){
        $formAction = route('roles.store');
        $isEditing = false;
        $formMethod = 'POST';
    }else{
        $formAction = route('roles.update', $role->id);
        $isEditing = true;
        $formMethod = 'PATCH';
    }
@endphp

<!--begin::Modal Title-->
<div class="modal-title-captured">{{ __('Dados do perfil') }}</div>
<!--End::Modal Title-->

<form id="master-modal-form" class="form" method="POST" action="{{ $formAction }}">
    @csrf
    @method($formMethod)

    <!--begin::Scroll-->
    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px" style="max-height: 239px;">

        <!--begin::Input group-->
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Nome') }} </label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="{{ __('Nome') }}" name="name" value="{{ $role->name ?? '' }}">
                <!--end::Input-->

                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Permissões') }} </label>
                <!--end::Label-->

                <div class="table-responsive">
                    <table class="table table-striped gy-4 gs-4">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th><input type="checkbox" name="all_permission"></th>
                            <th>{{ __('Permissão') }}</th>
                            <th>{{ __('Tipo') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="permission[{{ $permission->name }}]"
                                               value="{{ $permission->name }}"
                                               class='permission'
                                            {{ in_array($permission->name, $rolePermissions)
                                                ? 'checked'
                                                : '' }}>
                                    </td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->


    </div>
    <!--end::Scroll-->
</form>
<script>
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }

        });
    });
</script>
