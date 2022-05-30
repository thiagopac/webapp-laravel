@php
    $user = $user ?? '';
    $userRole = $userRole ?? '';

    if (!$user->uuid){
        $formAction = route('users.create');
        $isEditing = false;
        $formMethod = 'POST';
    }else{
        $formAction = route('users.update', $user->uuid);
        $isEditing = true;
        $formMethod = 'PUT';
    }
@endphp

<!--begin::Modal Title-->
<div class="modal-title-captured">{{ __('Dados do usuário') }}</div>
<!--End::Modal Title-->

<form id="master-modal-form" class="form" method="POST" action="{{ $formAction }}">
    @csrf
    @method($formMethod)

    <!--begin::Scroll-->
    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px" style="max-height: 239px;">

        @if(!$isEditing)

            <!--begin::Input group-->
            <div class="row mb-5">

                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">{{ __('Nome') }} </label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="{{ __('Nome') }}" name="first_name" value="{{ $user->first_name }}">
                    <!--end::Input-->

                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">{{ __('Sobrenome') }} </label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="{{ __('Sobrenome') }}" name="last_name" value="{{ $user->last_name }}">
                    <!--end::Input-->

                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-5">

                <!--begin::Col-->
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">{{ __('E-mail') }} </label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="email" class="required form-control form-control-solid" placeholder="{{ __('E-mail') }}" name="email" value="{{ $user->email }}">
                    <!--end::Input-->

                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Input group-->

        @endif

        <!--begin::Input group-->
        <div class="row mb-5">

            @if(!$isEditing)
                <!--begin::Col-->
                    <div class="col-md-6 fv-row fv-plugins-icon-container">

                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">{{ __('Senha') }} </label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input type="password" class="form-control form-control-solid" placeholder="{{ __('Senha') }}" name="password" value="">
                        <!--end::Input-->

                    </div>
                    <!--end::Col-->
            @else
                <!--begin::Col-->
                    <div class="col-md-6 fv-row fv-plugins-icon-container">

                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">{{ __('E-mail') }} </label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control form-control-solid text-gray-400" value="{{ $user->email }}" disabled readonly>
                        <!--end::Input-->

                    </div>
                    <!--end::Col-->
            @endif

            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">

                <!--begin::Label-->
                <label class="fs-5 fw-bold mb-2">{{ __('Perfil') }} </label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <select name="role" id="role" aria-label="{{ __('Selecione o perfil') }}" data-control="select2" data-placeholder="{{ __('Selecione o perfil') }}" class="form-select form-select-solid form-select-lg">
                        <option value="">{{ __('Cliente') }}</option>
                        @foreach($roles as $role)
                            <option data-bs-code="{{ $role->id }}" value="{{ $role->id }}" {{ $role->name === old('role', $userRole ?? '') ? 'selected' :'' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->

    </div>
    <!--end::Scroll-->
</form>
