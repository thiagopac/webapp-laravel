<x-base-layout>

{{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10')) }}

{{ theme()->getView('pages/account/policies/_details', array('class' => 'mb-5 mb-xl-10')) }}

@if(false)
<!--begin::Row-->
    <div class="row gy-10 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            {{ theme()->getView('partials/widgets/charts/_widget-2', array('class' => 'card-xxl-stretch mb-5 mb-xl-10')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            {{ theme()->getView('partials/widgets/tables/_widget-1', array('class' => 'card-xxl-stretch mb-5 mb-xl-10')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-10 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            {{ theme()->getView('partials/widgets/lists/_widget-5', array('class' => 'card-xxl-stretch mb-5 mb-xl-10')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6">
            {{ theme()->getView('partials/widgets/tables/_widget-5', array('class' => 'card-xxl-stretch mb-5 mb-xl-10')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

@endif

</x-base-layout>
