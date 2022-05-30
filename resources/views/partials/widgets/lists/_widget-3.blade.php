<?php
    // List items
    $listRows = array(
        array(
            'color' => 'warning',
            'date' => '15/01/2022 15:22',
            'title' => 'Saque da carteira para conta bancária',
            'text' => 'R$ 257,34',
            'status' => 'Agendado',
        ),
        array(
            'color' => 'success',
            'date' => '05/01/2022 19:35',
            'title' => 'Pagamento complementar da conta de luz',
            'text' => 'R$ 45,60',
            'status' => 'Realizado'
        ),
        array(
            'color' => 'success',
            'date' => '01/01/2022 07:41',
            'title' => 'Abatimento parcial da conta de luz',
            'text' => '540 DEC',
            'status' => 'Realizado'
        ),
        array(
            'color' => 'success',
            'date' => '22/12/2021 18:57',
            'title' => 'Compra de DEC',
            'text' => '40 DEC',
            'status' => 'Realizado'
        ),
        array(
            'color' => 'success',
            'date' => '21/12/2021 23:14',
            'title' => 'Conversão de kWh em DEC',
            'text' => '500 kWh',
            'status' => 'Realizado'
        ),
        array(
            'color' => 'success',
            'date' => '18/12/2021 14:31',
            'title' => 'Saque da carteira para conta bancária',
            'text' => 'R$ 865,41',
            'status' => 'Realizado'
        )
    );
?>

<div>
    <!--begin::List Widget 3-->
    <div class="card card-dashed {{ $class }}">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark fs-2">{{ __('Últimas transações') }}</h3>

            <div class="card-toolbar">
                <!--begin::Menu-->
                <button type="button" class="btn btn-sm btn-icon btn-color-gray-500 btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}
                </button>
                {{ theme()->getView('partials/menus/_menu-3') }}
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-2">

            <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                <tbody>

                    @foreach($listRows as $row)
                        <!--begin::Table row-->
                        <tr>
                            <!--begin::Badge=-->
                            <td class="min-w-70px">
                                <div class="badge badge-light-{{ $row['color'] }}">{{ $row['status'] }}</div>
                            </td>
                            <!--end::Badge=-->

                            <!--begin::Status=-->
                            <td>{{ $row['title'] }}</td>
                            <!--end::Status=-->

                            <!--begin::Status=-->

                            <td>
                                <div class="border border-gray-300 border-dashed rounded py-1 px-0 me-0 mb-1 text-center">
                                    <div class="fw-bold text-gray-400">{{ $row['text'] }}</div>
                                </div>
                            </td>
                            <!--end::Status=-->

                            <!--begin::Timestamp=-->
                            <td class="pe-0 text-end min-w-200px">{{ $row['date'] }}</td>
                            <!--end::Timestamp=-->
                        </tr>
                        <!--end::Table row-->
                    @endforeach
                </tbody>
            </table>

        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->

    <a href="#" class="btn btn-bg-success btn-color-white w-100 fs-6 px-8 py-4 mt-2">{{ __('Ver mais') }}</a>
</div>
