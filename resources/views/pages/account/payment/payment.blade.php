<x-base-layout>

{{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10')) }}

{{ theme()->getView('pages/account/payment/_details', array('class' => 'mb-5 mb-xl-10', 'paymentMethods' => auth()->user()->paymentMethods)) }}

</x-base-layout>
