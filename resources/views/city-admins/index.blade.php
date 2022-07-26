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
                        <div class="col-span-2">
                            <div class="grid grid-cols-7 gap-1">
{{--                                <form class="flex gap-1 col-span-3">--}}
{{--                                    <select name="city" id="city" class="col-span-2 block p-3 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">--}}
{{--                                        <option disabled selected hidden>filtrer par ville</option>--}}
{{--                                        @foreach($cities as $city)--}}
{{--                                            <option value="{{$city->name}}">{{$city->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">filter</button>--}}
{{--                                </form>--}}
                                <form class="flex col-span-4 gap-1">
                                    <input type="text" name="search" id="search" class="flex-grow col-span-3 block p-3  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?php if (isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Nom ou prenom d'admin" >
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-right">
                            <a href="/city-admins/create" type="button" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Ajouter admin
                            </a>
                        </div>
                    </div>
                    <div class="max-w-full overflow-x-auto px-3 mt-7">
                        @unless(count($cityAdmins) == 0)
                            <table class="mb-5 border-b table-auto w-full m-auto bg-gray-100 text-lg text-left text-gray-900 shadow-lg shadow-b-xl">
                                <thead class="bg-green-100">
                                    <tr>
                                        <th class="border-r p-3">nom et prénom</th>
                                        <th class="border-r p-3">email</th>
                                        <th class="border-r p-3">numéro de téléphone</th>
                                        <th class="border-r p-3">villes assignées</th>
                                        <th class="border-r p-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                @foreach($cityAdmins as $cityAdmin)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="border-r p-2">{{$cityAdmin->full_name}}</td>
                                        <td class="border-r p-2 text-sm lg:text-md">{{$cityAdmin->email}}</td>
                                        <td class="border-r p-2 text-green-700"><a href="tel:{{$cityAdmin->phone}}">{{$cityAdmin->phone}}</a></td>
                                        <td class="border-r p-2 text-green-700">
                                            <span class="p-1.5 bg-sky-900 text-white rounded-lg">Tanger</span>
                                            <span class="p-1.5 bg-sky-900 text-white rounded-lg">Fes</span>
                                            <span class="p-1.5 bg-sky-900 text-white rounded-lg">Casablanca</span>
                                        </td>
                                        <td class="border-r p-2 flex justify-evenly">
                                            <a href="city-admins/{{$cityAdmin->id}}" class="bg-sky-300 rounded px-3 py-1 mr-1" >
                                                view
                                            </a>
                                            <a href="city-admins/{{$cityAdmin->id}}/edit" class="bg-yellow-300 rounded px-3 py-1 mr-1" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form method="POST" onsubmit="return confirm('are you sure?')" action="/city-admins/{{$cityAdmin->id}}">
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
                            {{ $cityAdmins->links() }}
                        @else
                            <p class="text-lg text-red-500">no one found</p>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
