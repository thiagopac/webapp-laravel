@php
    $notification = $notification ?? null;
    $event = new \App\Models\ExchangeEvent($notification->data);

    $binance_explorer_url = env("BINANCE_EXPLORER_URL");

    $event = $event ?? null;
    $styles = [
        'canceled' => 'danger',
        'locked' => 'warning',
        'fail'     => 'danger',
        'success'  => 'success',
        'awaiting-run' => 'primary',
        'running' => 'primary',
    ];
    $style = $styles[$event->status];

    $event_diagnosis = $event->status === 'success' ? 'sucesso' : 'falha';

@endphp
<!--begin::Timeline item-->
<div class="timeline-item px-10">

    <!--begin::Timeline line-->
{{--    <div class="timeline-line w-40px"></div>--}}
    <!--end::Timeline line-->

    <!--begin::Timeline icon-->
    <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
        <div class="symbol-label bg-{{ $style }}">
            {!! theme()->getSvgIcon("icons/duotune/abstract/abs014.svg", "svg-icon-1 svg-icon-white") !!}
        </div>
    </div>
    <!--end::Timeline icon-->

    <!--begin::Timeline content-->
    <div class="timeline-content mb-6 mt-n1">
        <!--begin::Timeline heading-->
        <div class="pe-3 mb-5">

            <div class="d-flex justify-content-between">

                <!--begin::Title-->
                <div class="fs-5 fw-bold mb-2"><span class="text-{{ $style }}">Evento concluído com {{ $event_diagnosis }}</span></div>
                <!--end::Title-->

                <div class="btn btn-active-white px-2 py-0">
                    <button class="btn btn-link fs-7 text-muted mark-as-read" data-id="{{ $notification->id }}">Marcar como lido</button>
                </div>
            </div>


            <!--begin::Description-->
            <div class="d-flex align-items-center mt-n4 fs-6">
                <!--begin::Info-->
                <div class="text-muted me-2 fs-7">{{ $notification->created_at->formatLocalized('%d de %B, %Y - %H:%M') }}</div>
                <!--end::Info-->
            </div>
            <!--end::Description-->

        </div>
        <!--end::Timeline heading-->

        <!--begin::Timeline details-->
        <div class="overflow-auto pb-5">

            <!--begin::Record-->
            <div class="d-flex align-items-center border border-dashed border-gray-400 rounded min-w-750px px-7 py-5 mb-0">

                <!--begin::Title-->
                <span class="fs-6 text-dark text-hover-primary fw-bold w-375px min-w-200px">{{ $event->uuid }}</span>
                <!--end::Title-->

                <!--begin::Label-->
                <div class="min-w-175px">
                    <span class="fs-6">

                        @php
                            $event = $event ?? null;
                            $event->value = match ($event->asset) {
                                'energy' => number_format($event->value/100, 0, ',', '.').' '.'kWh',
                                'crypto' => number_format($event->value/100, 0, ',', '.').' '.'DEC',
                                'fiat' => 'R$'.' '.number_format($event->value/100, 2, ',', '.')
                            };
                        @endphp

                        {{ __($event->movement)." ".__('de')." ".$event->value }}

                    </span>
                </div>
                <!--end::Label-->

                <!--begin::Progress-->
                <div class="min-w-125px">
                    <span class="badge badge-light-{{ $style }} fw-bolder border-0">{{ __("$event->status") }}</span>
                </div>
                <!--end::Progress-->

                <!--begin::Action-->
                <div class="btn btn-sm btn-white btn-active-light-primary accordion collapsed" id="kt_accordion_notification_{{ $event->uuid }}" data-bs-toggle="collapse" data-bs-target="#kt_accordion_notification_{{ $event->uuid }}_item_1">
                    Detalhes
                </div>
                <!--end::Action-->

            </div>
            <!--end::Record-->


            <!--begin::Accordion-->
            <div id="kt_accordion_notification_{{ $event->uuid }}">

                <!--begin::Body-->
                <div id="kt_accordion_notification_{{ $event->uuid }}_item_1" class="fs-6 collapse ps-0 mt-5" data-bs-parent="#kt_accordion_notification_{{ $event->uuid }}">

                    @if($event->asset === 'crypto' && $event->result !== null && property_exists(json_decode($event->result), 'hash'))
                        <div class="pt-0 pb-5">
                            <a class="fs-8" target="_blank" href="{{ $binance_explorer_url.'/tx/'.json_decode($event->result)->hash }}">
                                <code>{{ $binance_explorer_url.'/tx/'.json_decode($event->result)->hash }}</code>
                            </a>
                        </div>
                    @endif

                    <textarea readonly spellcheck="false" class="form-control bg-lighten fs-7 text-gray-700 font-monospace p-5" rows="9" >{{ stripslashes(json_encode(json_decode($event->result), JSON_PRETTY_PRINT)) }}</textarea>

                </div>
                <!--end::Body-->

            </div>
            <!--end::Accordion-->

        </div>
        <!--end::Timeline details-->
    </div>
    <!--end::Timeline content-->

</div>
<!--end::Timeline item-->
