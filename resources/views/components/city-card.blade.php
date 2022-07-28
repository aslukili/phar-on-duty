@props(['city'])

<div class="bg-green-300 p-3.5 rounded shadow-lg">
    <h3 class="text-xl font-bold underline">
        <a href="/villes/{{$city->id}}">{{$city->name}}</a>
    </h3>
    <div class="text-lg mb-1.5">
        <p>pharmacies totales</p>
        <span class="font-bold text-xl">{{$city->pharmacies()}}</span>
        <p>admin de la ville:</p>
        <span class="font-bold text-xl">
            @if(isset($city->user->name))
                {{$city->user->name}}
            @endif
        </span>
    </div>
</div>
