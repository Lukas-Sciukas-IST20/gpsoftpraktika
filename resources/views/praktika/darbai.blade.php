<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(Auth::user()->authLygis >= 1)

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Pradeti darbai</h1>
                @foreach($pradeti as $pradeti)
                    <div class = "p-2 border rounded flex flex-column">
                        <p>{{ $pradeti->created_at}} | {{$pradeti->tel}} | {{$pradeti->email}} | {{$pradetgii->adresas}}</P><br>
                        <p>Pradėta: {{$pradeti->isvykimo_data}}<br>
                        @if($pradeti->atvykimo_data == null)
                        <a class="btn btn-success" href="{{ route('praktika.edit',$pradeti->id,$pradeti->id,$id=$pradeti->id) }}">Peržiūrėti</a>
                        @else()
                        <a class="btn btn-success form-control" href="{{ route('praktika.edit',$pradeti->id,$pradeti->id,$id=$pradeti->id) }}">Baigti</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2>Prisiskirti darbai: </h2>
                @foreach($priskirti as $priskirti)
                        <div class = "p-2 border rounded flex flex-column">
                        <p>{{ $priskirti->created_at}} | {{$priskirti->tel}} | {{$priskirti->email}} | {{$priskirti->adresas}}</P>
                        <a class="btn btn-success" href="{{ route('praktika.edit',$priskirti->id,$priskirti->id,$id=$priskirti->id) }}">Peržiūrėti</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2>Laisvi darbai: </h2>
            <div class = "p-6 border rounded">
                @foreach($darbai as $darbai)
                @if($darbai->darbuotojo_id == null)
                    <div class = "p-2 border rounded flex flex-column">
                        <p>{{ $darbai->created_at}} | {{$darbai->tel}} | {{$darbai->email}} | {{$darbai->adresas}}</P>
                        <a class="btn btn-success" href="{{ route('praktika.edit',$darbai->id,$darbai->id,$id=$darbai->id) }}">Peržiūrėti</a>
                    </div>
                    @endif
                @endforeach
    
            </div>
            
            </div>
        </div>
    </div>
    
    @endif
</x-app-layout>