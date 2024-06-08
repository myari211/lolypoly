<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-031R8CDN1Y"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-031R8CDN1Y');
    </script>
    @include('lolypoly.head')
</head>

<body>

    <div class="mb-5">
        @include('lolypoly.header')
        <div style="background: white" class="pb-5 mb-5">
            @yield('content')
        </div>
    </div>
    @include('lolypoly.footer')
    <x-loginmodal></x-loginmodal>
    @include('lolypoly.foot')
    @yield('scripts')
    <script>
        $(document).ready(function() {
            $('#modalDaftar').click(function(e) {
                e.preventDefault();
                $('#loginModal').modal('hide');
                $('#registerModal').modal('show');
            });
            $('#modalMasuk').click(function(e) {
                e.preventDefault();
                $('#loginModal').modal('show');
                $('#registerModal').modal('hide');
            });
            $('#modalLupaPassword').click(function(e) {
                e.preventDefault();
                $('#forgotPasswordModal').modal('show');
                $('#loginModal').modal('hide');
            });
        });

        function triggerLoginModal() {
            $('#loginModal').modal('show');
            $('#redirect_to').val('{{route('lolypoly.account')}}')
        }
    </script>
</body>

</html>
