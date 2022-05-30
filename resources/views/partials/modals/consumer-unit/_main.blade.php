@php
    $viewObject = $viewObject ?? '';

    if (!$viewObject->uuid){
        $formAction = route('ownership.store');
        $isEditing = false;
        $formMethod = 'POST';
    }else{
        $formAction = route('ownership.update', $viewObject->uuid);
        $isEditing = true;
        $formMethod = 'PUT';
    }
@endphp

<!--begin::Modal Title-->
<div class="modal-title-captured">{{ __('Unidade Consumidora') }}</div>
<!--End::Modal Title-->

<form id="master-modal-form" class="form" method="POST" action="{{ $formAction }}">
@csrf
@method($formMethod)

    <!--begin::Scroll-->
    <div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px" style="max-height: 239px;">

        @if(!$isEditing)
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
            <!--end::Svg Icon-->
            <!--end::Icon-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-bold">
                    <h4 class="text-gray-900 fw-bolder">{{ __('Atenção') }}</h4>
                    <div class="fs-6 text-gray-700">{{ __('Todas as unidades consumidoras cadastradas precisam ser de sua titularidade') }}</div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
        @endif

        <!--begin::Input group-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-7 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Nome') }} <small class="text-gray-600">({{ __('Identificador amigável') }})</small></label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="{{ __('Ex: Casa, loja, sítio, etc') }}" name="name" value="{{ $viewObject->name }}">
                <!--end::Input-->

                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-5 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Tipo') }}</label>
                <!--end::Label-->
                <select name="type" data-control="select2" class="form-select form-select-solid form-select-lg">
                    <option>{{ __('Selecione o tipo') }}</option>
                    <option value="residence" {{ $viewObject->type === 'residence' ? 'selected' : '' }}>{{ __('Residencial') }}</option>
                    <option value="business" {{ $viewObject->type === 'business' ? 'selected' : '' }}>{{ __('Comercial') }}</option>
                    <option value="property" {{ $viewObject->type === 'property' ? 'selected' : '' }}>{{ __('Propriedade em geral') }}</option>
                </select>

            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-12 fv-row fv-plugins-icon-container">
                <!--end::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Código da Unidade Consumidora') }} <small class="text-gray-600">({{ __('Vide fatura de energia') }})</small></label>
                <!--end::Label-->
                <!--end::Input-->
                <input type="text" class="form-control form-control-solid" name="code" value="{{ $viewObject->code }}" placeholder="Ex: 1/0123456789-0" data-inputmask="'mask':'9/9999999999-9'" onfocus="Inputmask().mask(document.querySelectorAll('input'));">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-8 fv-row fv-plugins-icon-container">
                <!--end::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Endereço') }} <small class="text-gray-600">({{ __('Rua/Avenida/Alameda') }})</small></label>
                <!--end::Label-->
                <!--end::Input-->
                <input type="text" class="form-control form-control-solid" name="address" value="{{ $viewObject->address }}" placeholder="Ex: Rua São Paulo">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 fv-row fv-plugins-icon-container">
                <!--end::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Número') }}</label>
                <!--end::Label-->
                <!--end::Input-->
                <input type="text" class="form-control form-control-solid" name="number" value="{{ $viewObject->number }}" placeholder="Ex: 100">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Estado') }}</label>
                <!--end::Label-->
                <select name="state" data-value="{{ $viewObject->city->state_id ?? '' }}" data-control="select2" data-select-dependent="true" data-select-order="1" data-select-model="states" data-select-fields="id,name" data-select-orderby="id asc" data-select-field-link="" data-select-affect="city_id" class="form-select form-select-solid form-select-lg">
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-5 fw-bold mb-2">{{ __('Cidade') }}</label>
                <!--end::Label-->
                <select name="city_id" data-value="{{ $viewObject->city_id ?? '' }}" data-control="select2" data-select-dependent="true" data-select-order="2" data-select-model="cities" data-select-fields="id,name" data-select-orderby="class asc,name asc" data-select-field-link="state_id" data-select-affected="state" class="form-select form-select-solid form-select-lg">
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Scroll-->
</form>

<script src="{{ asset(theme()->getDemo() . '/js/custom/dropdown/dependent-selects.js') }}" type="application/javascript"></script>
