@include('themes.default.common.header')
@if(Illuminate\Support\Facades\Session::has('message'))
    <div class="alert alert-block alert-success alert-dismissible" style="color:green">
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')
@include('themes.default.common.footer')

    <script type="text/javascript">
        $(document).ready(function (){
            $('.alert').hide(8000);
        });
    </script>
