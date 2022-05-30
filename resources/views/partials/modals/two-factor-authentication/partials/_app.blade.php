<!--begin::Apps-->
<div class="d-none" data-kt-element="apps">
    <!--begin::Heading-->
    <h3 class="text-dark fw-bolder mb-7">
        {{ __('Aplicativos de autenticação') }}
    </h3>
    <!--end::Heading-->

    <!--begin::Description-->
    <div class="text-gray-500 fw-bold fs-6 mb-10">
        Utilizando algum aplicativo de autenticação como
        <a href="https://support.google.com/accounts/answer/1066447?hl=en" target="_blank">Google Authenticator</a>,
        <a href="https://www.microsoft.com/en-us/account/authenticator" target="_blank">Microsoft Authenticator</a>,
        <a href="https://authy.com/download/" target="_blank">Authy</a>, or
        <a href="https://support.1password.com/one-time-passwords/" target="_blank">1Password</a>,
        escaneie o QR abaixo. Será gerado um código de 6 dígitos que você deverá informar abaixo.

        <!--begin::QR code image-->
        <div class="pt-5 text-center">
            <img src="{{ asset(theme()->getMediaUrlPath() . 'misc/qr.png') }}" alt="" class="mw-150px"/>
        </div>
        <!--end::QR code image-->
    </div>
    <!--end::Description-->

{{ theme()->getView(
    'partials/general/_notice',
    array(
        'class' => "mb-10",
        'color' => 'warning',
        'body'  => 'Se você estiver tendo problemas para usar o QR code, selecione a entrada manual em seu aplicativo e insira seu nome de usuário e o código: <div class="fw-bolder text-dark pt-2">KBSS3QDAAFUMCBY63YCKI5WSSVACUMPN</div>',
        'icon'  => "icons/duotune/general/gen044.svg"
    )
) }}

<!--begin::Form-->
    <form data-kt-element="apps-form" class="form" action="#">
        <!--begin::Input group-->
        <div class="mb-10 fv-row">
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{ __('Código de 6 dígitos gerado pelo aplicativo') }}" name="code"/>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-center">
            <button type="reset" data-kt-element="apps-cancel" class="btn btn-white me-3">
                {{ __('Cancelar') }}
            </button>

            <button type="submit" data-kt-element="apps-submit" class="btn btn-primary">
                @include('partials.general._button-indicator')
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Options-->
