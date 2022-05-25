<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(Auth::user()->authLygis > 1)
        <form method="POST" style="width: 50%" class="mx-auto" action="{{route('praktika.store') }}">
            @csrf

            <div class="form-group">
            <label for="1">Telefonas</label>
                <input class="form-control" type="tel" name="tel" id="1">
            <div>
            <div class="form-group">
                <label for="2">Email</label>
                <input class="form-control" type="email" name="email" id="2">

            </div>
            <div class="form-group">
                <label for="3">Adresas</label>
                <input class="form-control" type="text" name="adresas" id="3">

            </div>
            <div class="form-group">
                <label for="4">Komentaras</label>
                <input class="form-control" type="text" name="komentaras" id="4">

            </div>
                <a href="{{ route('praktika.index') }}" class="form-control my-2 btn btn-warning bg-warning">Atgal</a>
                <input type="submit" class="btn my-2 btn-success form-control bg-success  " value="Ikelti">

            </div>
        </form>
    @endif
</x-app-layout>