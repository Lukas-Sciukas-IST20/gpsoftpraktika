<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="d-flex justify-content-center">
    <form method="POST" action ="{{route('filtataskaita.index')}}">
            @method("GET")
            @csrf
            <select name="darbuotojo_id">
            @foreach($darbuotojai as $darbuotojai)
            <option value={{$darbuotojai->id}}>{{$darbuotojai->name}}</option>
            @endforeach
            </select>
            <input type="date" name="datastart">
            <input type="date" name="dataend">
            <input class="btn btn-success bg-success" type="submit" value="filtruoti">
        </form>
</div>
        <div class="container">
            <div class="row">
                @foreach($darbai as $darbai)
                <div class="col-12 col-md-6  col-lg-4">
                    <div class="card my-2">
                        <div class="card-header">
                            {{$darbai->tel}} | {{$darbai->email}} <br> Atliko: {{$darbai->name}} {{$darbai->pavarde}} 
                        </div>
                        <div class="card-body">
                            Paskelbta : {{$darbai->created_at}}<br> 
                            Pradeta : {{$darbai->isvykimo_data}} <br>
                            Baigta : {{$darbai->baigimo_data}} <br>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">{{$darbai->komentaras}}</p><br>
                            <hr>
                            <p class="card-text">{{$darbai->darbKoment}}</p><br>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-app-layout>