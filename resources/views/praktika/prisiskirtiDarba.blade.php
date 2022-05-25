<x-app-layout>
    <x-slot name="header">
    </x-slot>


    <form method="POST" action="{{route('praktika.update', $darbai->id, $darbai->id)}}">
        @csrf
        @method('PUT')
        <div style="width:50%" class="card mx-auto">
            <div class="card-header">
                 <p class="card-title">Email: {{$darbai->email}}</p>
                 <p class="card-title">Telefonas: {{$darbai->tel}}</p>
                 <p class="card-title">Ikelta: {{$darbai->created_at}}</p>
                 @if($darbai->isvykimo_data != null)
                 <p class="card-title">Pradeta: {{$darbai->isvykimo_data}}</p>
                 @endif
                 @if($darbai->atvykimo_data != null)
                 <p class="card-title">Atvykta: {{$darbai->atvykimo_data}}</p>
                 @endif
            </div>
            <div class="card-text card-body">
                {{$darbai->komentaras}}
            </div>
            @if($darbai->darbuotojo_id == null)
            <div>
                <input type="hidden" name="darbuotojo_id" value={{$userid}}>
                <input class="btn btn-success  bg-success form-control" type="submit" value="Prisiskirti">
            </div>
            @elseif($darbai->isvykimo_data == null)
            <div>
                <input type="hidden" name="darbuotojo_id" value={{$userid}}>
                @if($darbai->isvykimo_data == null)
                <input type="hidden" name="isvykimo_data" value="yra">
                @else
                @endif
                <input class="btn btn-success  bg-success form-control" type="submit" value="Pradeti">
            </div>
            @elseif($darbai->atvykimo_data == null)
            <div>
                <input type="hidden" name="darbuotojo_id" value={{$userid}}>
                <input type="hidden" name="atvykimo_data" value="reikia">
                <input class="btn btn-success  bg-success form-control" type="submit" value="Atvykti">
            </div>
            @elseif($darbai->baigimo_data == null)
            <div>
                <input type="hidden" name="darbuotojo_id" value={{$userid}}>
                <input type="hidden" name="baigimo_data" value="reikia">
                <label for="comment">Komentaras apie darba:</label>
                <input type="text" name="darbKoment" class="form-control" id="darbKoment">
                <input class="btn btn-success  bg-success form-control" type="submit" value="Baigti">
            </div>
            @endif
            <a class="btn btn-warning bg-warning" href="{{route('praktika.index')}}">Atgal</a>
        </div>

    </form>
</x-app-layout>