<x-base-layout>
    <div class="col-12">

        <!--begin::Card-->
        <div class="card pt-2 pb-10">

            <!--begin::Icon-->
            <div class="position-absolute top-0 end-0 opacity-25 m-10 pe-2 text-end d-none d-md-block">
                <i class="las la-calculator fs-5tx"></i>
            </div>
            <!--end::Icon-->

            <!--begin::Card header-->
            <div class="card-header border-0">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">{{ __('Plano mensal de créditos') }}</h3>
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-2 pb-15">

                <!--begin::Row-->
                <div class="row g-xl-12">

                    <!--begin::Col-->
                    <div class="col-12">

                        <div class="border border-gray-300 border-dashed rounded py-3 px-4">

                            <!--begin::Number-->
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    {!! theme()->getSvgIcon('icons/duotune/abstract/abs027.svg', "svg-icon-4x svg-icon-primary") !!}
                                    <span class="fs-4 ms-2">{{ __('Plano de créditos vigente') }}</span>
                                </div>

                                <div class="d-flex align-items-center">
                                    <span class="fs-1 fw-boldest">-</span>
                                </div>
                            </div>
                            <!--end::Number-->

                        </div>

                    </div>
                    <!--end::Col-->

                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row g-xl-12 mt-10  justify-content-center">

                    <!--begin::Col-->
                    <div class="col-lg-4">
                        <span class="fs-4 fw-bold text-gray-700">{!! __('Quantidade mensal desejada de tokens <strong class="text-primary fw-boldest">DEC</strong>') !!}</span>

                        <div class="d-flex border border-gray-300 align-items-center min-w-125px rounded px-10 py-2 my-4 justify-content-between">
                            <input id="token-qty-plan" type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" inputmode="numeric" maxlength="10" min="100" class="form-control border-0 text-end fs-2hx fw-bolder" placeholder="100" value="100"/>
                            <span class="fs-1 text-gray-500">DEC</span>
                        </div>

                    </div>
                    <!--end::Col-->

                </div>
                <!--end::Row-->

                <div class="row g-xl-12 mt-20">

                    <!--begin::Col-->
                    <div class="col-xl-4 my-2">

                        <div class="d-flex h-100 align-items-center">

                            <!--begin::Option-->
                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-gray-100 py-15 px-10">

                                <!--begin::Heading-->
                                <div class="mb-7 text-center">

                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-5 fw-boldest">Mensal</h1>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="text-gray-400 fw-bold">
                                        Valor unitário do DEC neste plano: <span class="fw-bolder">R$ 0,90</span>
                                    </div>
                                    <!--end::Description-->

                                </div>
                                <!--end::Heading-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Price-->
                                <div class="text-center">
                                    <span class="fs-3x fw-bolder text-primary" id="1-month-price">0</span>
                                    <span class="fs-4 fw-lighter opacity-50">/mês</span>
                                </div>
                                <!--end::Price-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Select-->
                                <button class="btn btn-sm btn-primary text-uppercase fs-2 w-100 my-10 subscribe-button">{{ __('Assinar') }}</button>
                                <!--end::Select-->

                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold mt-5 text-center">
                                    {!! __('Este plano é automaticamente <br /> renovado a cada mês') !!}
                                </div>
                                <!--end::Description-->

                            </div>
                            <!--end::Option-->
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xl-4 my-2">

                        <div class="d-flex h-100 align-items-center">

                            <!--begin::Option-->
                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-gray-100 py-20 px-10">

                                <!--begin::Heading-->
                                <div class="mb-7 text-center">

                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-5 fw-boldest">Semestral</h1>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="text-gray-400 fw-bold">
                                        Valor unitário do DEC neste plano: <span class="fw-bolder">R$ 0,88</span>
                                    </div>
                                    <!--end::Description-->

                                </div>
                                <!--end::Heading-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Price-->
                                <div class="text-center">
                                    <span class="fs-3x fw-bolder text-primary" id="6-month-price">0</span>
                                    <span class="fs-4 fw-lighter opacity-50">/mês</span>
                                </div>
                                <!--end::Price-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Select-->
                                <button class="btn btn-sm btn-primary text-uppercase fs-2 w-100 my-10 subscribe-button">{{ __('Assinar') }}</button>
                                <!--end::Select-->

                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold mt-5 text-center">
                                    {!! __('Este plano é automaticamente <br /> renovado a cada 6 meses') !!}
                                </div>
                                <!--end::Description-->

                            </div>
                            <!--end::Option-->
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xl-4 my-2">

                        <div class="d-flex h-100 align-items-center">

                            <!--begin::Option-->
                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-gray-100 py-15 px-10">

                                <!--begin::Heading-->
                                <div class="mb-7 text-center">

                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-5 fw-boldest">Anual</h1>
                                    <!--end::Title-->

                                    <!--begin::Description-->
                                    <div class="text-gray-400 fw-bold">
                                        Valor unitário do DEC neste plano: <span class="fw-bolder">R$ 0,86</span>
                                    </div>
                                    <!--end::Description-->

                                </div>
                                <!--end::Heading-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Price-->
                                <div class="text-center">
                                    <span class="fs-3x fw-bolder text-primary" id="12-month-price">0</span>
                                    <span class="fs-4 fw-lighter opacity-50">/mês</span>
                                </div>
                                <!--end::Price-->

                                <!--begin::Separator-->
                                <div class="separator separator-dotted separator-content border-secondary my-10 w-75">
                                    <i class="bi bi-x-diamond-fill text-secondary fs-5"></i>
                                </div>
                                <!--begin::Separator-->


                                <!--begin::Select-->
                                <button class="btn btn-sm btn-primary text-uppercase fs-2 w-100 my-10 subscribe-button">{{ __('Assinar') }}</button>
                                <!--end::Select-->

                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold mt-5 text-center">
                                    {!! __('Este plano é automaticamente <br /> renovado a cada 12 meses') !!}
                                </div>
                                <!--end::Description-->

                            </div>
                            <!--end::Option-->
                        </div>
                    </div>
                    <!--end::Col-->

                </div>

            </div>
            <!--end::Card body-->

        </div>
        <!--end::Card-->

    </div>
</x-base-layout>
<script>

    var renderPlanPrice = (desired) => {
        $("#1-month-price").html(`${(desired * 0.90).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}`);
        $("#6-month-price").html(`${(desired * 0.88).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}`);
        $("#12-month-price").html(`${(desired * 0.86).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}`);

        desired < 100 ? $('.subscribe-button').attr('disabled', true) : $('.subscribe-button').attr('disabled', false)
    }

    $('#token-qty-plan').on('input',function(){
        renderPlanPrice($(this).val());
    });

    renderPlanPrice($('#token-qty-plan').val());
</script>
