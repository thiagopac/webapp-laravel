
<!--begin::Modal Title-->
<div class="modal-title-captured">{{ __('Registro de resposta') }}</div>
<!--End::Modal Title-->


<!--begin::Scroll-->
<div class="scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px" style="max-height: 239px;">

    <!--begin::Input group-->
    <div class="row mb-5">

        @if($viewObject->asset === 'crypto' && $viewObject->result !== null)
            <a class="fs-7" target="_blank" href="{{ $binance_explorer_url.'/tx/'.json_decode($viewObject->result)->hash }}">
                <code>{{ $binance_explorer_url.'/tx/'.json_decode($viewObject->result)->hash }}</code>
            </a>
        @endif

        <!--begin::Col-->
        <div class="col-md-12 fv-row">
            <textarea readonly spellcheck="false"  class="form-control mt-5 bg-lighten text-gray-700 font-monospace p-5" rows="9" >{!! stripslashes(json_encode(json_decode($viewObject->result), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) !!}</textarea>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

</div>
<!--end::Scroll-->

<!--begin::Modal Footer Captured-->
<div class="modal-footer-captured">
    <!--begin::Actions-->
    <div class="d-flex flex-center">
        <button data-bs-dismiss="modal" class="btn btn-primary me-3">
            {{ __('Fechar') }}
        </button>
    </div>
    <!--end::Actions-->
</div>
<!--End::Modal Footer Captured-->
