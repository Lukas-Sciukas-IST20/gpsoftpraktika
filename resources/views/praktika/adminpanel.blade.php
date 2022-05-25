<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(Auth::user()->authLygis > 2)
        @if($darbuot->isEmpty())
            <div class="card">
                <div class="card-header mx-auto">
                    <p class="bg-success p-2">Nera darbuotoju kuriem reikia patvirtinimo!</p>
                </div>
            </div>
        @endif
        @foreach($darbuot as $darbuot)
            <div class="card">
                <div class="card-header">
                    {{$darbuot->name}} |
                    {{$darbuot->pavarde}} |
                    {{$darbuot->email}} |
                    {{$darbuot->created_at}}
                    <form method="POST" action="{{route('admin.update',$darbuot->id)}}">
                        @method('PUT')
                        @csrf   
                        <input class="btn btn-success bg-success" type ="submit" value="Patvirtinti">   
                        <input type="radio" value=1 name="authLygis" id="darbuot">
                        <label for="darbuot">Darbuotojas</label>
                        <input type="radio" value=2 name="authLygis" id="admin">
                        <label for="admin">Admin</label>
                        <input type="radio" value=3 name="authLygis" id="Superadmin">
                        <label for="Superadmin">Superadmin</label>   
                    </form>
                    <form action="{{ route('admin.destroy',$darbuot->id) }}" method="POST"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-danger btn-danger">Atmesti</button>
                </form>
                </div>
            </div>
        @endforeach
        <div class="container"><div class="row">
            @foreach($darbvisi as $darbvisi)
            <div class="col-12 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-header mx-auto">
                    {{$darbvisi->name}} | {{$darbvisi->pavarde}} | {{$darbvisi->email}}<br>
                    @if($darbvisi->authLygis == 0)
                    <p class = "bg-danger">Reikia patvirtinimo!</p>
                    @elseif($darbvisi->authLygis == 1)
                    Darbuotojas
                    @elseif($darbvisi->authLygis == 2)
                    Admin
                    @else
                    SuperAdmin
                    @endif
                    <form method="POST" action="{{route('admin.update',$darbvisi->id)}}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" value = 0 name="authLygis">
                        <input type="submit" class="btn btn-danger bg-danger" value="Naikinti teises">
                    </form>
                    
                </div>
            </div>
</div>
            @endforeach
    @endif
</x-app-layout>