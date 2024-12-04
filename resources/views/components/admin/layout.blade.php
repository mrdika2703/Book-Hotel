<x-admin.header></x-admin.header>
<x-admin.navbar>{{ $title }}
    <x-slot:authhName>{{ $authhName}}</x-slot:authhName>
    <x-slot:authhNim>{{ $authhNim }}</x-slot:authhNim>
</x-admin.navbar>
<x-admin.sidebar>{{ $title }}</x-admin.sidebar>

{{ $slot }}

<x-admin.sidebar-content></x-admin>
<x-admin.footer></x-admin.footer>
<x-admin.side-script></x-admin.side-script>