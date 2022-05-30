<!--begin::Activities drawer-->
<div
	id="kt_activities"
	class="bg-white"

	data-kt-drawer="true"
	data-kt-drawer-name="activities"
	data-kt-drawer-activate="true"
	data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'lg': '900px'}"
    data-kt-drawer-direction="end"
	data-kt-drawer-toggle="#kt_activities_toggle"
	data-kt-drawer-close="#kt_activities_close">

	<div class="card shadow-none">
		<!--begin::Header-->
		<div class="card-header" id="kt_activities_header">
			<h3 class="card-title fw-bolder text-dark">Central de notificações</h3>

			<div class="card-toolbar">
				<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
					{!! theme()->getSvgIcon("icons/duotune/arrows/arr061.svg", "svg-icon-1") !!}
				</button>
			</div>
		</div>
		<!--end::Header-->

		<!--begin::Body-->
		<div class="card-body position-relative mt-n10 mb-n10" id="kt_activities_body">

			<!--begin::Content-->
			<div id="kt_activities_scroll"
				class="position-relative scroll-y me-n10 ms-n10"

				data-kt-scroll="true"
				data-kt-scroll-height="auto"
				data-kt-scroll-wrappers="#kt_activities_body"
				data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
				data-kt-scroll-offset="5px">

				<!--begin::Timeline items-->
				<div class="timeline">
                    @foreach(auth()->user()->notifications->sortByDesc('created_at') as $notification)
                        <div @class(['bg-light' => $notification->unread(), 'opacity-50' => $notification->read(), 'pt-10', 'pb-0', 'notification-row'])>
                            @switch($notification->type)
                                @case("App\Notifications\TransactionUpdatedNotification")
                                    {{ theme()->getView('pages/notification-center/cells/_transaction-cell', array("notification" => $notification)) }}
                                    @break
                                @case("App\Notifications\ExchangeEventUpdatedNotification")
                                    {{ theme()->getView('pages/notification-center/cells/_exchange-event-cell', array("notification" => $notification)) }}
                                    @break
                            @endswitch
                        </div>

                        <div class="separator border-gray-300 mt-0 mb-0"></div>
{{--                        @if(!$loop->last)--}}
{{--                            <div class="separator border-gray-300 mt-0 mb-0"></div>--}}
{{--                        @endif--}}
                    @endforeach

                    @if(count(auth()->user()->notifications) === 0)
                            {{ theme()->getView('pages/notification-center/cells/_empty') }}
                    @endif

				</div>
				<!--end::Timeline items-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Body-->

		<!--begin::Footer-->
		<div class="card-footer py-5 text-center" id="kt_activities_footer">
			<button class="btn btn-bg-white text-primary" id="mark-all">
				{{ __('Marcar tudo como lido') }}
			</button>
		</div>
		<!--end::Footer-->
	</div>
</div>
<!--end::Activities drawer-->
@section('notification')
    <script>

        let notification_counter = $('.notification-counter');

        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('notification.markAsRead') }}", {
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id
                }
            });
        }


        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            console.log('clicou 1')
            request.done(() => {
                $(this).parents('div.notification-row').addClass('bg-white').addClass('opacity-50').removeClass('bg-light');

                let current_count = $(notification_counter).data('value');
                $(notification_counter).html(current_count-1);
                $(notification_counter).data('value',current_count-1);

                if (current_count-1 === 0) $('.notification-badge').remove();
            });
        });
        $('#mark-all').click(function() {
            console.log('clicou todos')
            let request = sendMarkRequest();
            request.done(() => {
                $(notification_counter).data('value',0);
                $('.notification-badge').remove();
                $('div.notification-row').addClass('bg-white').addClass('opacity-50').removeClass('bg-light');
            })
        });
    </script>
@endsection
