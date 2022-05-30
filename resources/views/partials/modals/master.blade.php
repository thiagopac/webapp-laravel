<!--begin::Master Modal-->
<div class="modal fade" id="master-modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal header-->
    <div class="modal-dialog modal-dialog-centered mw-550px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header flex-stack">

                <!--begin::Title-->
                <h2 id="master-modal-title">Informe os dados</h2>
                <!--end::Title-->

                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    {!! theme()->getSvgIcon("icons/duotune/arrows/arr061.svg", "svg-icon-1") !!}
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-lg-10">

                <!--begin::Modal Loader -->
                <div class="text-center" id="master-modal-loader">
                    <span class="spinner-border text-primary"></span>
                </div>
                <!--end::Modal Loader -->

                <!--begin::Dynamic Content -->
                <div id="master-dynamic-content"></div>
                <!--end::Dynamic Content -->

            </div>
            <!--begin::Modal body-->

            <!--begin::Modal footer-->
            <div id="master-modal-footer" class="modal-footer">
                <!--begin::Actions-->
                <div class="d-flex flex-center">
                    <button data-bs-dismiss="modal" class="btn btn-white me-3">
                        {{ __('Cancelar') }}
                    </button>

                    <button type="submit" id="master-modal-submit" name="master-modal-submit" data-kt-element="master-modal-submit" class="btn btn-primary">
                        @include('partials.general._button-indicator')
                    </button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Modal footer-->

        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal header-->
</div>
<!--end::Master Modal -->
