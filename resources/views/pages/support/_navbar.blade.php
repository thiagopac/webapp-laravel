@php
    $nav = array(
        array('title' => 'Central de ajuda', 'view' => 'support/topics'),
        array('title' => 'Tutoriais', 'view' => 'support/tutorials'),
        array('title' => 'Perguntas frequentes', 'view' => 'support/faq'),
        array('title' => 'Custos e taxas', 'view' => 'support/fees'),
        array('title' => 'Fale conosco', 'view' => 'support/contact'),
    );

    $show_stats = false;
@endphp

<!--begin::Search-->
<div class="d-flex flex-column h-300px h-lg-275px">
    <!--begin::Container-->
    <div class="container pt-0">

        <!--begin::Title-->
        <h3 class="fs-2x fw-bolder text-white text-center mb-7">Como podemos te ajudar?</h3>
        <!--end::Title-->

        <!--begin::Input group-->
        <div class="position-relative w-100 mw-600px mx-auto" style="background: rgba(255, 255, 255, 0.05);">

            <!--begin::Svg Icon-->
            {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen021.svg', "svg-icon svg-icon-2qx svg-icon-white position-absolute top-50 translate-middle ms-9") !!}
            <!--end::Svg Icon-->

            <input type="text" class="form-control bg-transparent fs-2 py-6 ps-17 placeholder-white opacity-50" style="border: 1px solid rgba(255, 255, 255, 0.24);" name="search" value="" placeholder="Pesquise por termos">
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Container-->
</div>
<!--end::Search-->

<!--begin::Navbar-->
    <!--begin::Card-->
    <div class="card translate-middle-y mt-n20">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Nav-->
            <ul class="nav mx-auto flex-shrink-0 flex-center flex-wrap border-transparent fs-6 fw-bolder">


            @foreach($nav as $each)
                <!--begin::Nav item-->

                    <li class="nav-item my-3">
                        <a
                            class="btn btn-active-light-primary fw-boldest nav-link btn-color-gray-700 px-3 px-lg-8 mx-1 text-uppercase {{ theme()->getPagePath() === $each['view'] ? 'active' : '' }}"
                            href="{{ $each['view'] ? theme()->getPageUrl($each['view']) : '#' }}">
                            {{ $each['title'] }}
                        </a>
                    </li>

                    <!--end::Nav item-->
                @endforeach

            </ul>
            <!--end::Nav-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
<!--end::Navbar-->
