<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('frontend.home') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.terms') }}">
                        {{ __('Terms & Conditions') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.privacy') }}">
                        {{ __('Privacy Policy') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}">
                        {{ __('Contact Us') }}
                    </a>
                </li>
            </ul>
            <p><img src="{{ asset('images/copy-icon2.png') }}" alt="Copyright" title="Copyright">Copyright {{ \Carbon\Carbon::now()->format('Y') }}</p>
            <img class="fl-rgt bakd-logo" src="{{ asset('images/branding/logo.png') }}" alt="BAKD" title="BAKD">
        </div>
    </div>
</footer>
