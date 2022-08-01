@props(['city'])

<div class="bg-green-300 p-3.5 rounded shadow-lg">
    <h3 class="text-xl font-bold underline">
        <a href="/villes/{{$city->id}}">{{$city->name}}</a>
    </h3>
    <div class="text-lg mb-1.5">
        <p>pharmacies totales</p>
        <span class="font-bold text-xl">{{$city->pharmacies()}}</span>
        <p>admin de la ville:</p>
        @if(isset($city->user->name))
            <span class="font-bold text-xl">
                {{$city->user->name}}
            </span>
        @endif
    </div>
    <div class="flex justify-evenly">
        <button disabled class="bg-sky-300 rounded px-3 py-1 mr-1" >
            view
        </button>
        <a href="cities/{{$city->id}}/edit" class="bg-yellow-300 rounded px-3 py-1 mr-1" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
        <form method="POST" onsubmit="return confirm('are you sure?')" action="/cities/{{$city->id}}">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 rounded px-3 py-1 ml-1" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </div>
</div>
