@php
    $show_theme_switch = false
@endphp

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">

            @if(!strpos(auth()->user()->avatar_url, 'blank'))
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="{{ auth()->user()->avatar_url }}"/>
            </div>
            <!--end::Avatar-->
            @else
            <!--begin: InitialsAvatar-->
            <div class="symbol symbol-50px me-5">
                <div class="symbol-label fs-2 fw-bold bg-primary text-inverse-primary">
                    {{ auth()->user()->getUserInitials() }}
                </div>
            </div>
            <!--end: InitialsAvatar-->
            @endif

            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bolder d-flex align-items-center fs-5">
                    {{ auth()->user()->name }}
                </div>
                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('overview.index') }}" class="menu-link px-5">
            {{ __('Resumo do perfil') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('settings.index') }}" class="menu-link px-5">
            {{ __('Configurações') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('security.index') }}" class="menu-link px-5">
            {{ __('Segurança') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('banking.index') }}" class="menu-link px-5">
            {{ __('Dados bancários') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('payment.index') }}" class="menu-link px-5">
            {{ __('Métodos de pagamento') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ theme()->getPageUrl('policies.index') }}" class="menu-link px-5">
            {{ __('Termos e declarações') }}
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" data-action="{{ theme()->getPageUrl('logout') }}" data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true" class="button-ajax menu-link px-5">
            {{ __('Sair') }}
        </a>
    </div>
    <!--end::Menu item-->

    @if (theme()->isDarkModeEnabled() && $show_theme_switch)
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <div class="menu-content px-5">
                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="skin" id="kt_user_menu_dark_mode_toggle" {{ theme()->isDarkMode() ? 'checked' : '' }} data-kt-url="{{ theme()->getPageUrl('', '', theme()->isDarkMode() ? '' : 'dark') }}"/>
                    <span class="pulse-ring ms-n1"></span>

                    <span class="form-check-label text-gray-600 fs-7">
                        {{ __('Dark Mode') }}
                    </span>
                </label>
            </div>
        </div>
        <!--end::Menu item-->
    @endif
</div>
<!--end::Menu-->
