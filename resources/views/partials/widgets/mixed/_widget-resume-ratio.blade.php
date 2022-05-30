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
        'stats' => 'R$ '.number_format($balanceEnergyInFiat, 2, ',', '.'),
        'color' => 'primary',
        'raw_value' => $balanceEnergyInFiat,
    ),
    array(
        'icon' => 'icons/crypto.svg',
        'title' => 'DEC',
        'description' => $balanceCrypto,
        'stats' => 'R$ '.number_format($balanceCryptoInFiat, 2, ',', '.'),
        'color' => 'warning',
        'raw_value' => $balanceCryptoInFiat,
    ),
    array(
        'icon' => 'icons/fiat.svg',
        'title' => 'BRL',
        'description' => $balanceFiat,
        'stats' => 'R$ '.number_format($balanceFiat, 2, ',', '.'),
        'color' => 'success',
        'raw_value' => $balanceFiat,
    ),
);

$chartValues = array();
$chartColors = array();
?>

<div class="card {{ $class }}">

    <!--begin::Card header-->
    <div class="card-header mt-2 border-0">

        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h3 class="fw-bolder mb-1 fs-3 text-gray-800">{{ __('Saldo da carteira') }}</h3>
        </div>
        <!--end::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="ms-1">
                <!--begin::Menu-->
                <button type="button" class="btn btn-sm btn-icon btn-color-gray-500 btn-active-white border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}
                </button>
                {{ theme()->getView('partials/menus/_menu-widgets-resumes') }}
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Card toolbar-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body p-14 pt-5">
        <!--begin::Wrapper-->
        <div class="d-flex flex-wrap">
            <!--begin::Chart-->
            <div class="position-relative d-flex flex-center h-175px me-1 mb-7">
                <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">

                    <span class="fw-bolder fs-2x pt-1"><small class="fs-1">R$</small>{{ number_format($totalBalanceInFiat, 2, ',', '.') }}</span>
                    <span class="fs-6 fw-bold text-gray-400">{{ __('TOTAL') }}</span>
                </div>
                <canvas id="resume_ratio_chart"></canvas>
            </div>
            <!--end::Chart-->

            <!--begin::Labels-->
            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-0 mb-2  ">

                @foreach($listRows as $row)

                    @php
                        $row = $row ?? array();
                        $chartColors[] = $row['color'];
                        $chartValues[] = $row['raw_value'];
                    @endphp

                    <!--begin::Label-->
                    <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                        <div class="bullet bg-{{ $row['color'] }} me-3"></div>
                        <div class="text-gray-600">{{ $row['title'] }}</div>
                        <div class="text-gray-400 ms-2">({{ $row['description'] }})</div>
                        <div class="ms-auto fw-bolder text-gray-700">{{ $row['stats'] }}</div>
                    </div>
                    <!--end::Label-->

                @endforeach

            </div>
            <!--end::Labels-->
        </div>
        <!--end::Wrapper-->

    </div>
    <!--end::Card body-->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Private functions
        var initResumeRatioWidget = function () {
            // init chart
            var element = document.getElementById("resume_ratio_chart");

            if (!element) {
                return;
            }

            var config = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: @json($chartValues),
                        backgroundColor: @json($chartColors).map(function(color){return KTUtil.getCssVariableValue('--bs-'+color)}),
                    }],
                    labels: ['kWh', 'DEC', 'BRL'],
                },
                options: {
                    chart: {
                        fontFamily: 'inherit',
                    },
                    cutoutPercentage: 85,
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '85%',
                    title: {
                        display: false
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    tooltips: {
                        enabled: true,
                        intersect: false,
                        mode: 'nearest',
                        bodySpacing: 5,
                        yPadding: 10,
                        xPadding: 10,
                        caretPadding: 0,
                        displayColors: false,
                        backgroundColor: '#20D489',
                        titleFontColor: '#ffffff',
                        cornerRadius: 4,
                        footerSpacing: 0,
                        titleSpacing: 0
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            };

            var myDoughnut;

            var startRatioChart = () => {
                if ($("#widget-resume-ratio").is(":visible") && myDoughnut === undefined) {
                    var ctx = element.getContext('2d');
                    myDoughnut = new Chart(ctx, config);
                }
            }

            startRatioChart();

            $('#widget-resume-ratio').on('reflection-ratio', function () {
                startRatioChart();
            });
        }

        initResumeRatioWidget();
    });
</script>
