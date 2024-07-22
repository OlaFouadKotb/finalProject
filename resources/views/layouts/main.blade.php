<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.headSite')
</head>
<body>
    <div class="tm-container">
        <div class="tm-row">
            @include('includes.sidebar')
            <div class="tm-right">
                <main class="tm-main">
                    @yield('content')
                </main>
            </div>    
        </div>
        @include('includes.footer')
    </div>
    
    @include('includes.video')
    <script src="{{ asset('assets/js/nav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
