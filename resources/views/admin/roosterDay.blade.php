
@php
$i = 0;
$roosterUsers = $roosterDay->getUsersPerDate();
@endphp
<tr>
  <td data-sort="{{$roosterDay->date}}">{{ date('d-m-Y', strtotime($roosterDay->date)) }}</td>

            @foreach($roosterUsers as $user)
        @php
            $i++;
        @endphp
    @if($i < 4)
               <td> {{ $user->getUser() }}</td>
        @endif
            @endforeach
    @while($i < 4)
        <td></td>
        @php
            $i++;
        @endphp
    @endwhile
    <td>
        {{ $roosterDay->min_bezetting }}
    </td>
    <td>
            {{ $roosterUsers->count() }}
    </td>
</tr>
