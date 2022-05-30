<?php

$balance = !empty($balance) ? $balance : 0;
$balanceEnergy = !empty($balanceEnergy) ? $balanceEnergy : 0;
$balanceEnergyInFiat = !empty($balanceEnergyInFiat) ? $balanceEnergyInFiat : 0;
$balanceCrypto = !empty($balanceCrypto) ? $balanceCrypto : 0;
$balanceCryptoInFiat = !empty($balanceCryptoInFiat) ? $balanceCryptoInFiat : 0;
$balanceFiat = !empty($balanceFiat) ? $balanceFiat : 0;
$totalBalanceInFiat = !empty($totalBalanceInFiat) ? $totalBalanceInFiat : 0;

// List items
$listRows = array(
    array(
        'icon' => 'icons/energy.svg',
        'title' => 'kWh',
        'description' => $balanceEnergy,
        'color' => 'warning',
        'stats' => 'R$ '.number_format($balanceEnergyInFiat, 2, ',', '.'),
    ),
    array(
        'icon' => 'icons/crypto.svg',
        'title' => 'DEC',
        'description' => $balanceCrypto,
        'color' => 'primary',
        'stats' => 'R$ '.number_format($balanceCryptoInFiat, 2, ',', '.'),
    ),
    array(
        'icon' => 'icons/fiat.svg',
        'title' => 'BRL',
        'description' => $balanceFiat,
        'color' => 'success',
        'stats' => 'R$ '.number_format($balanceFiat, 2, ',', '.'),
    ),
);
?>

<!--begin::Widget Resume List-->
<div class="card {{ $class }}">
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Header-->
        <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
            <!--begin::Heading-->
            <div class="d-flex flex-stack">
                <h3 class="m-0 text-white fw-bolder fs-3">{{ __('Saldo da carteira') }}</h3>

                <div class="ms-1">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-primary border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}
                    </button>
                    {{ theme()->getView('partials/menus/_menu-widgets-resumes') }}
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Heading-->

            <!--begin::Balance-->
            <div class="d-flex text-center flex-column text-white pt-8">
                <span class="fw-bold fs-7">{{ __('TOTAL') }}</span>
{{--                <span class="fw-bolder fs-3x pt-1"><small class="fs-1">R$</small>660<small class="fs-1">,90</small></span>--}}
                <span class="fw-bolder fs-3x pt-1"><small class="fs-1">R$ </small>{{ number_format($totalBalanceInFiat, 2, ',', '.') }}</span>
            </div>
            <!--end::Balance-->
        </div>
        <!--end::Header-->

        <!--begin::Items-->
        <div class="card-rounded border border-1 mx-9 mb-9 px-6 py-9 position-relative z-index-1 bg-white" style="margin-top: -100px">
            @foreach($listRows as $row)
                <!--begin::Item-->
                <div class="d-flex align-items-center {{ util()->putIf(next($listRows), 'mb-6') }}">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-45px w-40px me-5">
                        <span class="symbol-label bg-lighten">
                            {!! theme()->getSvgIcon($row['icon'], "svg-icon-2x svg-icon-$row[color]") !!}
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <!--begin::Description-->
                    <div class="d-flex align-items-center flex-wrap w-100">
                        <!--begin::Title-->
                        <div class="mb-1 pe-3 flex-grow-1">
                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">{{ $row['title'] }}</a>
                            <div class="text-gray-400 fw-bold fs-7">{{ $row['description'] }}</div>
                        </div>
                        <!--end::Title-->

                        <!--begin::Label-->
                        <div class="d-flex align-items-center">
                            <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ $row['stats'] }}</div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Item-->
            @endforeach
        </div>
        <!--end::Items-->
    </div>
    <!--end::Body-->
</div>
<!--end::Widget Resume List-->
