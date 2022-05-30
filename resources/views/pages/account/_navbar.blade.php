@php
    $nav = array(
        array('title' => 'Resumo do perfil', 'view' => 'account/overview'),
        array('title' => 'Configurações', 'view' => 'account/settings'),
        array('title' => 'Segurança', 'view' => 'account/security'),
        array('title' => 'Dados bancários', 'view' => 'account/banking'),
        array('title' => 'Métodos de pagamento', 'view' => 'account/payment'),
        array('title' => 'Termos e declarações', 'view' => 'account/policies'),
    );

    $show_stats = true;

    //energy values
    $balanceEnergy = auth()->user()->getBalanceEnergy()/100;

    //crypto values
    $balanceCrypto = auth()->user()->getBalanceCrypto()/100;

    //fiat values
    $balanceFiat = auth()->user()->getBalanceFiat()/100;

    $balances = array('balanceEnergy' => $balanceEnergy, 'balanceCrypto' => $balanceCrypto, 'balanceFiat' => $balanceFiat);

    $balanceEnergy = $balances['balanceEnergy'];
    $balanceCrypto = $balances['balanceCrypto'];
    $balanceFiat = $balances['balanceFiat'];

@endphp

<!--begin::Navbar-->
<div class="card {{ $class }}">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">

                @if(!strpos(auth()->user()->avatar_url, 'blank'))
                    <!--begin: Avatar-->
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="{{ auth()->user()->avatar_url }}" alt="image"/>
                    </div>
                    <!--end: Avatar-->
                    @else
                    <!--begin: InitialsAvatar-->
                    <div class="symbol symbol-200px symbol-lg-160px symbol-fixed position-relative d-none d-lg-block    ">
                        <div class="symbol-label fs-2 fw-bold bg-primary text-inverse-primary" style="font-size: 5.5rem !important;">
                            {{ auth()->user()->getUserInitials() }}
                        </div>
                    </div>
                    <!--end: InitialsAvatar-->
                @endif

            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <div class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->name }}</div>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 pe-2">
                            <div class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                {!! theme()->getSvgIcon("icons/duotune/general/gen018.svg", "svg-icon-4 me-1") !!}
                                {{ isset(auth()->user()->info->city) ? auth()->user()->info->city->name . ' - ' . auth()->user()->info->city->state_letter : __('Brasil') }}
                            </div>
                            <div class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                {!! theme()->getSvgIcon("icons/duotune/communication/com011.svg", "svg-icon-4 me-1") !!}
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->

                    <!--begin::Actions-->
                    {{-- <div class="d-flex my-4">
                        <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                            {!! theme()->getSvgIcon("icons/duotune/arrows/arr012.svg", "svg-icon-3 d-none") !!}
                            {{ theme()->getView('partials/general/_button-indicator', array('label' => 'Follow')) }}
                        </a>

                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="Coming soon">Hire Me</a>

                        <!--begin::Menu-->
                        <div class="me-0">
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>
                            {{ theme()->getView('partials/menus/_menu-3') }}
                        </div>
                        <!--end::Menu-->
                    </div> --}}
                    <!--end::Actions-->

                </div>
                <!--end::Title-->


                @if($show_stats)
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack d-none d-lg-block">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    {!! theme()->getSvgIcon("icons/energy.svg", "svg-icon-1 svg-icon-warning me-2") !!}
                                    <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-duration="1" data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-decimal-places="0" data-kt-countup-value="{{ $balanceEnergy }}" data-kt-countup-prefix="">0</div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">kWh</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    {!! theme()->getSvgIcon("icons/crypto.svg", "svg-icon-1 svg-icon-primary me-2") !!}
                                    <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-duration="1"  data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-decimal-places="0" data-kt-countup-value="{{ number_format($balanceCrypto, 0) }}" data-kt-countup-prefix="">0</div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">DEC</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    {!! theme()->getSvgIcon("icons/fiat.svg", "svg-icon-1 svg-icon-success me-2") !!}
                                    <div class="fs-2 fw-bolder" data-kt-countup-duration="1" data-kt-countup="true" data-kt-countup-separator="." data-kt-countup-decimal-separator="," data-kt-countup-prefix="R$ " data-kt-countup-decimal-places="2" data-kt-countup-value="{{ $balanceFiat }}" data-kt-countup-prefix="">0</div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-bold fs-6 text-gray-400">BRL</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->

                </div>
                <!--end::Stats-->
                @endif

            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->

        <!--begin::Navs-->
        <div class="d-flex overflow-auto h-55px mb-2 d-none d-lg-block">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                @foreach($nav as $each)
                <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6 {{ theme()->getPagePath() === $each['view'] ? 'active' : '' }}" href="{{ $each['view'] ? theme()->getPageUrl($each['view']) : '#' }}">
                            {{ $each['title'] }}
                        </a>
                    </li>
                    <!--end::Nav item-->
                @endforeach
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->
