@component('vendor.mail.markdown.message')
    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}

    @endforeach

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}
    @endforeach

    {{-- Salutation --}}
    {{--@if (! empty($salutation))--}}
    {{--{{ $salutation }}--}}
    {{--@else--}}
    {{--Regards,<br>{{ config('app.name') }}--}}
    {{--@endif--}}

    {{--@component('mail::subcopy')--}}
        {{--If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below--}}
        {{--into your web browser:--}}
    {{--@endcomponent--}}

@endcomponent