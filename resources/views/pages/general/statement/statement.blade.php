<x-base-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-12">

        <div class="col-lg-3 d-none d-lg-block">

            <!--begin::Card -->
            <div class="card mb-5 mb-xl-8">

                <!--begin::Card header-->
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="fw-bolder m-0">{{ __('Saldo de ativos') }}</h3>
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
                                        {!! theme()->getSvgIcon('demo2/media/icons/duotune/abstract/abs023.svg', "svg-icon-2x svg-icon-warning") !!}
                                    </span>
                                </div>
                                <!--end::Symbol-->

                                <div class="d-flex flex-column">
                                    <!--begin::Number-->
                                    <span class="fw-boldest fs-2 text-gray-800 lh-1">{{ $balanceEnergy }} <span class="fs-4 text-gray-500 fw-normal">kWh</span></span>
                                    <!--end::Number-->

                                    @if($balanceEnergyFlag === true)
                                        <span class="badge badge-light-warning fw-bold fs-8 mt-1 cursor-default" data-bs-toggle="tooltip" title="" data-bs-original-title="Você tem valores programados a pagar e/ou receber e estes valores podem refletir neste saldo atual.">{{ __('Saldo temporário') }}</span>
                                    @endif

                                </div>


                            </div>
                        </div>

                        @if($balanceEnergyFlag === true)
                            <div class="text-center mt-3 mb-0">

                                @if($energyIncoming > 0)
                                    <span class="badge badge-success p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de entrada: <span class="ms-1 fs-7 fw-boldest">{{ $energyIncoming }} kWh</span>
                                    </span>
                                @endif
                                @if($energyOutgoing > 0)
                                    <span class="badge badge-danger p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de saída: <span class="ms-1 fs-7 fw-boldest">{{ $energyOutgoing }} kWh</span>
                                    </span>
                                @endif

                            </div>
                        @endif
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
                                        {!! theme()->getSvgIcon('icons/crypto.svg', "svg-icon-2x svg-icon-primary") !!}
                                    </span>
                                </div>
                                <!--end::Symbol-->

                                <div class="d-flex flex-column">
                                    <!--begin::Number-->
                                    <span class="fw-boldest fs-2 text-gray-800 lh-1">{{ $balanceCrypto }} <span class="fs-4 text-gray-500 fw-normal">DEC</span></span>
                                    <!--end::Number-->

                                    @if($balanceCryptoFlag === true)
                                        <span class="badge badge-light-warning fw-bold fs-8 mt-1 cursor-default" data-bs-toggle="tooltip" title="" data-bs-original-title="Você tem valores programados a pagar e/ou receber e estes valores podem refletir neste saldo atual.">{{ __('Saldo temporário') }}</span>
                                    @endif

                                </div>

                            </div>
                        </div>

                        @if($balanceCryptoFlag === true)
                            <div class="text-center mt-3 mb-0">

                                @if($cryptoIncoming > 0)
                                    <span class="badge badge-success p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de entrada: <span class="ms-1 fs-7 fw-boldest">{{ $cryptoIncoming }} DEC</span>
                                    </span>
                                @endif
                                @if($cryptoOutgoing > 0)
                                    <span class="badge badge-danger p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de saída: <span class="ms-1 fs-7 fw-boldest">{{ $cryptoOutgoing }} DEC</span>
                                    </span>
                                @endif

                            </div>
                        @endif
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
                                        {!! theme()->getSvgIcon('icons/fiat.svg', "svg-icon-2x svg-icon-success") !!}
                                    </span>
                                </div>
                                <!--end::Symbol-->

                                <div class="d-flex flex-column">
                                    <!--begin::Number-->
                                    <span class="fw-boldest fs-2 text-gray-800 lh-1">{{ number_format($balanceFiat, 2, ',', '.') }} <span class="fs-4 text-gray-500 fw-normal">BRL</span></span>
                                    <!--end::Number-->

                                    @if($balanceFiatFlag === true)
                                        <span class="badge badge-light-warning fw-bold fs-8 mt-1 cursor-default" data-bs-toggle="tooltip" title="" data-bs-original-title="Você tem valores programados a pagar e/ou receber e estes valores podem refletir neste saldo atual.">{{ __('Saldo temporário') }}</span>
                                    @endif

                                </div>

                            </div>
                        </div>

                        @if($balanceFiatFlag === true)

                            <div class="text-center mt-3 mb-0">

                                @if($fiatIncoming > 0)
                                    <span class="badge badge-success p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de entrada: <span class="ms-1 fs-7 fw-boldest">{{ $fiatIncoming }} BRL</span>
                                    </span>
                                @endif
                                @if($fiatOutgoing > 0)
                                    <span class="badge badge-danger p-4 d-flex flex-center m-2" style="height: 22px">
                                        Previsão de saída: <span class="ms-1 fs-7 fw-boldest">{{ $fiatOutgoing }} BRL</span>
                                    </span>
                                @endif

                            </div>

                    @endif
                        <!--end::Item-->


                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Card body-->

            </div>
            <!--end::Card -->



        </div>

        <div class="col-lg-9">

            <!--begin::Card-->
            <div class="card">

                <!--begin::Card header-->
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="fw-bolder m-0">{{ __('Extrato de utilização') }}</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-2 pb-10">

                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-12">

                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div class="card-body p-0">

                                <!--begin::Timeline-->
                                <div class="timeline">

                                    @if(count($transactions) < 1)
                                        <div class="timeline-item">

                                            <!--begin::Timeline content-->
                                            <div class="timeline-content mb-10 mt-0">

                                                <!--begin::Timeline heading-->
                                                <div class="pe-3 mb-5">
                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bold text-center text-muted">
                                                        Você ainda não movimentou a sua conta
                                                    </div>

                                                    <div class="text-center m-20">
                                                        {!! theme()->getSvgIcon('icons/duotune/files/fil015.svg', "svg-icon-5tx svg-icon-gray-300") !!}
                                                    </div>
                                                    <!--end::Title-->

                                                </div>
                                                <!--end::Timeline heading-->

                                            </div>
                                            <!--end::Timeline content-->

                                        </div>
                                    @endif

                                    @foreach($transactions as $transaction)

                                        @if($transaction->monthBreak === true)
                                            <h3 class="fw-bolder mt-0 mb-15 text-gray-800 text-center">
                                                {{ $transaction->updated_at->formatLocalized('%B, %Y') }}
                                            </h3>
                                        @endif

                                        <!--begin::Timeline item-->
                                        <div class="timeline-item">

                                            <!--begin::Timeline line-->
                                            <div class="timeline-line w-40px"></div>
                                            <!--end::Timeline line-->

                                            <!--begin::Timeline icon-->
                                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                                <div class="symbol-label bg-light">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                                    {!! theme()->getSvgIcon($transaction->icon, "svg-icon-2x svg-icon-$transaction->color") !!}
                                                    <!--end::Svg Icon-->
                                                </div>
                                            </div>
                                            <!--end::Timeline icon-->

                                            <!--begin::Timeline content-->
                                            <div class="timeline-content mb-10 mt-0">

                                                <!--begin::Timeline heading-->
                                                <div class="pe-3 mb-5">
                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bold mb-2 d-flex justify-content-between">
                                                        <span>{{ __($transaction->type) }}</span>
                                                        <!--begin::Info-->
                                                        <div class="text-muted me-2 fs-7 text-nowrap">{{ $transaction->last_update }}</div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Title-->

                                                    <!--begin::Description-->
                                                    <div class="d-flex align-items-center mt-n2 fs-6">
                                                        <span class="badge badge-light-{{ $transaction->color }} fw-normal fs-9 mt-1 cursor-default">{{ __($transaction->status) }}</span>
                                                    </div>
                                                    <!--end::Description-->

                                                </div>
                                                <!--end::Timeline heading-->

                                                <!--begin::Timeline details-->
                                                <div class="overflow-auto pb-5">

                                                    @foreach($transaction->events as $event)

                                                        <!--begin::Record-->
                                                        <div class="d-flex align-items-center justify-content-between px-7 py-3 mb-5">

                                                            <!--begin::Title-->
                                                            <span class="fs-6 text-dark fw-normal me-2 ms-n5" style="min-inline-size: fit-content">{!! $event->event_description !!}</span>
                                                            <!--end::Title-->

                                                            <!--begin::Separator Line-->
                                                            <div class="d-flex border-top-1 mt-2 border-top-dashed border-gray-300 w-100"></div>
                                                            <!--end::Separator Line-->

                                                            <!--begin::value-->
                                                            <div class="text-end ms-2" style="min-inline-size: fit-content">
                                                                <span class="fs-5 text-dark text-hover-primary fw-bold">{!! $event->event_marker !!}</span>
                                                            </div>
                                                            <!--end::value-->

                                                        </div>
                                                        <!--end::Record-->


                                                        @if($event->asset === 'crypto' && $event->result !== null && property_exists(json_decode($event->result), 'hash'))
                                                            <div class="rounded border px-5 pt-2 mb-5 me-5">

                                                                <!--begin::Accordion-->
                                                                <div class="accordion accordion-icon-toggle" id="kt_accordion_{{ $event->uuid }}">

                                                                    <!--begin::Item-->
                                                                    <div class="mb-2">

                                                                        <!--begin::Header-->
                                                                        <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_{{ $event->uuid }}_item_1">
                                                                            <span class="accordion-icon">
                                                                                <span class="svg-icon svg-icon-4">
                                                                                    <?php echo theme()->getSvgIcon("icons/duotune/arrows/arr064.svg", "svg-icon-2x")?>
                                                                                </span>
                                                                            </span>
                                                                            <h3 class="fs-5 fw-bold mb-0 ms-2 my-1">Esta transação está registrada na Blockchain</h3>
                                                                        </div>
                                                                        <!--end::Header-->

                                                                        <!--begin::Body-->
                                                                        <div id="kt_accordion_{{ $event->uuid }}_item_1" class="fs-6 collapse ps-0" data-bs-parent="#kt_accordion_{{ $event->uuid }}">

                                                                            <a class="fs-7 my-10" target="_blank" href="{{ $binance_explorer_url.'/tx/'.json_decode($event->result)->hash }}">
                                                                                <code>{{ $binance_explorer_url.'/tx/'.json_decode($event->result)->hash }}</code>
                                                                            </a>

                                                                            <textarea readonly spellcheck="false" class="form-control mt-5 mb-8 bg-lighten text-gray-700 font-monospace p-5" rows="9" >{{ stripslashes(json_encode(json_decode($event->result), JSON_PRETTY_PRINT)) }}</textarea>

                                                                        </div>
                                                                        <!--end::Body-->

                                                                    </div>
                                                                    <!--end::Item-->


                                                                </div>
                                                                <!--end::Accordion-->

                                                            </div>
                                                        @endif


                                                    @endforeach

                                                </div>
                                                <!--end::Timeline details-->

                                            </div>
                                            <!--end::Timeline content-->


                                        </div>
                                        <!--end::Timeline item-->


                                    @endforeach

                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end::Tab panel-->
                        </div>

                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Card body-->

            </div>
            <!--end::Card-->

        </div>

    </div>
    <!--end::Row-->

</x-base-layout>
