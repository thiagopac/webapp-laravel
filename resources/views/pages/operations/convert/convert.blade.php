<x-base-layout>
    <div class="col-12">

        <!--begin::Card-->
        <div class="card pt-2 pb-10">

            <!--begin::Icon-->
            <div class="position-absolute top-0 end-0 opacity-25 m-10 pe-2 text-end d-none d-md-block">
                <i class="las la-exchange-alt fs-5tx"></i>
            </div>
            <!--end::Icon-->

            <!--begin::Card header-->
            <div class="card-header border-0">
                <div class="card-title">
{{--                    <h3 class="fw-bolder m-0">{{ __('Converter créditos') }}</h3>--}}
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Form-->
            <form id="transact" class="form" novalidate="novalidate" method="POST" action="{{ route('convert.createTransaction') }}">
            @csrf
            @method('POST')

                <!--begin::Card body-->
                <div class="card-body pt-2 pb-10">

                    <!--begin::Row-->
                    <div class="row justify-content-center">

                        <!--begin::Col-->
                        <div class="col-xl-6">

                            <!--begin::Row-->
                            <div class="row g-xl-12">

                                <!--begin::Col-->
                                <div class="col-12">

                                    <div class="border border-gray-300 border-dashed rounded py-3 px-4">

                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="fs-3 text-gray-600 mx-2 text-uppercase">{{ __('Saldo disponível para conversão') }}</span>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-duration="1" data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-decimal-places="0" data-kt-countup-value="{{ $balanceEnergy }}" data-kt-countup-prefix="">0</div>
                                                <span class="fs-3 text-gray-500 mx-2">kWh</span>

                                                {!! theme()->getSvgIcon('icons/energy.svg', "svg-icon-4x svg-icon-warning") !!}
                                            </div>
                                        </div>
                                        <!--end::Number-->

                                    </div>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-10">

                                <!--begin::Col-->
                                <div class="col-12 d-lg-flex">

                                    <!--begin::Col-->
                                    <div class="col-lg-5">

                                        <div class="text-center">

                                            <span class="fs-4 fw-bold text-gray-700 d-block">{{ __('Créditos para conversão') }}</span>

                                            <div class="d-flex border border-gray-300 align-items-center min-w-125px rounded px-10 py-2 my-4 justify-content-between">
                                                <input type="number" class="form-control border-0 text-end fs-2hx fw-bolder" data-show-decimals="0" data-ratio="{{ $energyToCryptoRate }}" name="operation-input" id="operation-input" min="10" max="{{ $balanceEnergy }}" placeholder="0" value=""/>
                                                <span class="fs-3 text-gray-500">kWh</span>
                                            </div>

                                        </div>

                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-2 d-none d-lg-block m-auto mb-8">
                                        <div class="text-center align-self-baseline">
                                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/arrows/arr080.svg', "svg-icon-4x svg-icon-warning") !!}
                                        </div>
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-5">

                                        <div class="text-center">

                                            <span class="fs-4 fw-bold text-gray-700 d-block">{{ __('Saldo equivalente') }}</span>

                                            <div class="d-flex border border-gray-300 bg-lighten align-items-center min-w-125px rounded px-10 py-2 my-4 justify-content-between">
                                                <span class="form-control border-0 bg-transparent text-end fs-2hx pe-7 fw-bolder" data-show-decimals="0"  name="operation-output" id="operation-output">0</span>
                                                <span class="fs-3 text-gray-500">DEC</span>
                                            </div>

                                        </div>

                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-2">

                                <!--begin::Col-->
                                <div class="col-12 d-flex">

                                    <button type="button" class="btn btn-sm btn-primary m-1 w-25 fs-4 button-increase text-nowrap" data-increase="10">+ 10</button>
                                    <button type="button" class="btn btn-sm btn-primary m-1 w-25 fs-4 button-increase text-nowrap" data-increase="50">+ 50</button>
                                    <button type="button" class="btn btn-sm btn-primary m-1 w-25 fs-4 button-increase text-nowrap" data-increase="100">+ 100</button>
                                    <button type="button" class="btn btn-sm btn-primary m-1 w-25 fs-4 button-increase text-nowrap" data-increase="{{ $balanceEnergy }}">TOTAL</button>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-20">

                                <!--begin::Col-->
                                <div class="col-12">

                                    <div class="alert alert-warning rounded-4 bg-light-warning d-flex align-items-center p-5 mb-10">

                                        {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen044.svg', "svg-icon-3x me-4 svg-icon-warning") !!}

                                        <div class="d-flex flex-column">
                                            <h4 class="mb-1 text-warning">{{ __('Atenção')}}</h4>
                                            <span>{{ __('Esta transação poderá levar até 48 horas para ser validada pela sua concessionária de energia') }}</span>
                                        </div>
                                    </div>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-2 mb-5">

                                <!--begin::Col-->
                                <div class="col-12">

                                    <button type="submit" class="btn btn-primary w-100">
                                        <span class="svg-icon svg-icon-1">
                                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen037.svg', "svg-icon-3x  me-4") !!}
                                        </span>
                                        {{ __('Solicitar conversão') }}
                                    </button>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Card body-->

            </form>
            <!--end::Form-->

        </div>
        <!--end::Card-->

    </div>
</x-base-layout>
