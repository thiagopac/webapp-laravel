<x-base-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-12">

        <div class="col-lg-3 d-none d-lg-block" widget-id="widget-balance-options">
            {{ theme()->getView('partials/widgets/mixed/_widget-balance-options', array('class' => 'card-xxl-stretch-50')) }}
        </div>

        <div class="col-lg-9">

            <!--begin::Card-->
            <div class="card">

                <!--begin::Card header-->
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="fw-bolder m-0">{{ __('Seus ativos') }}</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-2 pb-10">

                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-12">

                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <div widget-id="widget-asset-convert">
                                {{ theme()->getView('partials/widgets/mixed/_widget-asset-convert', array('balanceEnergy' => $balanceEnergy, 'balanceEnergyFlag' => $balanceEnergyFlag)) }}
                            </div>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <div widget-id="widget-asset-negotiate">
                                {{ theme()->getView('partials/widgets/mixed/_widget-asset-negotiate', array('balanceCrypto' => $balanceCrypto, 'balanceCryptoFlag' => $balanceCryptoFlag)) }}
                            </div>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <div widget-id="widget-asset-withdraw">
                                {{ theme()->getView('partials/widgets/mixed/_widget-asset-withdraw', array('balanceFiat' => $balanceFiat, 'balanceFiatFlag' => $balanceFiatFlag)) }}
                            </div>
                        </div>
                        <!--end::Col-->

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
