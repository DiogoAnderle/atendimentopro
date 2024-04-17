@component('mail::message')
# Introdução

O Corpo da Mensagem.

<x-mail::button :url="''">
    Texto do botão
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
@endcomponent