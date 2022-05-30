<?php
$class = $class ?? 'card-stretch';
$headerHeight = $headerHeight ?? 'h-100px';
$iconMarginTop = $iconMarginTop ?? 'mt-10';
$spacerTop = $spacerTop ?? 'h-1px';
$spacerBottom = $spacerBottom ?? 'h-1px';

$balanceFiat = !empty($balanceFiat) ? $balanceFiat : 0;
?>
<div class="card card-dashed {{ $class }}">

    <div class="card-header border-0 {{ $headerHeight }} text-center d-block ribbon ribbon-end ribbon-clip">

        @if($balanceFiatFlag === true)
            <div class="ribbon-label top-0 mt-10 fs-8 fw-bold bg-light-warning text-warning" data-bs-toggle="tooltip" title="" data-bs-original-title="Você tem valores programados a pagar e/ou receber e estes valores podem refletir neste saldo atual. Verifiqueo seu Extrato de Utilização para mais detalhes.">
                {{ __('Saldo temporário') }}
                <span class="ribbon-inner"></span>
            </div>
        @endif

        <!--begin::Symbol-->
        <div class="symbol symbol-75px {{ $iconMarginTop }}">
            <span class="symbol-label bg-lighten">
                {!! theme()->getSvgIcon('icons/fiat.svg', "svg-icon-4x svg-icon-success") !!}
            </span>
        </div>
        <!--end::Symbol-->

    </div>

    <!--begin::Body-->
    <div class="card-body d-flex justify-content-between text-center flex-column">

        <!--begin::Section-->
        <div class="d-flex flex-column mt-4 mb-14">

            <!--begin::Spacer Top-->
            <div class="{{ $spacerTop }}"></div>
            <!--end::Spacer Top-->

            <!--begin::Number-->
            <span class="fw-bold fs-3x text-gray-800 lh-1">{{ number_format($balanceFiat, 2, ',', '.') }} <span class="fs-3 text-gray-500">BRL</span></span>
            <!--end::Number-->

            <!--begin::Description-->
            <span class="fw-bold fs-6 text-gray-400 mt-5">{{ __('Disponível para saque ou pagamento de contas') }}</span>
            <!--end::Description-->

            <!--begin::Spacer Bottom-->
            <div class="{{ $spacerBottom }}"></div>
            <!--end::Spacer Bottom-->

        </div>
        <!--end::Section-->

        <!--begin::Action-->
        <div class="m-0">
            <a href="{{ route('withdraw.index') }}" class="btn btn-bg-primary btn-color-white w-100 fs-6 px-8 py-4 mt-2 text-uppercase">{{ __('Sacar') }}</a>
        </div>
        <!--end::Action-->

    </div>
    <!--end::Body-->
</div>
