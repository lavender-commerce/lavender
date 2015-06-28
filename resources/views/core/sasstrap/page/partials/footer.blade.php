@yield('footer.before')

<div class="top">

    @yield('footer.top.before')

    {{-- footer top --}}

    @yield('footer.top.after')

</div>

<div class="bottom row">

    <div class="links eight columns">

        @yield('footer.links.before')

        @menu('footer.links')

        @yield('footer.links.after')

    </div>

    <div class="social four columns">

        @yield('footer.social.before')

        @menu('footer.social')

        @yield('footer.social.after')

    </div>

</div>

@yield('footer.after')