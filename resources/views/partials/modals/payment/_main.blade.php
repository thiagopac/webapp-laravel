@php
    $viewObject = $viewObject ?? '';
    $formAction = route('payment.store', $viewObject->uuid);
    $formMethod = 'POST';
@endphp

<!--begin::Modal Title-->
<div class="modal-title-captured">{{ __('Método de pagamento') }}</div>
<!--End::Modal Title-->

<form id="master-modal-form" class="form" method="POST" action="{{ $formAction }}">
@csrf
@method($formMethod)

<!--begin::Scroll-->
<div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px" style="max-height: 239px;">

    <!--begin::Alert-->
    <div class="alert alert-primary d-flex align-items-center p-5 mb-10">
        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
        <span class="svg-icon svg-icon-2hx svg-icon-primary me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
															<path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
														</svg>
													</span>
        <!--end::Svg Icon-->
        <div class="d-flex flex-column">
            <h4 class="mb-1 text-primary">{{ __('Seus dados estão seguros') }}</h4>
            <span>{{ __('Os dados de cartões de crédito e débito NÃO FICARÃO gravados em nossos servidores. ') }}<a href="#" class="fw-bolder">Saiba mais</a></span>
        </div>
    </div>
    <!--end::Alert-->

    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
            <span class="required">Nome do titular</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="{{ __('Ex: João P R Silva') }}" name="holder">
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="required fs-6 fw-bold form-label mb-2">Número do cartão</label>
        <!--end::Label-->
        <!--begin::Input wrapper-->
        <div class="position-relative">
            <!--begin::Input-->
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" inputmode="numeric" minlength="16" maxlength="16" class="form-control form-control-solid" placeholder="Insira os dígitos do cartão" name="card_number">
            <!--end::Input-->
            <!--begin::Card logos-->
            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                <img src="{{ asset(theme()->getMediaUrlPath()) }}/media/svg/card-logos/visa.svg" alt="" class="h-25px">
                <img src="{{ asset(theme()->getMediaUrlPath()) }}/media/svg/card-logos/mastercard.svg" alt="" class="h-25px">
                <img src="{{ asset(theme()->getMediaUrlPath()) }}/media/svg/card-logos/american-express.svg" alt="" class="h-25px">
            </div>
            <!--end::Card logos-->
        </div>
        <!--end::Input wrapper-->
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-10">
        <!--begin::Col-->
        <div class="col-md-6 fv-row">
            <!--begin::Label-->
            <label class="required fs-6 fw-bold form-label mb-2">{{ __('Válido até') }}</label>
            <!--end::Label-->
            <!--begin::Row-->
            <div class="row fv-row fv-plugins-icon-container">
                <!--begin::Col-->
                <div class="col-12">
                    <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" inputmode="numeric" minlength="4" maxlength="4" class="form-control form-control-solid" placeholder="{{ __('Ex:') }} 0525" name="expiration">
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">Cód. Segurança <small class="ms-1">({{ __('CVV') }})</small></span>
            </label>
            <!--end::Label-->
            <!--begin::Input wrapper-->
            <div class="position-relative">
                <!--begin::Input-->
                <input type="text" inputmode="numeric" minlength="3" maxlength="4" class="form-control form-control-solid" placeholder="CVV" name="card_cvv">
                <!--end::Input-->
                <!--begin::CVV icon-->
                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                    <span class="svg-icon svg-icon-2hx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M22 7H2V11H22V7Z" fill="black"></path>
                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::CVV icon-->
            </div>
            <!--end::Input wrapper-->
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div>
        <!--begin::Radio group-->
        <div data-kt-buttons="true">

            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Radio button-->
                    <label class="btn btn-outline btn-outline-dashed d-block text-start p-6 mb-5">
                        <!--end::Description-->
                        <div class="d-flex align-items-center me-2">
                            <!--begin::Radio-->
                            <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                                <input class="form-check-input" type="radio" name="type" value="credit"/>
                            </div>
                            <!--end::Radio-->

                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <h2 class="d-flex align-items-center fs-3 fw-bolder flex-wrap">
                                    Crédito
                                </h2>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Description-->
                    </label>
                    <!--end::Radio button-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Radio button-->
                    <label class="btn btn-outline btn-outline-dashed d-block text-start p-6 mb-5">
                        <!--end::Description-->
                        <div class="d-flex align-items-center me-2">
                            <!--begin::Radio-->
                            <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                                <input class="form-check-input" type="radio" name="type" value="debit"/>
                            </div>
                            <!--end::Radio-->

                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <h2 class="d-flex align-items-center fs-3 fw-bolder flex-wrap">
                                    Débito
                                </h2>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Description-->
                    </label>
                    <!--end::Radio button-->
                </div>
            </div>






        </div>
        <!--end::Radio group-->
    </div>
    <!--end::Input group-->

</div>
<!--end::Scroll-->
</form>
