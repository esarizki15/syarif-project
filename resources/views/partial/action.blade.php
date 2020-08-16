@if ($route == "service")
    @if (Auth::user()->role->id == 1)
    {{-- Admin --}}
        <form method="POST" action="{{ route($route.'.destroy', $data->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <a href="{{ route($route.'.edit', $data->id) }}" class="btn btn-xs btn-primary">Edit</a>
            <button class="btn btn-xs btn-danger">Hapus</button>
        </form>
    @elseif(Auth::user()->role->id == 2)
    {{-- Mekanik --}}
        @php
            $disabled="disabled";
            if($data->mekanik_id == Auth::user()->id && $data->status_id == 1) $disabled = "";
        @endphp
        <a href="{{ route($route.'.done', $data->id) }}" class="btn btn-xs btn-primary {{ $disabled }}">Selesai</a>
    @elseif(Auth::user()->role->id == 3)
    {{-- User Biasa --}}
        @php
            $disabled="disabled";
            if($data->status_id == 2) $disabled = "";
        @endphp
        <a href="#" data-toggle="modal" data-target="#ratingModal-{{ $data->id }}" class="btn btn-xs btn-primary {{ $disabled }}">Nilai</a>
    @endif
@else
<form method="POST" action="{{ route($route.'.destroy', $data->id) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    
    <a href="{{ route($route.'.edit', $data->id) }}" class="btn btn-xs btn-primary">Edit</a>
    <button class="btn btn-xs btn-danger">Hapus</button>
</form>
@endif