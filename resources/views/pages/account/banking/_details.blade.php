<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Contas cadastradas') }}</h3>
        </div>
        <!--end::Card title-->

    </div>
    <!--begin::Card header-->

    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Addresses-->
        <div class="row gx-9 gy-6">

            @foreach($banks as $index => $bank)

                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2">
                            <div class="d-flex align-items-center fs-5 fw-bolder mb-5">{{ __('Conta bancária') }} {{ $index + 1 }}
{{--                                <span class="badge badge-light-success fs-7 ms-2">Padrão</span>--}}
                            </div>
                            <div class="fs-6 fw-bold text-gray-600">

                                <strong>{{ $bank->code ? collect(\App\Core\Data::getBankList())->get($bank->code)['name'] : '-' }}</strong><p></p>
                                {{ __('Agência') }}: {{ $bank->branch }}<br>
                                {{ __('Conta') }}: {{ $bank->account }}<br>
                            </div>
                        </div>
                        <!--end::Details-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button data-url="{{ route('banking.show', $bank->uuid)}}" class="open-delete-confirmation-modal btn btn-sm btn-light btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal">{{ __('Apagar') }}</button>
                            <button data-url="{{ route('banking.edit', $bank->uuid)}}" class="open-master-modal btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#master-modal">{{ __('Editar') }}</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->

            @endforeach


            <!--begin::Col-->
            <div class="col-xl-6">
                <!--begin::Notice-->
                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6 bg-light-primary border border-primary border-dashed">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-bold">
                            <h4 class="text-gray-900 fw-bolder">{{ __('Adicionar nova conta') }}</h4>
                            <div class="fs-6 text-gray-700 pe-7">{{ __('Todas as contas bancárias cadastradas precisam ser de sua titularidade') }}</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <button data-url="{{ route('banking.create')}}" class="open-master-modal btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#master-modal">{{ __('Cadastrar') }}</button>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Addresses-->

    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
