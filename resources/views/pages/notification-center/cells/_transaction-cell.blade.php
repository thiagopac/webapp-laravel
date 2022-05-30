@php
    $notification = $notification ?? null;
    $transaction = new \App\Models\Transaction($notification->data);

    $event = $event ?? null;
    $styles = [
        'completed'         => 'success',
        'awaiting-approval' => 'warning',
        'processing'        => 'primary',
        'disapproved'       => 'danger',
        'failed'            => 'danger',
        'ready-to-process'  => 'primary'
    ];
    $style = $styles[$transaction->status];

    $transaction_diagnosis = $transaction->status === 'completed' ? 'sucesso' : 'falha';
@endphp
<!--begin::Timeline item-->
<div class="timeline-item px-10">

    <!--begin::Timeline line-->
{{--    <div class="timeline-line w-40px"></div>--}}
    <!--end::Timeline line-->

    <!--begin::Timeline icon-->
    <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
        <div class="symbol-label bg-{{ $style }}">
            {!! theme()->getSvgIcon("icons/duotune/abstract/abs008.svg", "svg-icon-1 svg-icon-white") !!}
        </div>
    </div>
    <!--end::Timeline icon-->

    <!--begin::Timeline content-->
    <div class="timeline-content mb-6 mt-n1">
        <!--begin::Timeline heading-->
        <div class="pe-3 mb-5">
            <div class="d-flex justify-content-between">
                <!--begin::Title-->
                <div class="fs-5 fw-bold mb-2"><span class="text-{{ $style }}"> Transação concluída com {{ $transaction_diagnosis }}</span></div>
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
                <a href="#" class="fs-6 text-dark text-hover-primary fw-bold w-375px min-w-200px">{{ $transaction->uuid }}</a>
                <!--end::Title-->

                <!--begin::Label-->
                <div class="min-w-175px">
                    <span class="fs-6">
                        {{ __($transaction->type) }}
                    </span>
                </div>
                <!--end::Label-->


                <!--begin::Progress-->
                <div class="min-w-125px">
                    <span class="badge badge-light-{{ $style }} fw-bolder border-0">{{ __("$transaction->status") }}</span>
                </div>
                <!--end::Progress-->

                <!--begin::Action-->
                <a href="{{ route('transaction.view', $transaction->uuid) }}" class="btn btn-sm btn-white btn-active-light-primary">
                    Ver
                </a>
                <!--end::Action-->


            </div>
            <!--end::Record-->
        </div>
        <!--end::Timeline details-->
    </div>
    <!--end::Timeline content-->
</div>
<!--end::Timeline item-->
