<!--begin::SMS-->
<div class="d-none" data-kt-element="sms">
    <!--begin::Heading-->
    <h3 class="text-dark fw-bolder fs-3 mb-5">
        {{ __('SMS: verifique o número do seu celular') }}
    </h3>
    <!--end::Heading-->

    <!--begin::Notice-->
    <div class="text-gray-400 fw-bold mb-10">
        {{ __('Insira o número do seu celular com o código do país e enviaremos um código de verificação.') }}
    </div>
    <!--end::Notice-->

    <!--begin::Form-->
    <form data-kt-element="sms-form" class="form" action="#">
        <!--begin::Input group-->
        <div class="mb-10 fv-row">
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{ __('Número do celular com código do país') }}..." name="mobile"/>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-center">
            <button type="reset" data-kt-element="sms-cancel" class="btn btn-white me-3">
                {{ __('Cancelar') }}
            </button>

            <button type="submit" data-kt-element="sms-submit" class="btn btn-primary">
                @include('partials.general._button-indicator')
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::SMS-->
