<!--begin::Master Modal-->
<div class="modal fade" id="delete-confirmation-modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal header-->
    <div class="modal-dialog">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header flex-stack">

                <!--begin::Title-->
                <h2 id="modal-title">Atenção</h2>
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
                <div class="text-center" id="delete-confirmation-modal-loader">
                    <span class="spinner-border text-primary"></span>
                </div>
                <!--end::Modal Loader -->

                <!--begin::Dynamic Content -->
                <div id="delete-confirmation-dynamic-content"></div>
                <!--end::Dynamic Content -->

            </div>
            <!--begin::Modal body-->

            <!--begin::Modal footer-->
            <div class="modal-footer">
                <!--begin::Actions-->
                <div class="d-flex">
                    <button data-bs-dismiss="modal" class="btn btn-white me-3">
                        {{ __('Cancelar') }}
                    </button>

                    <button type="button" id="delete-confirmation-modal-submit" name="delete-confirmation-modal-submit" data-kt-element="delete-confirmation-modal-submit" class="btn btn-danger">{{ __('Sim, tenho certeza') }}</button>
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
