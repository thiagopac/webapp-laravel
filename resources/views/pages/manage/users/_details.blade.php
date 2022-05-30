<style>
    .dtr-details {
        display: block !important;
    }
</style>

<div class="table-responsive">
    <table class="table">
        <tr>
            <td class="text-end fw-bolder">{{ __('Endereço da carteira') }}: </td>
            <td class="text-start">
                <a class="fs-6 text-primary text-hover-danger" target="_blank" href="{{ $binance_explorer_url.'/token/'.$smart_contract_address.'?a='.$content->wallet_address }}">
                    {{ $content->wallet_address }}
                </a>
            </td>
        </tr>
    </table>
</div>
