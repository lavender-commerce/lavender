<!DOCTYPE html>
<html>
<head>
    @yield('head')
</head>
<body>
    @yield('body.before')
    <header>
        <div class="container">
            @yield('header.before')
            @yield('header')
            @yield('header.after')
        </div>
    </header>
    <main>
        <div class="container">
            @yield('main.before')
            @yield('main')
            @yield('main.after')
        </div>
    </main>
    <footer>
        <div class="container">
            @yield('footer.before')
            @yield('footer')
            @yield('footer.after')
        </div>
    </footer>
    @yield('body.after')
</body>
</html>