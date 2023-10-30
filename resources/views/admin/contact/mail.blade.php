<x-mail::message>
#### مرحباً {{ $userName }}
# بخصوص طلبكم رقم {{ $messageID }}
{{-- ## {{ $title }} --}}
{{ $message }}
___
<div style="font-size: 30px;color: rgba(198, 150, 37)">
{{ $reply }}
</div>

شكرا,<br>
{{ config('app.name') }}
</x-mail::message>
