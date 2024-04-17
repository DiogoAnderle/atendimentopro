@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Atendimento Pro')
            <img src="https://drive.google.com/uc?id=1HywtSW7rEMPvnnrLRHdH6Knqc0UZe29x" class="logo"
                alt="Atendimento Pro Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>