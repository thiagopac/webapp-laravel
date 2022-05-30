<div>
    <!--begin::List Widget 3-->
    <div class="card {{ $class }}">
        <!--begin::Header-->
        <div class="card-header border-0">
            <h3 class="card-title fw-bolder text-dark fs-3 text-gray-800">{{ __('Últimas transações') }}</h3>

{{--            <div class="card-toolbar">--}}
{{--                <!--begin::Menu-->--}}
{{--                <button type="button" class="btn btn-sm btn-icon btn-color-gray-500 btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
{{--                    {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}--}}
{{--                </button>--}}
{{--                {{ theme()->getView('partials/menus/_menu-widgets-resumes') }}--}}
{{--                <!--end::Menu-->--}}
{{--            </div>--}}
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-2">

            <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                <tbody id="last-transactions">

                    @if(count($transactions) < 1)
                        <!--begin::Table row-->
                        <tr>
                            <td class="fs-5 fw-bold text-center text-muted">
                                Você ainda não movimentou a sua conta
                            </td>
                        </tr>
                        <!--end::Table row-->
                    @endif


                    @foreach($transactions as $transaction)

                        <!--begin::Table row-->
                        <tr>

                            <!--begin::Badge=-->
                            <td class="min-w-70px">
                                <div class="badge badge-light-{{ $transaction->color }}">{{ __($transaction->status) }}</div>
                            </td>
                            <!--end::Badge=-->

                            <!--begin::Status=-->
                            <td>{{ $transaction->type }}</td>
                            <!--end::Status=-->

                            <!--begin::Status=-->
                            <td>
                                <div class="border border-gray-300 border-dashed rounded text-center">
                                    <div class="fw-bold text-gray-400 py-2">
                                        {!! $transaction->events_marker  !!}
                                    </div>
                                </div>
                            </td>
                            <!--end::Status=-->

                            <!--begin::Timestamp=-->
                            <td class="pe-0 text-end d-none d-lg-block">
                                {{ $transaction->last_update }}
                            </td>
                            <!--end::Timestamp=-->

                        </tr>
                        <!--end::Table row-->
                    @endforeach

                </tbody>
            </table>

            @if(count($transactions) > 4)
                <button class="btn btn-bg-white btn-color-gray-600 border border-1 w-100 fs-6 px-8 py-4 mt-2 load-more" data-page="1" data-link="{{ route('wallet.listTransactions') }}" data-append="#last-transactions">{{ __('Ver mais') }}</button>
            @endif

        </div>
        <!--end::Body-->
    </div>
    <!--end:List Widget 3-->

</div>
@section('scripts')
<script>
    $(document).ready(function() {

        $(".load-more").click(function() {
            const append_el = $($(this).data('append'));
            const link = $(this).data('link');

            let page = $(this).data('page');
            let href = `${link}/${page}`;
            $.get(href, function(data) {

                if(data.length < 1) $(".load-more").addClass('d-none');

                data.map((item) => {

                    let status = ``;
                    let element = `<tr>
                            <td class="min-w-70px">
                                <div class="badge badge-light-success">${ item.status }</div>
                            </td>
                            <td>${item.type}</td>
                            <td>
                                <div class="border border-gray-300 border-dashed rounded py-1 px-0 me-0 mb-1 text-center">
                                    <div class="fw-bold text-gray-400 py-2">
                                        ${item.events_marker}
                                    </div>
                                </div>
                            </td>
                            <td class="pe-0 text-end">
                                ${item.last_update}
                            </td>
                        </tr>`;
                    append_el.append(element);
                });

            });

            $(this).data('page', (parseInt(page) + 1));
        });

    });
</script>
@endsection
