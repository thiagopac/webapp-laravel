<x-base-layout>

{{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10')) }}

{{ theme()->getView('pages/account/banking/_details', array('class' => 'mb-5 mb-xl-10', 'banks' => auth()->user()->banks)) }}

{{--<!--begin::Banking Modal -->--}}
{{--{{ theme()->getView('partials/modals/banking/_main') }}--}}
{{--<!--end::Banking Modal -->--}}

</x-base-layout>
