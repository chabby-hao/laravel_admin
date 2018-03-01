{{-- Greeting --}}
@if (! empty($greeting))
<h1>{{ $greeting }}</h1>
@endif

{{-- Intro Lines --}}
@if (! empty($introLines))
@foreach ($introLines as $line)
    {{ $line }}<br/>
@endforeach
@endif

@component('vendor.mail.markdown.message')

@endcomponent