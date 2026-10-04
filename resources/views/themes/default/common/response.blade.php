@php
    $types = ['success', 'error', 'info', 'warning'];
@endphp

@if(session()->has('message'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            @foreach($types as $type)

                {{-- OLD FORMAT: success => true + message --}}
                @if(session($type) === true && session()->has('message'))
                    toastr.{{ $type }}(@json(session('message')));
                @endif

                {{-- NEW FORMAT: success => "message" --}}
                @if(session()->has($type) && session($type) !== true)
                    toastr.{{ $type }}(@json(session($type)));
                @endif

            @endforeach

        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($errors->all() as $error)
                toastr.error(@json($error));
            @endforeach
        });
    </script>
@endif
