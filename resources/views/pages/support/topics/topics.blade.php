<x-base-layout>

{{ theme()->getView('pages/support/_navbar', array('class' => 'mb-5 mb-xl-10')) }}

{{ theme()->getView($page) }}

</x-base-layout>
