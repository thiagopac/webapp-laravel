@php
    $toolbarButtonMarginClass = "ms-1 ms-lg-3";
    $toolbarButtonHeightClass = "btn-custom w-30px h-30px w-md-50px h-md-50px";
    $toolbarUserAvatarHeightClass = "symbol-30px symbol-md-40px";
    $toolbarButtonIconSizeClass = "svg-icon-2x";

    //keep template flexibility
    $show_activity = count(auth()->user()->roles) > 0;
    $show_quick_links = false;
    $show_notifications = false;
@endphp

<!--begin::Toolbar wrapper-->
<div class="topbar d-flex align-items-stretch flex-shrink-0">

    @if($show_activity)
        <!--begin::Activities-->
        <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}">
            <!--begin::Drawer toggle-->
            <div class="btn btn-icon btn-active-light-primary {{ $toolbarButtonHeightClass }} pulse pulse-white" id="kt_activities_toggle">

                {!! theme()->getSvgIcon("icons/duotune/general/gen007.svg", $toolbarButtonIconSizeClass) !!}

                @if(count(auth()->user()->unreadNotifications) > 0)
                    <span class="pulse-ring"></span>
                @endif
            </div>
            <!--end::Drawer toggle-->
            @if(count(auth()->user()->unreadNotifications) > 0)
                <span class="badge badge-circle bg-danger position-absolute ms-8 mb-5 w-20px h-20px notification-badge">
                    <div class="notification-counter" data-value="{{ count(auth()->user()->unreadNotifications) }}">{{ count(auth()->user()->unreadNotifications) }}</div>
                </span>
            @endif
        </div>
        <!--end::Activities-->
    @endif

    @if($show_quick_links)
        <!--begin::Quick links-->
        <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}">
            <!--begin::Menu wrapper-->
            <div class="btn btn-icon btn-active-light-primary {{ $toolbarButtonHeightClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                {!! theme()->getSvgIcon("icons/duotune/general/gen025.svg", $toolbarButtonIconSizeClass) !!}
            </div>

        {{ theme()->getView('partials/topbar/_quick-links-menu') }}
        <!--end::Menu wrapper-->
        </div>
        <!--end::Quick links-->
    @endif

    @if($show_notifications)
        <!--begin::Notifications-->
        <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}">
            <!--begin::Menu wrapper-->
            <div class="btn btn-icon btn-active-light-primary position-relative {{ $toolbarButtonHeightClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                {!! theme()->getSvgIcon("icons/duotune/general/gen022.svg", $toolbarButtonIconSizeClass) !!}
            </div>
        {{ theme()->getView('partials/topbar/_notifications-menu') }}
        <!--end::Menu wrapper-->
        </div>
        <!--end::Notifications-->
    @endif

    <!--begin::User-->
    <div class="d-flex align-items-center {{ $toolbarButtonMarginClass }}" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="btn" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                <div class="d-flex btn p-1 bg-white bg-opacity-20 btn-outline btn-outline-white btn-active-dark rounded-pill align-items-center header-username">

                    <div class="symbol symbol-circle symbol-35px">

                        @if(!strpos(auth()->user()->avatar_url, 'blank'))
                            <img class="symbol-label" src="{{ auth()->user()->avatar_url }}" alt="avatar"/>
                        @else
                            <div class="symbol-label fs-4 fw-bold bg-gray-800 text-inverse-primary">
                                {{ auth()->user()->getUserInitials() }}
                            </div>
                        @endif

                    </div>
                    <span class="text-nowrap mx-2">{{ auth()->user()->name }}</span>
                </div>
        </div>

    {{ theme()->getView('partials/topbar/_user-menu') }}
    <!--end::Menu wrapper-->
    </div>
    <!--end::User -->

    <!--begin::Aside mobile toggle-->
    @if (theme()->getOption('layout', 'aside/display') === true)
        <div class="d-flex align-items-center d-lg-none ms-4" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary {{ $toolbarButtonHeightClass }}" id="kt_aside_mobile_toggle">
                {!! theme()->getSvgIcon("icons/duotune/text/txt001.svg", "svg-icon-1") !!}
            </div>
        </div>
    @endif
<!--end::Aside mobile toggle-->
</div>
<!--end::Toolbar wrapper-->

