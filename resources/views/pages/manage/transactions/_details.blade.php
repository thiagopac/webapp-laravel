{{--<textarea readonly cols="130" rows="10">--}}
{{--    {!! json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}--}}
{{--</textarea>--}}


<style>
    .dtr-details {
        display: block !important;
        text-align: center;
    }
</style>

<div class="table-responsive">
    <table class="table table-row-dashed table-row-gray-200">
        <thead>
        <tr class="fw-bolder fs-6 text-gray-800">
            <th>{{ __('Event ID') }}</th>
            <th>{{ __('Movimentação') }}</th>
            <th>{{ __('Valor') }}</th>
            <th>{{ __('Status') }}</th>
{{--            <th>{{ __('Ação') }}</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($content->events as $event)
            <tr>
                <td style="width: 30%">{{ $event->uuid }}</td>
                <td style="width: 250px ;text-align: center">{{ __($event->movement) }}</td>
                <td>
                    @php
                        $event = $event ?? null;
                        $event->value = match ($event->asset) {
                            'energy' => number_format($event->value/100, 0, ',', '.').' '.'kWh',
                            'crypto' => number_format($event->value/100, 0, ',', '.').' '.'DEC',
                            'fiat' => 'R$'.' '.number_format($event->value/100, 2, ',', '.')
                        };
                    @endphp
                    {{ $event->value }}
                </td>
                <td>
                    @php
                        $event = $event ?? null;
                        $styles = [
                            'canceled' => 'danger',
                            'locked' => 'warning',
                            'fail'     => 'danger',
                            'success'  => 'success',
                            'awaiting-run' => 'primary',
                            'running' => 'primary',
                        ];
                        $style = $styles[$event->status];
                        echo '<button data-url="'.route('transaction.showErrorModal', $event->uuid).'" data-event-badge="'.$event->uuid.'" class="open-master-modal badge badge-light-'.$style.' fw-bolder border-0" data-bs-toggle="modal" data-bs-target="#master-modal">'.__("$event->status").' '.theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-4 svg-icon-".$style).'</button>';
                          //echo '<div class="badge badge-light-'.$style.' fw-bolder" >'.__("$event->status").'</div>'
                    @endphp
                </td>
{{--                <td>--}}
{{--                    @if($event->status === 'awaiting-run' || $event->status === 'fail')--}}
{{--                        <button type="button" name="event-action" value="{{ $event->uuid }}" data-event-button="{{ $event->uuid }}" class="btn btn-sm btn-primary py-1 px-3 event-control-action">--}}
{{--                            {{ $event->status === 'awaiting-run' ?  __('Processar') : __('Processar novamente') }}--}}
{{--                        </button>--}}
{{--                    @endif--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if($content->status === 'awaiting-approval')
    <div>
        <form id="{{$content->uuid}}" class="form" novalidate="novalidate" method="POST" action="{{ route('transactions.control', $content->uuid) }}">
            @csrf
            @method('PUT')
            <div class="ms-10 d-inline-flex me-4">
{{--                <button type="button" name="control[]" value="disapprove" data-transaction="{{ $content->uuid }}" class="btn btn-sm btn-danger transaction-control-action">--}}
                <button type="submit" name="control[]" value="disapprove" data-transaction="{{ $content->uuid }}" class="btn btn-sm btn-danger transaction-control-action">
                    {{ __('Reprovar') }}
                </button>
{{--                <button type="button" name="control[]" value="approve" data-transaction="{{ $content->uuid }}" class="btn btn-sm btn-success ms-4 transaction-control-action">--}}
                <button type="submit" name="control[]" value="approve" data-transaction="{{ $content->uuid }}" class="btn btn-sm btn-success ms-4 transaction-control-action">
                    {{ __('Aprovar') }}
                </button>
            </div>
        </form>
    </div>
@endif
