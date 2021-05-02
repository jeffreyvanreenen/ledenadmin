

<tr>
    <td> {{ $user->getValue('Relatiecode') }}</td>
    <td> {{ $user->getValue('Clubcode') }}</td>

    <td>
        {{ $user->getFullName() }}
    </td>
    <td> {{ $user->getValue('Geboortedatum') }}</td>
    <td>{{ $user->getValue('Geslacht') }}</td>
    <td>{{ $user->getValue('Plaats') }}</td>
    <td>
        <a target="_blank" href="{{ route('admin.userdetail', ['id' => $user->id])  }}"> <i class="fas fa-info"></i></a>
    </td>
</tr>
