<x-layout>
    <section class="bg-gray-50 flex-grow">
        <div id="main" class="main-content flex-1 bg-gray-50 pb-24 md:pb-5">
            <div class="bg-gray-800 ">
                <div class=" rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h1 class="font-bold pl-2">{{$title}}</h1>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="container mx-auto">
                    <div class="grid md:grid-cols-3 justify-between items-center mt-3.5">
                        <div class="col-span-2 flex items-center gap-3">
                            <span>filter by:</span>
                            <form class="flex gap-3">
                                <select name="city" id="city" class="block p-3 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($cities as $city)
                                        <option id="{{$city->name}}" value="{{$city->name}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <div class="flex items-center">
                                    <label class="">date ovrir</label>
                                    <input type="date" name="date" id="city" class="block p-3 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <button type="submit" class="text-white bg-green-800 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">filter</button>
                            </form>
{{--                            <form class="">--}}
{{--                                <div class="relative">--}}
{{--                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
{{--                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>--}}
{{--                                    </div>--}}
{{--                                    <input type="text" name="pharmacy_name" id="pharmacy_name" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Cities by name" required>--}}
{{--                                    <button type="submit" class="text-white absolute right-2.5 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                        <div class="text-right">
                            <button type="button" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="defaultModal">
                                Ajouter une pharmacie de gard
                            </button>
                        </div>
{{--                        form for choosing city--}}
                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Ajouter une pharmacie de gard
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>
                                    <form action="/pharmacie-de-gard/create" class="p-6 space-y-6">
                                        <label for="city" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">veuillez choisir une ville</label>
                                        <select name="city" id="city" class="block p-3 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="flex items-center p-1.5 space-x-2 rounded-b">
                                            <button data-modal-toggle="defaultModal" type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">procéder</button>
                                            <div data-modal-toggle="defaultModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Annuler</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full overflow-x-auto px-3 mt-7">
                        @unless(count($pharmacies) == 0)
                            <table class="border-b table-auto w-full m-auto bg-gray-100 text-lg text-left text-gray-900 shadow-lg shadow-b-xl">
                                <thead class="bg-green-100">
                                <tr>
                                    <th class="border-r p-3">Ville</th>
                                    <th class="border-r p-3">Nom de la pharmacie</th>
                                    <th class="border-r p-3">Telephone</th>
                                    <th class="border-r p-3">ouvrir</th>
                                    <th class="border-r p-3">Fermer</th>
                                    <th class="border-r p-3">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-sm">
                                @foreach($pharmacies as $pharmacy)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="border-r p-2">{{$pharmacy->city_name_fk}}</td>
                                        <td class="border-r p-2">{{$pharmacy->pharmacy->name_fr}}</td>
                                        <td class="border-r p-2 text-green-800 font-bold"><a href="tel:{{$pharmacy->pharmacy->tel}}">{{$pharmacy->pharmacy->tel}}</a></td>
                                        <td class="border-r p-2">{{$pharmacy->open_time}}</td>
                                        <td class="border-r p-2">{{$pharmacy->close_time}}</td>
                                        <td class="border-r p-2 flex justify-evenly">
                                            <button class="bg-yellow-300 rounded px-3 py-1 mr-1" onclick="document.location.href='/pharmacies/?search={{$pharmacy->pharmacy->name_fr}}'">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <form method="POST" onsubmit="return confirm('are you sure?')" action="/pharmacie-de-gard/{{$pharmacy->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 rounded px-3 py-1 ml-1" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-lg text-red-500">no pharmacies found</p>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
