<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li>
                    <a data-toggle="tooltip" data-title="About Us" href="{{ route('frontend.about') }}">
                            <i class="fa fa-users"></i> {{ __('About') }}
                        </a>
                </li>
                <li>
                    <a data-toggle="tooltip" data-title="Terms & Conditions" href="{{ route('frontend.terms') }}">
                        <i class="fa fa-file-text"></i> {{ __('Terms') }}
                    </a>
                </li>
                <li>
                    <a data-toggle="tooltip" data-title="Privacy Policy" href="{{ route('frontend.privacy') }}">
                        <i class="fa fa-cubes"></i> {{ __('Privacy') }}
                    </a>
                </li>
                <li>
                    <a class="ask-question" data-toggle="tooltip" data-title="Contact Us" href="{{ route('frontend.contact') }}">
                        <i class="fa fa-envelope"></i> {{ __('Contact') }}
                    </a>
                </li>
            </ul>
            <p><img src="{{ asset('images/copy-icon2.png') }}" data-toggle="tooltip" alt="Copyright &copy; {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}" data-placement="right" data-title="Copyright &copy; {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}">Copyright {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}</p>
            <a href="{{ route('frontend.home') }}">
                <img class="fl-rgt bakd-logo" src="{{ config('bakd.logo.regular') }}" alt="{{ config('bakd.logo.alt') }}" title="{{ config('bakd.logo.alt') }}" data-toggle="tooltip" data-title="{{ config('bakd.logo.alt', '') }}">
            </a>
        </div>
    </div>
</footer>
