@if (session('message'))
    <script>
        iziToast.success({
            message: "{{ Session::get('success') }}",
            position: "topRight"
        });
    </script>
@endif

@if (session('info'))
    <script>
        iziToast.info({
            message: "{{ Session::get('info') }}",
            position: "topRight"
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        iziToast.success({
            message: "{{ Session::get('success') }}",
            position: "topRight"
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        iziToast.error({
            message: "{{ Session::get('error') }}",
            position: "topRight"
        });
    </script>
@endif
