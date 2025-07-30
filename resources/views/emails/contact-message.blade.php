<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ __('strings.contact') }}</title>
</head>
<body style="font-family: sans-serif; line-height: 1.4; color: #1f2937;">
    <h1>{{ __('strings.contact') }}</h1>
    <p>
        {{ __('strings.name') }}: {{ $name }}<br />
        {{ __('strings.email') }}: {{ $email }}
    </p>
    <p>{{ __('strings.message') }}:</p>
    <p>{{ $messageContent }}</p>
</body>
</html>