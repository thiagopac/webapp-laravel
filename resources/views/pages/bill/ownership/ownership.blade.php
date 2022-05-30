<x-base-layout>
    <div class="col-12">

        <!--begin::Card-->
        <div class="card">

            <!--begin::Card header-->
            <div class="card-header border-0">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">{{ __('Unidades consumidoras') }}</h3>
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-2 pb-10">

                <!--begin::Row-->
                <div class="row gx-9 gy-6">

                    @foreach($consumerUnits as $consumerUnit)

                        @php
                            $consumerUnit = !empty($consumerUnit) ? $consumerUnit : '';

                            if ($consumerUnit->type === 'residence')
                                $icon = 'bi-house';
                            else if ($consumerUnit->type === 'business')
                                $icon = 'bi-shop';
                            else
                                $icon = 'bi-signpost-split';
                        @endphp

                        <div class="col-xl-6">

                            <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">

                                <div class="d-flex flex-column py-2">
                                    <div class="d-flex align-items-center fs-5 fw-bolder mb-5">
                                        <i class="bi {{ $icon }} fs-2 me-2 text-primary"></i>{{ $consumerUnit->name }}
                                    </div>
                                    <div class="fs-6 fw-bold text-gray-600 align-items-baseline">
                                        <p>UC {{ $consumerUnit->code }}</p>
                                        <p>
                                            {!! $consumerUnit->address.', '.$consumerUnit->number.'<br />'.$consumerUnit->city->name.'/'.$consumerUnit->city->state_letter !!}
                                        </p>
                                    </div>
                                </div>


                                <div class="d-flex align-items-center py-2">
                                    <button data-url="{{ route('ownership.show', $consumerUnit->uuid)}}" class="open-delete-confirmation-modal btn btn-sm btn-light btn-active-light-primary me-3" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal">{{ __('Apagar') }}</button>
                                    <button data-url="{{ route('ownership.edit', $consumerUnit->uuid)}}" class="open-master-modal btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#master-modal">{{ __('Editar') }}</button>
                                </div>

                            </div>

                        </div>
                    @endforeach


                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Notice-->
                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6 bg-light-primary border border-primary border-dashed">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-bold">
                                    <h4 class="text-gray-900 fw-bolder">{{ __('Adicionar nova Unidade consumidora') }}</h4>
                                    <div class="fs-6 text-gray-700 pe-7">{{ __('Todas as Unidades consumidoras cadastradas precisam ser de sua titularidade') }}</div>
                                </div>
                                <!--end::Content-->
                                <!--begin::Action-->
                                <button data-url="{{ route('ownership.create') }}" class="open-master-modal btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#master-modal">{{ __('Cadastrar') }}</button>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Col-->

                </div>
                <!--end::Row-->


            </div>
            <!--end::Card body-->

        </div>
        <!--end::Card-->

    </div>
</x-base-layout>
