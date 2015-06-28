@yield('header.before')

<div class="top row">

    <div class="logo eight columns">

        @yield('logo.before')

        @include('page.partials.header.logo')

        @yield('logo.after')

    </div>

    <div class="links four columns right">

        @yield('header.links.before')

        @menu('header.links')

        @yield('header.links.after')

    </div>

</div>

<div class="bottom">

    <nav class="navigation">

        @yield('top.navigation.before')

        @menu('top.navigation')

        @yield('top.navigation.after')

    </nav>

</div>

@yield('header.after')