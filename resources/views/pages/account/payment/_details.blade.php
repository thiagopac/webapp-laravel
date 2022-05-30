<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Métodos de pagamento') }}</h3>
        </div>
        <!--end::Card title-->

        <!--begin::Action-->
        <button data-url="{{ route('payment.create')}}" class="open-master-modal btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#master-modal">{{ __('Cadastrar') }}</button>
        <!--end::Action-->

    </div>
    <!--begin::Card header-->

    <!--begin::Card body-->
    <div class="card-body">

        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6 bg-light-primary border border-primary border-dashed">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-bold">
                    <h4 class="text-gray-900 fw-bolder">{{ __('Seus dados estão seguros') }}</h4>
                    <div class="fs-6 text-gray-700">{{ __('Os dados de cartões de crédito e débito não ficam gravados em nossos servidores.') }}
                        <a href="#" class="fw-bolder">Saiba mais</a>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>

        <!--begin::Options-->
        <div id="kt_create_new_payment_method">

        @foreach($paymentMethods as $index => $paymentMethod)

                <div class="py-1">
                    <!--begin::Header-->
                    <div class="py-3 d-flex flex-stack flex-wrap">
                        <!--begin::Toggle-->
                        <div class="d-flex align-items-center collapsible toggle collapsed" data-bs-toggle="collapse" data-bs-target="#kt_create_new_payment_method_{{$index+1}}">
                            <!--begin::Arrow-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
																			<rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
																		</svg>
																	</span>
                                <!--end::Svg Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                <span class="svg-icon toggle-off svg-icon-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
																			<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
																			<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
																		</svg>
																	</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Arrow-->

                            <!--begin::Logo-->
                            <img src="{{ asset(theme()->getMediaUrlPath() . 'media/svg/card-logos/'.$paymentMethod->issuer.'.svg') }}" class="w-40px me-3" alt="">
                            <!--end::Logo-->

                            <!--begin::Summary-->
                            <div class="me-3">
                                <div class="d-flex align-items-center fw-bolder">{{ ucfirst($paymentMethod->issuer) }} - {{ $paymentMethod->type === 'credit' ? 'Crédito' : 'Débito' }}</div>
                            </div>
                            <!--end::Summary-->
                        </div>
                        <!--end::Toggle-->

                        <!--begin::Input-->
                        <div class="d-flex my-3 ms-9">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2">
                                <button data-url="{{ route('payment.show', $paymentMethod->uuid)}}" class="open-delete-confirmation-modal btn btn-sm btn-light btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal">{{ __('Apagar') }}</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Input-->

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div id="kt_create_new_payment_method_{{$index+1}}" class="collapse fs-6 ps-10">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-5">
                            <!--begin::Col-->
                            <div class="flex-equal me-5">
                                <table class="table table-flush fw-bold gy-1">
                                    <tbody><tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('Titular') }}</td>
                                        <td class="text-gray-800">{{ $paymentMethod->holder }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('Número') }}</td>
                                        <td class="text-gray-800">{{ $paymentMethod->iin }} ***** {{ $paymentMethod->last_digits }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="flex-equal">
                                <table class="table table-flush fw-bold gy-1">
                                    <tbody>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('Válido até') }}</td>
                                        <td class="text-gray-800">{{ $paymentMethod->expiration }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">{{ __('Tipo') }}</td>
                                        <td class="text-gray-800">{{ $paymentMethod->type === 'credit' ? 'Crédito' : 'Débito' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Body-->
                </div>

                @if(count($paymentMethods) !== $index + 1)
                    <div class="separator separator-dashed"></div>
                @endif

        @endforeach

        </div>
        <!--end::Options-->

    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
