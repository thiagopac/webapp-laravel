@php

    $steps = array(
        (object)array("id" => "1", "title" => "Unidade consumidora"),
        (object)array("id" => "2", "title" => "Conta de energia"),
        (object)array("id" => "3", "title" => "Compensação com DEC"),
        (object)array("id" => "4", "title" => "Resumo"),
        (object)array("id" => "5", "title" => "Pagamento")
    );
@endphp
<x-base-layout>

    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="pay_bill_stepper" data-kt-stepper="true">

        <!--begin::Aside-->
        <div class="card d-flex d-none d-lg-block justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">

            <!--begin::Wrapper-->
            <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">

                <!--begin::Nav-->
                <div class="stepper-nav">

                    @foreach($steps as $idx => $step)

                        <!--begin::Step-->
                        <div class="stepper-item {{ $idx === 0 ? 'current' : '' }}" data-kt-stepper-element="nav">

                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->

                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">{{ $step->id }}</span>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">{{ $step->title }}</h3>
                            </div>
                            <!--end::Label-->

                        </div>
                        <!--end::Step-->

                    @endforeach

                </div>
                <!--end::Nav-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->

        <!--begin::Content-->
        <div class="card d-flex flex-row-fluid flex-center">

            <!--begin::AllSteps-->
            <div class="AllSteps card-body py-20 w-100 w-xl-700px px-9 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="invoice_form">

                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">

                    <!--begin::Wrapper-->
                    <div class="w-100">

                        <!--begin::Heading-->
                        <div class="pb-10">

                            <!--begin::Title-->
                            <h2 class="fw-bolder d-flex align-items-center text-dark">Unidade consumidora</h2>
                            <!--end::Title-->

                            <!--begin::Notice-->
                            <div class="alert rounded-4 bg-light-primary border border-primary d-flex flex-column flex-sm-row w-100 mt-10 p-5">

                                <!--begin::Icon-->
                                {!! theme()->getSvgIcon('icons/duotune/general/gen046.svg', "svg-icon-3x pe-3 svg-icon-primary") !!}
                                <!--end::Icon-->

                                <!--begin::Content-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <h5 class="mb-2">UNIDADES CONSUMIDORAS</h5>
                                    <span>
                                        Número que define uma unidade residencial, comercial, industrial ou pública que consome energia elétrica.
                                        Se você quiser entender mais sobre Unidades consumidoras, verifique nossa <a href="#" class="link-primary fw-bolder">página de ajuda</a>.
                                    </span>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Notice-->

                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row fv-plugins-icon-container">

                            <label class="d-flex align-items-center form-label mb-5 fs-5">
                                Selecione a unidade consumidora referente à conta de energia que você deseja pagar
                            </label>

                            <!--begin::Row-->
                            <div class="row">

                                @foreach($consumerUnits as $consumerUnit)

                                    <!--begin::Col-->
                                    <div class="col-lg-6">

                                        <!--begin::Option-->
                                        <input type="radio" class="btn-check" name="user_consumer_unit_id" value="{{ $consumerUnit->uuid }}" id="user_consumer_unit_{{$consumerUnit->uuid}}">

                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="user_consumer_unit_{{ $consumerUnit->uuid }}">
                                            <!--begin::Icon-->
                                            <i class="@php if($consumerUnit->type === 'residence'){ echo 'bi bi-house';}else if($consumerUnit->type === 'property'){echo  'bi bi-signpost-split'; }else if($consumerUnit->type === 'business'){echo  'bi bi-shop'; } @endphp fs-1 me-2 opacity-75"></i>
                                            <!--end::Icon-->

                                            <!--begin::Info-->
                                            <span class="d-block fw-bold text-start min-h-90px">
                                                <span class="text-dark fw-bolder d-block fs-4 mb-2">{{ $consumerUnit->name }} <span class="fs-sm-8 text-gray-400 d-flex">{{ $consumerUnit->code }}</span></span>
                                                <span class="text-muted fw-bold fs-6">{!! $consumerUnit->address.' '.$consumerUnit->number.', '.$consumerUnit->city->name.'/'.$consumerUnit->city->state_letter !!}</span>
                                            </span>
                                            <!--end::Info-->
                                        </label>
                                        <!--end::Option-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->

                                @endforeach

                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div data-kt-stepper-element="content">

                    <!--begin::Wrapper-->
                    <div class="w-100">

                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">

                            <!--begin::Title-->
                            <h2 class="fw-bolder d-flex align-items-center text-dark">Conta de energia</h2>
                            <!--end::Title-->

                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="mb-0 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center form-label mb-5 fs-5">
                                Selecione a fatura deseja pagar
                            </label>
                            <!--end::Label-->

                            <!--begin::Options-->
                            <div class="mb-0">

                                @php
                                    $openInvoices = array()
                                @endphp

                                @foreach($consumerUnits as $consumerUnit)

                                    <div class="invoices-wrapper" data-consumer-unit-id="{{$consumerUnit->uuid}}">

                                        @if(count($consumerUnit->openInvoices()) < 1)
                                            <div class="alert bg-light-primary d-flex align-items-center p-5 mb-5">
                                                <!--begin::Svg Icon-->
                                            {!! theme()->getSvgIcon('icons/duotune/ecommerce/ecm008.svg', "svg-icon-3x pe-3 svg-icon-primary") !!}
                                            <!--end::Svg Icon-->

                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-primary">Oba!</h4>
                                                    <span>Nenhuma fatura em aberto para esta <span class="fw-bolder">Unidade Consumidora</span></span>
                                                </div>
                                            </div>
                                        @endif

                                        @foreach($consumerUnit->openInvoices() as $invoice)

                                            @php
                                            array_push($openInvoices, $invoice);
                                            @endphp

                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack mb-5 cursor-pointer" >

                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">

                                                    <!--begin::Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label">
                                                            <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
                                                        </span>
                                                    </span>
                                                    <!--end::Icon-->

                                                    <!--begin::Description-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder text-gray-800 text-hover-primary fs-5">R$ {{ number_format($invoice->value/100, 2, ',', '.') }}</span>
                                                        <span class="fs-6 fw-bold text-muted">Vencimento: {{ ucfirst(\Carbon\Carbon::parse($invoice->due_date)->translatedFormat('M d, Y')) }}</span>
                                                    </span>
                                                    <!--end:Description-->

                                                </span>
                                                <!--end:Label-->

                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="user_invoice_id" value="{{ $invoice->uuid }}">
                                                </span>
                                                <!--end:Input-->

                                            </label>
                                            <!--end::Option-->

                                        @endforeach

                                    </div>

                                @endforeach

                            </div>
                            <!--end::Options-->

                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div data-kt-stepper-element="content">

                    <!--begin::Wrapper-->
                    <div class="w-100">

                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-12">

                            <!--begin::Title-->
                            <h2 class="fw-bolder d-flex align-items-center text-dark">Compensação com DEC</h2>
                            <!--end::Title-->

                        </div>
                        <!--end::Heading-->

                        @foreach($openInvoices as $openInvoice)

                            @php
                                $id = $openInvoice->uuid;
                                $consumption = $openInvoice->consumption;
                                $balanceCrypto = auth()->user()->getBalanceCrypto()/100;
                                $complementaryCryptoBalance = $consumption - $balanceCrypto > 0 ? $consumption - $balanceCrypto : 0;
                                $fiatToCryptoRate = \App\Models\ExchangeRate::FiatToCryptoRate();
                                $complementaryCryptoCostRaw = $complementaryCryptoBalance / $fiatToCryptoRate;
                                $complementaryCryptoCost = number_format($complementaryCryptoCostRaw, 2, ',', '.');

                                $bestMonthlyPlanRate = 1.16279069767;
                                $complementaryCryptoMonthlyPlanCost = $complementaryCryptoBalance / $bestMonthlyPlanRate;
                                $diffNormalAndPlanCost =  number_format($complementaryCryptoCostRaw - $complementaryCryptoMonthlyPlanCost, 2, ',', '.');
                            @endphp

                            <div class="table-responsive crypto-compensation" data-invoice-id="{{ $id }}">

                                <table class="table table-row-bordered gy-7">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="ms-4">
                                                <div class="fs-3 fw-bold mb-2">Consumo compensável</div>
                                                <div class="text-muted fs-7 fw-bold">Quantidade de energia consumida segundo a fatura selecionada</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex mt-5 me-4 align-items-baseline">
                                                <div class="fs-1 text-gray-700 fw-bolder me-1">{{ $consumption }}</div>
                                                <div class="fs-3 text-gray-700">kWh</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="ms-4">
                                                <div class="fs-3 fw-bold mb-2">Saldo atual de DEC</div>
                                                <div class="text-muted fs-7 fw-bold">Quantidade de DECs disponíveis em sua carteira</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex mt-5 me-4 align-items-baseline">
                                                <div class="fs-1 text-gray-700 fw-bolder me-1">{{ $balanceCrypto }}</div>
                                                <div class="fs-3 text-gray-700">DEC</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="ms-4">
                                                <div class="fs-3 fw-bold mb-2">DEC complementares</div>
                                                <div class="text-muted fs-7 fw-bold">Quantidade de DECs necessários para complementar o abatimento do consumo da fatura selecionada</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex mt-5 me-4 align-items-baseline">
                                                <div class="fs-1 text-gray-700 fw-bolder me-1">{{ $complementaryCryptoBalance }}</div>
                                                <div class="fs-3 text-gray-700">DEC</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-light">
                                        <td>
                                            <div class="ms-4">
                                                <div class="fs-2 fw-bolder mb-2">Custo dos DEC</div>
                                                <div class="text-gray-700 fs-7 fw-bold">Valor a ser pago pelos DEC complementares para abatimento total do consumo compensável</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex mt-5 me-4 align-items-baseline">
                                                <div class="fs-3 text-gray-700 fw-bolder me-1">R$</div>
                                                <div class="fs-2x text-gray-900 fw-boldest">{{ $complementaryCryptoCost  }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        @endforeach

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 3-->

                <!--begin::Step 4-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">
                            <!--begin::Title-->
                            <h2 class="fw-bolder text-dark">Resumo</h2>
                            <!--end::Title-->

                        </div>
                        <!--end::Heading-->

                        <!--begin::ResumeItems-->
                        @foreach($openInvoices as $openInvoice)

                            @php
                                $id = $openInvoice->uuid;
                                $invoiceValueRaw = $openInvoice->value/100;
                                $value = number_format($invoiceValueRaw, 2, ',', '.');
                                $consumption = $openInvoice->consumption;

                                $balanceCrypto = auth()->user()->getBalanceCrypto()/100;
                                $complementaryCryptoBalance = $consumption - $balanceCrypto > 0 ? $consumption - $balanceCrypto : 0;

                                $cryptoBalanceUse = $balanceCrypto < $consumption ? $balanceCrypto : $balanceCrypto - ($balanceCrypto - $consumption);

                                $fiatToCryptoRate = \App\Models\ExchangeRate::FiatToCryptoRate();
                                $complementaryCryptoCostRaw = $complementaryCryptoBalance / $fiatToCryptoRate;
                                $complementaryCryptoCost = number_format($complementaryCryptoCostRaw, 2, ',', '.');

                                $nonCompensatingFeesRaw = 35.50;
                                $nonCompensatingFees = number_format($nonCompensatingFeesRaw, 2, ',', '.');

                                $totalPayableRaw = intval(($complementaryCryptoCostRaw + $nonCompensatingFeesRaw) * 100);
                                $totalPayable = number_format($totalPayableRaw/100, 2, ',', '.');

                                $energyCostRaw = ($invoiceValueRaw - $nonCompensatingFeesRaw) / $consumption;
                                $energyCost = number_format($energyCostRaw , 2, ',', '.');
                                $averageCryptoCost = number_format(1 / $fiatToCryptoRate, 2, ',', '.');

                                $cryptoBalanceUseValuated = $consumption / $fiatToCryptoRate;
                                $energyTraditionalCost = $consumption * $energyCostRaw;

                                $billTotalSavingsRaw = $energyTraditionalCost - $cryptoBalanceUseValuated;
                                $billTotalSavings = number_format($billTotalSavingsRaw, 2, ',', '.');
                            @endphp

                            <div class="resume-items invoice-resume" data-invoice-id="{{ $id }}">
                                <div class="flex-grow-1 mb-15">
                                    <!--begin::Table-->
                                    <div class="table-responsive border-bottom mb-4">
                                        <table class="table mb-3">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                    <th class="min-w-175px pb-2">Descrição</th>
                                                    <th class="min-w-100px text-end pb-2">Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">Valor total da fatura de energia</td>
                                                    <td class="text-dark fw-boldest">R$ {{ $value }}</td>
                                                </tr>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">Consumo compensável da fatura</td>
                                                    <td class="text-dark fw-boldest">{{ $consumption }} kWh</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">Saldo de DEC utilizado</td>
                                                    <td class="text-dark fw-boldest balance-crypto" data-qty="{{ $cryptoBalanceUse * 100 }}">{{ $cryptoBalanceUse }} DEC</td>
                                                </tr>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">DEC complementares</td>
                                                    <td class="text-dark fw-boldest complementary-crypto" data-qty="{{ $complementaryCryptoBalance * 100 }}">{{ $complementaryCryptoBalance }} DEC</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">Custo dos DEC complementares</td>
                                                    <td class="text-dark fw-boldest">R$ {{ $complementaryCryptoCost }}</td>
                                                </tr>
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="text-start">Taxas não compensáveis da fatura de energia</td>
                                                    <td class="text-dark fw-boldest">R$ {{ $nonCompensatingFees }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between mb-10">
                                        <div class="d-flex align-items-center fs-1 fw-boldest text-gray-900">Total a pagar</div>
                                        <div class="fs-1 text-dark fw-boldest total-payable" data-qty="{{ $totalPayableRaw }}">R$ {{ $totalPayable }}</div>
                                    </div>
                                    <!--end::Table-->

                                    <!--begin::Container-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Section-->
                                        <div class="mw-300px">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Label-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Custo do kWh nesta fatura:</div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">R$ {{ $energyCost }}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Label-->
                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Preço médio dos seus DECs:</div>
                                                <!--end::Label-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bolder fs-6 text-gray-800">R$ {{ $averageCryptoCost }}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->

                                            @if($complementaryCryptoBalance !== 0)
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-3">
                                                    <!--begin::Label-->
                                                    <div class="my-2 fw-bold text-gray-600 fs-7 text-gray-500">Pague R$ 0,86 por DEC no plano anual de créditos. <a href="{{ route('plan.index') }}" class="fw-bolder" target="_blank">Saiba mais</a></div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            @endif

                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Container-->
                                </div>

                                <div class="alert bg-light-info d-flex align-items-center p-5 mb-5">
                                    <!--begin::Svg Icon-->
                                {!! theme()->getSvgIcon('icons/duotune/ecommerce/ecm008.svg', "svg-icon-3x pe-3 svg-icon-info") !!}
                                <!--end::Svg Icon-->
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-info">Parabéns!</h4>
                                        <span>Ao pagar esta fatura de energia com DECs, você economizará <span class="fw-boldest">R$ {{ $billTotalSavings }}</span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--end::ResumeItems-->

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 4-->

                <!--begin::Step 5-->
                <div data-kt-stepper-element="content">

                    <!--begin::Wrapper-->
                    <div class="w-100">

                        <!--begin::Heading-->
                        <div class="pb-8 pb-lg-10">

                            <!--begin::Title-->
                            <h2 class="fw-bolder text-dark">Estamos quase lá!</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Body-->
                        <div class="mb-0">
                            <!--begin::Text-->
                            <label class="d-flex align-items-center form-label mb-5 fs-5">
                                Escolha um meio de pagamento para concluir
                            </label>
                            <!--end::Text-->

                            <div class="row mt-20">
                                <!--begin::Col-->
                                <div class="col-lg-6">

                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" name="payment-method" id="payment-method-bank-slip" value="bank-slip">

                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="payment-method-bank-slip">
                                        <!--begin::Icon-->
                                        <img class="w-35px h-35px me-5" src="https://cdn-icons-png.flaticon.com/128/3481/3481266.png"/>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="d-block fw-bold text-start">
                                        <span class="text-dark fw-bolder d-block fs-4 mb-0">Boleto</span>
                                    </span>
                                        <!--end::Info-->
                                    </label>
                                    <!--end::Option-->

                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-lg-6">

                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" name="payment-method" id="payment-method-pix" value="pix">

                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="payment-method-pix">
                                        <!--begin::Icon-->
                                        <img class="w-35px h-35px me-5" src="https://logospng.org/download/pix/logo-pix-icone-512.png"/>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="d-block fw-bold text-start">
                                        <span class="text-dark fw-bolder d-block fs-4 mb-0">PIX</span>
                                    </span>
                                        <!--end::Info-->
                                    </label>
                                    <!--end::Option-->

                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->

                            </div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 5-->

                <!--begin::Actions-->
                <div class="d-flex flex-stack pt-10">

                    <!--begin::Wrapper-->
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            {!! theme()->getSvgIcon('icons/duotune/arrows/arr063.svg', "svg-icon-4 me-1") !!}
                            <!--end::Svg Icon-->
                            Voltar
                        </button>
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Wrapper-->
                    <div>
                        <button type="button" id="btnPay" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label" id="label-pay">Efetuar pagamento
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                {!! theme()->getSvgIcon('icons/duotune/arrows/arr064.svg', "svg-icon-4 me-1") !!}
                                <!--end::Svg Icon-->
                            </span>
                            <span class="indicator-label d-none" id="label-wait">Aguarde...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                        <button type="button" id="btnNext" class="btn btn-lg btn-primary" data-kt-stepper-action="next" disabled>
                            Avançar
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            {!! theme()->getSvgIcon('icons/duotune/arrows/arr064.svg', "svg-icon-4 ms-1 me-0") !!}
                            <!--end::Svg Icon-->
                        </button>
                    </div>
                    <!--end::Wrapper-->

                </div>
                <!--end::Actions-->

            </div>
            <!--end::AllSteps-->

            <form novalidate="novalidate" id="invoice-pay-form" method="POST" action="{{ route('pay.invoicePay') }}">
                @csrf
                @method('POST')
                {{ Form::hidden('invoice-uuid', '', array('id' => 'invoice-uuid')) }}
                {{ Form::hidden('invoice-payment-method', '', array('id' => 'invoice-payment-method')) }}
                {{ Form::hidden('invoice-balance-crypto', '', array('id' => 'invoice-balance-crypto')) }}
                {{ Form::hidden('invoice-complementary-crypto', '', array('id' => 'invoice-complementary-crypto')) }}
                {{ Form::hidden('invoice-total-payable', '', array('id' => 'invoice-total-payable')) }}
            </form>

        </div>
        <!--end::Content-->
    </div>

</x-base-layout>
<script>
    // Stepper lement
    var element = document.querySelector("#pay_bill_stepper");

    // Initialize Stepper
    var stepper = new KTStepper(element);

    // Handle next step
    stepper.on("kt.stepper.next", function (stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
    });

    // Check for rules
    stepper.on("kt.stepper.changed", function() {

        switch (stepper.getCurrentStepIndex()) {
            case 2:
                showConsUnitInvoices(selectedConsUnit())
                break;
            case 3:
                console.log('selectedInvoice: ', selectedInvoice())
                showCompensationInvoice(selectedInvoice())
                break;
            case 4:
                showInvoiceResume(selectedInvoice())
                break;
            case 5:
                console.log(5)
                break;

        }

        $('#btnNext').attr('disabled', true)
        $('#btnPay').attr('disabled', true)

        if(stepper.getCurrentStepIndex() === 3 || stepper.getCurrentStepIndex() === 4){
            $('#btnNext').removeAttr('disabled')
        }
    });

    stepper.goTo(1);

</script>

<script>
    $('input').click(function (){
        $('#btnNext').removeAttr('disabled')
        $('#btnPay').removeAttr('disabled')
    })

    $('#btnPay').click(function (){
        submitClicked($(this));
    })

    const selectedConsUnit = () => {
        return $('[name="user_consumer_unit_id"]:checked').val();
    }

    const selectedInvoice = () => {
        return $('[name="user_invoice_id"]:checked').val();
    }

    const showConsUnitInvoices = (consumerId) => {
        $(`.invoices-wrapper`).addClass('d-none');
        $(`.invoices-wrapper[data-consumer-unit-id="${consumerId}"]`).removeClass('d-none');
    }

    const showCompensationInvoice = (invoiceId) => {
        $(`.crypto-compensation`).addClass('d-none');
        $(`.crypto-compensation[data-invoice-id="${invoiceId}"]`).removeClass('d-none');
    }

    const showInvoiceResume = (invoiceId) => {
        $(`.invoice-resume`).addClass('d-none');
        $(`.invoice-resume[data-invoice-id="${invoiceId}"]`).removeClass('d-none');
    }

    const submitClicked = (button) => {
        $(button).find('.indicator-label#label-pay').addClass('d-none');
        $(button).find('.indicator-label#label-wait').removeClass('d-none');

        $('#invoice-uuid').val(selectedInvoice());
        $('#invoice-payment-method').val($('[name="payment-method"]:checked').val());
        $('#invoice-balance-crypto').val($(`.invoice-resume[data-invoice-id="${selectedInvoice()}"]`).find('.balance-crypto').data('qty'));
        $('#invoice-complementary-crypto').val($(`.invoice-resume[data-invoice-id="${selectedInvoice()}"]`).find('.complementary-crypto').data('qty'));
        $('#invoice-total-payable').val($(`.invoice-resume[data-invoice-id="${selectedInvoice()}"]`).find('.total-payable').data('qty'));

        setTimeout(function() {
            $("form#invoice-pay-form").submit();
        }, 2000);
    }

</script>
