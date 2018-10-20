<div style="text-align: center; margin: 0 auto; position: relative; display: block;">
    <a href="{{ route('frontend.home') }}" target="_blank" title="BAKD.me">
        <img src="{{ asset('images/branding/logo-short-2.png') }}" width="200" style="max-width: 200px; width: 100%; height: auto;" />
    </a>
</div>
<br />
<div>
    <p>
        <strong>Name</strong>
        <br />
        {{ $emailData['name'] }}
    </p>
    <p>
        <strong>Email</strong>
        <br />
        {{ $emailData['email'] }}
    </p>
    <p>
        <strong>Message</strong>
        <br />
        {{ $emailData['message'] }}
    </p>
    <br />
    <p style="font-style: italic;">
        Submitted on  {{ $dateTime }}.
    </p>
</div>
    