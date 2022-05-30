@php
    $chartColor = $chartColor ?? 'primary';
    $chartHeight = $chartHeight ?? '175px';
@endphp

<!--begin::Mixed Widget 10-->
<div class="card {{ $class }}">

    <!--begin::Header-->
    <div class="card-header border-0">

        <h3 class="card-title fw-bolder fs-3 text-gray-800">
            {{ __('Receita gerada') }}
            <span class="text-gray-400 fw-bold fs-7 ms-4">01 Jan - 18 Jan / {{ date("y") }}</span>
        </h3>

        <div class="card-toolbar">

            <div class="fw-bolder fs-3 text-{{ $chartColor }} me-2">
                <small class="fs-5 text-gray-500 fw-bold">Total:</small> R$1.201,00
            </div>

            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-gray-500 btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}
            </button>
            {{ theme()->getView('partials/menus/_menu-widgets-resumes') }}
            <!--end::Menu-->
        </div>

    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body p-0 ms-5 me-5 d-flex justify-content-between flex-column overflow-hidden">
        <!--begin::Chart-->
        <div class="mixed-widget-10-chart" data-kt-color="{{ $chartColor }}" data-kt-chart-url="{{ route('profits') }}" style="height: {{ $chartHeight }}"></div>
        <!--end::Chart-->
    </div>
</div>
<!--end::Mixed Widget 10-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var initRevenueLineWidget = function () {
            var charts = document.querySelectorAll('.mixed-widget-10-chart');

            var color;
            var height;
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
            var baseLightColor;
            var secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');
            var baseColor;
            var options;
            var chart;

            [].slice.call(charts).map(function (element) {
                color = element.getAttribute("data-kt-color");
                height = parseInt(KTUtil.css(element, 'height'));
                baseColor = KTUtil.getCssVariableValue('--bs-' + color);
                baseLightColor = KTUtil.getCssVariableValue('--bs-light-' + color);

                options = {
                    series: [{
                        name: 'Receita gerada',
                        data: [120, 145, 160, 134, 115, 160, 122, 145, 0, 0, 0, 0]
                    }],
                    chart: {
                        fontFamily: 'inherit',
                        type: 'area',
                        height: height,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                            fontWeight: 'light',
                        },
                    },
                    stroke: {
                        show: true,
                        curve: 'straight',
                        width: 2,
                        colors: [baseColor]
                    },
                    xaxis: {
                        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        y: 0,
                        offsetX: 0,
                        offsetY: 0,
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        }
                    },
                    fill: {
                        type: 'solid',
                        opacity: 0.03,
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px'
                        },
                        y: {
                            formatter: function (val) {
                                return "$" + val + " revenue"
                            }
                        }
                    },
                    colors: [baseColor, baseLightColor],
                    grid: {
                        padding: {
                            top: 10
                        },
                        borderColor: borderColor,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: false
                            }
                        },
                        xaxis: {
                            lines: {
                                show: true
                            }
                        }
                    }
                };

                chart = new ApexCharts(element, options);
                chart.render();
            });
        }
        initRevenueLineWidget();
    });
</script>
