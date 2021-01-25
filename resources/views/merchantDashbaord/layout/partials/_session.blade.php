<link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
<script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
@if (session('success'))


        <script>
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: "{{ session('success') }}",
                timeout: 4000,
                killer: true
            }).show();
        </script>


@endif
