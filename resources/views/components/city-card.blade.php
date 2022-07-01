@props(['city'])

<div class="bg-green-300 p-3.5 rounded shadow-lg">
    <h3 class="text-xl font-bold underline">
        <a href="/courses/{{$city->id}}">{{$city->name}}</a>
    </h3>
    <div class="text-lg mb-1.5">
        <p>pharmacies totales</p>
        <span class="font-bold text-xl">35</span>
    </div>
</div>
