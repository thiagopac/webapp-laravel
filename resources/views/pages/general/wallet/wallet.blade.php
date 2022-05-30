<x-base-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-lg-4" id="widget-resume-items">
            <div id="widget-resume-list" class="widget-wrapper">
                {{ theme()->getView('partials/widgets/mixed/_widget-resume-list',
                                    array(
                                          'balanceEnergy' => $balanceEnergy,
                                          'balanceEnergyInFiat' => $balanceEnergyInFiat,
                                          'balanceCrypto' => $balanceCrypto,
                                          'balanceCryptoInFiat' => $balanceCryptoInFiat,
                                          'balanceFiat' => $balanceFiat,
                                          'totalBalanceInFiat' => $totalBalanceInFiat,
                                          'class' => 'card-stretch mb-8'
                                          )
                                    )
                }}
            </div>
            <div id="widget-resume-ratio" class="widget-wrapper d-none">
                {{ theme()->getView('partials/widgets/mixed/_widget-resume-ratio',
                                    array(
                                          'balanceEnergy' => $balanceEnergy,
                                          'balanceEnergyInFiat' => $balanceEnergyInFiat,
                                          'balanceCrypto' => $balanceCrypto,
                                          'balanceCryptoInFiat' => $balanceCryptoInFiat,
                                          'balanceFiat' => $balanceFiat,
                                          'totalBalanceInFiat' => $totalBalanceInFiat,
                                          'class' => 'card-stretch mb-8'
                                          )
                                    )
                }}
            </div>
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <div widget-id="widget-revenue-line">
                {{ theme()->getView('partials/widgets/mixed/_widget-revenue-line', array('class' => 'card-stretch mb-8', 'chartColor' => 'primary', 'chartHeight' => '354px')) }}
            </div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 gx-xl-8">
        <!--begin::Col-->
        <div class="col-lg-12">
            {{ theme()->getView('partials/widgets/lists/_widget-last-transactions', array('transactions' => $transactions, 'class' => 'card-stretch mb-3')) }}
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->

</x-base-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        $(document).on('click', 'a', function (e) {

            if ($(this).attr('href') == '#' && $(this).hasClass('widget-menu-item')) {
                e.preventDefault();

                var widgetDesired = $(`#widget-${$(this).attr('id')}`);
                var widgetTriggers = $(`#widget-${$(this).attr('id')}`).parent().find('div.widget-wrapper');

                $.each(widgetTriggers, function(index, widgetElement) {
                    $(widgetElement).addClass('d-none')
                });

                $(widgetDesired).removeClass('d-none').trigger(`${$(this).attr('reflection-data')}`);
            }
        });

    });
</script>
