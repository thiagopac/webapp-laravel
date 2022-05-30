<?php
    $activeTab1 = Request::path() ==  'operations/negotiate/purchase' ? 'active' : '';
    $activeTab2 = Request::path() ==  'operations/negotiate/sale' ? 'active' : '';
?>
<!--begin::NavBar-->
<div class="nav-group bg-transparent mx-auto mb-15 text-center" style="width: fit-content">
    <a href="{{ route('negotiate.purchase') }}" class="btn btn-active-secondary px-6 py-3 {{ $activeTab1 }}" data-kt-plan="month">{{ __('Comprar') }}</a>
    <a href="{{ route('negotiate.sale') }}" class="btn btn-active-secondary px-6 py-3 {{ $activeTab2 }}" data-kt-plan="annual">{{ __('Vender') }}</a>
</div>
<!--end::NavBar-->

<!--begin::Balance-->
<div class="row g-xl-12">

    <!--begin::Col-->
    <div class="col-12">

        <div class="border border-gray-300 border-dashed rounded py-3 px-4">

            <!--begin::Number-->
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    {!! theme()->getSvgIcon('icons/fiat.svg', "svg-icon-4x svg-icon-success ms-n3") !!}
                    <div class="fs-1 fw-bolder" data-kt-countup-duration="1" data-kt-countup="true" data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-prefix="R$ " data-kt-countup-decimal-places="2" data-kt-countup-value="{{ $balanceFiat }}" data-kt-countup-prefix="">0</div>
                </div>
                <span class="fs-3 text-gray-600 mx-2 text-uppercase">Saldos</span>
                <div class="d-flex align-items-center">
                    <div class="fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-duration="1"  data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-decimal-places="0" data-kt-countup-value="{{ number_format($balanceCrypto, 0) }}" data-kt-countup-prefix="">0</div>
                    <span class="fs-1 text-gray-500 mx-2">DEC</span>
                    {!! theme()->getSvgIcon('icons/crypto.svg', "svg-icon-4x svg-icon-primary") !!}
                </div>
            </div>
            <!--end::Number-->

        </div>


    </div>
    <!--end::Col-->

    @if(false)
    <!--begin::Col-->
    <div class="col-12">

        <div class="border border-gray-300 border-dashed rounded py-3 px-4">

            <!--begin::Number-->
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="fs-4">{{ __('Saldo disponível de tokens') }}</span>
                </div>

                <div class="d-flex align-items-center">
                    <div class="fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-duration="1"  data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-decimal-places="0" data-kt-countup-value="{{ number_format($balanceCrypto, 0) }}" data-kt-countup-prefix="">0</div>
                    <span class="fs-3 text-gray-500 mx-2">DEC</span>
                    {!! theme()->getSvgIcon('icons/crypto.svg', "svg-icon-4x svg-icon-primary") !!}
                </div>
            </div>
            <!--end::Number-->

        </div>


    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-12 mt-4">

        <div class="border border-gray-300 border-dashed rounded py-3 px-4">

            <!--begin::Number-->
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="fs-4">{{ __('Saldo disponível em Dinheiro') }}</span>
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
    @endif

</div>
<!--end::Balance-->
