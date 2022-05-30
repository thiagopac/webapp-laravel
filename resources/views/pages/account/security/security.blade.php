<x-base-layout>

    {{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    {{ theme()->getView('pages/account/security/_signin-method', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    <!--begin::2FA Modal -->
    {{ theme()->getView('partials/modals/two-factor-authentication/_main') }}
    <!--end::2FA Modal -->

</x-base-layout>
