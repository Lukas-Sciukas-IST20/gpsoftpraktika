<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="card">
        <div class="mx-auto card-header">
            {{$darbuot->name}} {{$darbuot->pavarde}}<br>
            {{$darbuot->email}}<br>

            @if($darbuot->authLygis == 0)
            <p class="bg-danger">
                Reikia administratoriaus patvirtinimo!
            </p><br>
            @elseif($darbuot->authLygis == 1)
                Darbuotojas<br>
            @elseif($darbuot->authLygis == 2)
                Administratorius<br>
            @elseif($darbuot->authLygis == 3)
                Administratorius<br>
            @endif
        </div>
        <div class="card-footer mx-auto">
            <form method="POST" action="{{route('profilis.update',$darbuot->id)}}">
                @method('PUT')
                @csrf
                <input type="hidden" value=0 name="authLygis">
                <input type="submit" class="btn btn-success bg-success" value="Prašyti teisių pakeitimo">
            </form> 
        </div>
    <div>
</x-app-layout>