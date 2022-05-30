<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Termos e declarações') }}</h3>
        </div>
        <!--end::Card title-->

    </div>
    <!--begin::Card header-->

    <!--begin::Card body-->
    <div class="card-body p-9">

        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">

            <!--begin::Item-->
            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                <!--begin::Icon-->
                <img alt="" class="w-30px me-3" src="{{ asset(theme()->getMediaUrlPath()) }}/svg/files/pdf.svg">
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="ms-1 fw-bold">
                    <!--begin::Desc-->
                    <a href="#" class="fs-6 text-hover-primary fw-bolder">Política de privacidade</a>
                    <!--end::Desc-->
                    <!--begin::Number-->
                    <div class="text-gray-400">{{ __('Última atualização:') }} 10/01/2022</div>
                    <!--end::Number-->
                </div>
                <!--begin::Info-->

            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                <!--begin::Icon-->
                <img alt="" class="w-30px me-3" src="{{ asset(theme()->getMediaUrlPath()) }}/svg/files/pdf.svg">
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="ms-1 fw-bold">
                    <!--begin::Desc-->
                    <a href="#" class="fs-6 text-hover-primary fw-bolder">Termos de uso</a>
                    <!--end::Desc-->
                    <!--begin::Number-->
                    <div class="text-gray-400">{{ __('Última atualização:') }} 05/01/2022</div>
                    <!--end::Number-->
                </div>
                <!--begin::Info-->

            </div>
            <!--end::Item-->

        </div>

    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
