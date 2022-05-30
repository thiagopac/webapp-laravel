<x-base-layout>
    <div class="col-12">

        <!--begin::Card-->
        <div class="card">

            <!--begin::Card body-->
            <div class="card-body pt-20 pb-20">

                <!--begin::Row-->
                <div class="row">

                    <div class="table-responsive px-10">
                        <table class="table table-row-dashed">
                            <thead>
                            <tr class="text-center sorting text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>Transaction ID</th>
                                <th>Favorecido</th>
                                <th>Tipo</th>
                                <th>Eventos</th>
                                <th>Criado em</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center dtr-control fs-6">
                                <td>
                                    {{ $transaction->uuid }}
                                </td>
                                <td>
                                    {{ $transaction->user ? $transaction->user->first_name.' '.$transaction->user->last_name : '' }}
                                </td>
                                <td>
                                    {{ __($transaction->type) }}
                                </td>
                                <td>
                                    {{ count($transaction->events) }}
                                </td>
                                <td>
                                    {{ $transaction->created_at->format('d M, Y H:i:s') }}
                                </td>
                                <td>
                                    @php
                                        $transaction = $transaction ?? null;
                                        $styles = [
                                            'awaiting-approval' => 'warning',
                                            'ready-to-process'  => 'primary',
                                            'failed'            => 'danger',
                                            'disapproved'       => 'danger',
                                            'processing'        => 'primary',
                                            'completed'         => 'success',
                                        ];
                                        $style = $styles[$transaction->status];

                                        echo '<div class="badge badge-light-'.$style.' fw-bolder">'.__("$transaction->status").'</div>';
                                    @endphp
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive p-10">
                        <table class="table table-row-dashed table-row-gray-200" id="event-manager-table">
                            <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 text-center">
                                <th>{{ __('Event ID') }}</th>
                                <th>{{ __('Movimentação') }}</th>
                                <th>{{ __('Valor') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Ação') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaction->events as $event)
                                <tr class="text-center fs-6">
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
                                    <td>
                                        @if($event->status === 'awaiting-run' || $event->status === 'fail')
                                            <button type="button" name="event-action" value="{{ $event->uuid }}" data-event-button="{{ $event->uuid }}" class="btn btn-sm btn-primary py-1 px-3 event-control-action">
                                                {{ $event->status === 'awaiting-run' ?  __('Processar') : __('Processar novamente') }}
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($transaction->status === 'awaiting-approval')
                        <div class="text-center">
                            <form id="{{$transaction->uuid}}" class="form" novalidate="novalidate" method="POST" action="{{ route('transactions.control', $transaction->uuid) }}">
                                @csrf
                                @method('PUT')
                                <div class="ms-10 d-inline-flex me-4">
                                    <button type="submit" name="control[]" value="disapprove" data-transaction="{{ $transaction->uuid }}" class="btn btn-sm btn-danger transaction-control-action">
                                        {{ __('Reprovar') }}
                                    </button>
                                    <button type="submit" name="control[]" value="approve" data-transaction="{{ $transaction->uuid }}" class="btn btn-sm btn-success ms-4 transaction-control-action">
                                        {{ __('Aprovar') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif


                </div>
                <!--end::Row-->


            </div>
            <!--end::Card body-->

        </div>
        <!--end::Card-->

    </div>
</x-base-layout>
