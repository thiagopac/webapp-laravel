<?php
$class = $class ?? 'card-stretch';
$headerHeight = $headerHeight ?? 'h-100px';
$iconMarginTop = $iconMarginTop ?? 'mt-10';
$spacerTop = $spacerTop ?? 'h-1px';
$spacerBottom = $spacerBottom ?? 'h-1px';

$balanceEnergy = !empty($balanceEnergy) ? $balanceEnergy : 0;

?>
<div class="card card-dashed {{ $class }}">

    <div class="card-header border-0 {{ $headerHeight }} text-center d-block ribbon ribbon-end ribbon-clip">

        @if($balanceEnergyFlag === true)
            <div class="ribbon-label top-0 mt-10 fs-8 fw-bold bg-light-warning text-warning" data-bs-toggle="tooltip" title="" data-bs-original-title="Você tem valores programados a pagar e/ou receber e estes valores podem refletir neste saldo atual. Verifiqueo seu Extrato de Utilização para mais detalhes.">
                {{ __('Saldo temporário') }}
                <span class="ribbon-inner"></span>
            </div>
        @endif

        <!--begin::Symbol-->
        <div class="symbol symbol-75px {{ $iconMarginTop }}">
            <span class="symbol-label bg-lighten">
                {!! theme()->getSvgIcon('icons/energy.svg', "svg-icon-4x svg-icon-warning") !!}
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
            <span class="fw-bold fs-3x text-gray-800 lh-1">{{ $balanceEnergy }} <span class="fs-3 text-gray-500">kWh</span></span>
            <!--end::Number-->

            <!--begin::Description-->
            <span class="fw-bold fs-6 text-gray-400 mt-5">{{ __('Créditos em kWh disponíveis para conversão em DEC') }}</span>
            <!--end::Description-->

            <!--begin::Spacer Bottom-->
            <div class="{{ $spacerBottom }}"></div>
            <!--end::Spacer Bottom-->

        </div>
        <!--end::Section-->

        <!--begin::Action-->
        <div class="m-0">
            <a href="{{ route('convert.index') }}" class="btn btn-bg-primary btn-color-white w-100 fs-6 px-8 py-4 mt-2 text-uppercase">{{ __('Converter créditos') }}</a>
        </div>
        <!--end::Action-->

    </div>
    <!--end::Body-->
</div>
