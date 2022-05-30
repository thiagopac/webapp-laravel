@php
    $permission = $permission ?? null;

    if (!$permission){
        $formAction = route('permissions.store');
        $isEditing = false;
        $formMethod = 'POST';
    }else{
        $formAction = route('permissions.update', $permission->id);
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
                <input type="text" class="form-control form-control-solid" placeholder="{{ __('Nome') }}" name="name" value="{{ $permission->name ?? '' }}">
                <!--end::Input-->

                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->


    </div>
    <!--end::Scroll-->
</form>
