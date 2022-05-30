<x-base-layout>
    <div class="col-12">

        <!--begin::Card-->
        <div class="card pt-2 pb-10">

            <!--begin::Icon-->
            <div class="position-absolute top-0 end-0 opacity-25 m-10 pe-2 text-end d-none d-md-block">
                <i class="las la-money-check-alt fs-5tx"></i>
            </div>
            <!--end::Icon-->

            <!--begin::Card header-->
            <div class="card-header border-0">
                <div class="card-title">
{{--                    <h3 class="fw-bolder m-0">{{ __('Transferir saldo') }}</h3>--}}
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Form-->
            <form id="transact" class="form" novalidate="novalidate" method="POST" action="{{ route('withdraw.createTransaction') }}">
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
                                                <span class="fs-3 text-gray-600 mx-2 text-uppercase">{{ __('Saldo disponível em Dinheiro') }}</span>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="fs-1 fw-bolder" data-kt-countup-duration="1" data-kt-countup="true" data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-prefix="R$ " data-kt-countup-decimal-places="2" data-kt-countup-value="{{ $balanceFiat }}" data-kt-countup-prefix="">0</div>
                                                {!! theme()->getSvgIcon('icons/fiat.svg', "svg-icon-4x svg-icon-success") !!}
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
                                <div class="col-12">

                                    <span class="fs-4 fw-bold text-gray-700 d-block">{{ __('Valor do saque') }}</span>

                                    <div class="d-flex border border-gray-300 align-items-center min-w-125px rounded px-10 py-2 my-4 justify-content-between">
                                        <span class="fs-1 text-gray-500">R$</span>
                                        <input type="number" class="form-control border-0 text-end fs-2hx fw-bolder" data-show-decimals="2" name="operation-input" id="operation-input" min="10" max="{{ $balanceFiat }}" placeholder="0,00" value="" required/>
                                    </div>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-2">

                                <!--begin::Col-->
                                <div class="col-12 d-flex">

                                    <button type="button" class="btn btn-sm btn-dark m-1 w-25 fs-4 button-increase text-nowrap" data-increase="10">+ 10</button>
                                    <button type="button" class="btn btn-sm btn-dark m-1 w-25 fs-4 button-increase text-nowrap" data-increase="50">+ 50</button>
                                    <button type="button" class="btn btn-sm btn-dark m-1 w-25 fs-4 button-increase text-nowrap" data-increase="100">+ 100</button>
                                    <button type="button" class="btn btn-sm btn-dark m-1 w-25 fs-4 button-increase text-nowrap" data-increase="{{ $balanceFiat }}">{{ __('TOTAL') }}</button>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-10">

                                <!--begin::Col-->
                                <div class="col-12">

                                    <span class="fs-4 fw-bold text-gray-700 d-block">{{ __('Conta bancária destino') }}</span>

                                    <select name="user-bank" aria-label="{{ __('Selecione uma conta') }}" data-control="select2" data-placeholder="{{ __('Selecione uma conta') }}" class="form-select form-select-solid form-select-lg my-4" required>
                                        <option value="">{{ __('Selecione uma conta') }}</option>
                                        @foreach($userBanks as $userBank)
                                            <option value="{{ $userBank->uuid }}">{{ collect(\App\Core\Data::getBankList())->get($userBank->code)['name'] }} • {{ __('Agência') }}: {{ $userBank->branch }} • {{ __('Conta') }}: {{ $userBank->account }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-xl-12 mt-10">

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

                                    <button type="submit" class="btn btn-dark w-100">
                                        <span class="svg-icon svg-icon-1">
                                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen037.svg', "svg-icon-3x  me-4") !!}
                                        </span>
                                        {{ __('Solicitar saque') }}
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
