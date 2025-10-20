    @extends('layouts.admin.app')

    <!-- Volt CSS -->
    @include('layouts.admin.css')
{{-- end css --}}
</head>

<body>
    {{-- start --}}
    @include('layouts.admin.sidebar')
{{-- tar contetnt --}}
       @yield('content')
        {{-- nd contetnt --}}
{{-- tar dootert --}}
        @include('layouts.admin.footer')

{{-- star js --}}

    <!-- Volt JS -->
   @include('layouts.admin.js')
    {{-- end js --}}
</body>

</html>
