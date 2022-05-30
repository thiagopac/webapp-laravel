
<!--begin::Card -->
<div class="card mb-5 mb-xl-8">

    <!--begin::Card header-->
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">{{ __('Utilize seu saldo para') }}</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-2">

        <!--begin::Items-->
        <div class="py-2">

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <div class="d-flex">

                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/arrows/arr031.svg', "svg-icon-2x svg-icon-gray-600") !!}
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <div class="d-flex flex-column">
                        <a href="{{ route('convert.index') }}" class="fs-5 text-dark text-hover-primary fw-bolder">{{ __('Converter') }}</a>
                        <div class="fs-6 fw-bold text-muted">{{ __('Transforme seus créditos energéticos em DEC') }}</div>
                    </div>

                </div>
            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-5"></div>
            <!--end::Separator-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <div class="d-flex">

                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/ecommerce/ecm001.svg', "svg-icon-2x svg-icon-gray-600") !!}
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <div class="d-flex flex-column">
                        <a href="{{ route('negotiate.purchase') }}" class="fs-5 text-dark text-hover-primary fw-bolder">{{ __('Comercializar') }}</a>
                        <div class="fs-6 fw-bold text-muted">{{ __('Compre ou venda tokens DEC') }}</div>
                    </div>

                </div>
            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-5"></div>
            <!--end::Separator-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <div class="d-flex">

                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen016.svg', "svg-icon-2x svg-icon-gray-600") !!}
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <div class="d-flex flex-column">
                        <a href="{{ route('withdraw.index') }}" class="fs-5 text-dark text-hover-primary fw-bolder">{{ __('Sacar') }}</a>
                        <div class="fs-6 fw-bold text-muted">{{ __('Transfira o saldo para sua conta bancária') }}</div>
                    </div>

                </div>
            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-5"></div>
            <!--end::Separator-->

            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <div class="d-flex">

                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/finance/fin003.svg', "svg-icon-2x svg-icon-gray-600") !!}
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <div class="d-flex flex-column">
                        <a href="{{ route('pay.index') }}" class="fs-5 text-dark text-hover-primary fw-bolder">{{ __('Pagar contas') }}</a>
                        <div class="fs-6 fw-bold text-muted">{{ __('Utilize seu saldo para pagar a conta de luz') }}</div>
                    </div>

                </div>
            </div>
            <!--end::Item-->

        </div>
        <!--end::Items-->
    </div>
    <!--end::Card body-->

</div>
<!--end::Card -->

