@component('mail::message')

#Hello 

{{$keyvalue}}
# Introduction

The body of your message.

@component('mail::button', ['url' => $keyvalue])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
