@extends('base.base')

@section('content')

    <!--begin::Main-->
    @if (theme()->getOption('layout', 'main/type') === 'blank')
        <div class="d-flex flex-column flex-root">
            {{ $slot }}
        </div>
    @else
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                {{ theme()->getView('layout/header/_base') }}

                @if (theme()->getOption('layout', 'toolbar/display') === true)
					{{ theme()->getView('layout/_toolbar') }}
				@endif

                <!--begin::Container-->
                    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start {{ theme()->printHtmlClasses('content-container', false) }}">
                    @if (theme()->getOption('layout', 'aside/display') === true)
						{{ theme()->getView('layout/aside/_base') }}
					@endif

                    <!--begin::Post-->
                        <div class="content flex-row-fluid" id="kt_content">
                            {{ $slot }}
                        </div>
                        <!--end::Post-->
                    </div>
                    <!--end::Container-->

                    {{ theme()->getView('layout/_footer') }}
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->

        <!--begin::Drawers-->
            {{ theme()->getView('partials/topbar/_activity-drawer') }}
        <!--end::Drawers-->

        <!--begin::Master Modal -->
        {{ theme()->getView('partials/modals/master') }}
        <!--end::Master Modal -->

        <!--begin::Delete Confirmation Modal -->
        {{ theme()->getView('partials/modals/delete-confirmation') }}
        <!--end::Delete Confirmation Modal -->

        <!--begin::MessageToast-->
        @if(Session::has('message'))
            <div class="position-absolute top-0 end-0 p-3 z-index-3">
                <div class="toast show w-300px" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                    <div class="toast-header">
                        <span class="svg-icon svg-icon-2 svg-icon-{!! session('message.status') !!} me-3">
                            {!! theme()->getSvgIcon('demo2/media/icons/duotune/general/gen007.svg', "svg-icon-1x") !!}
                        </span>
                        <strong class="me-auto">{{session('message.title')}}</strong>
{{--                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>--}}
                    </div>
                    <div class="toast-body">
                        {{session('message.text')}}
                    </div>
                </div>
            </div>
        @endif
        <!--end::MessageToast-->

        @if(theme()->getOption('layout', 'scrolltop/display') === true)
            {{ theme()->getView('layout/_scrolltop') }}
        @endif
    @endif
    <!--end::Main-->

@endsection
