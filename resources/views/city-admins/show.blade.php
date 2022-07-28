<x-layout :user="$user">
    <section class="bg-gray-50 flex-grow">
        <div id="main" class="main-content flex-1 bg-gray-50 pb-24 md:pb-5">
            <div class="bg-gray-800 ">
                <div class=" rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h1 class="font-bold pl-2">{{$title}}</h1>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="container mx-auto">
                    <div class=" px-3 mt-7">
                        <div class="w-100 flex justify-center">
                            <div class="container lg:w-2/6 xl:w-2/7 sm:w-full md:w-2/3    bg-white  shadow-lg    transform   duration-200 easy-in-out">
                                <div class=" h-32 overflow-hidden" >
                                    <img class="w-full" src="https://i2.cdn.turner.com/cnnnext/dam/assets/150820163747-profile-background-stock---no-photo-full-169.jpg" alt="" />
                                </div>
                                <div class="flex justify-center px-5  -mt-12">
                                    <img class="h-32 w-32 bg-white p-2 rounded-full   " src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" />
                                </div>
                                <div class=" ">
                                    <div class="text-center px-14">
                                        <h2 class="text-gray-800 text-3xl font-bold">{{$cityAdmin->full_name}}</h2>
                                        <p class="hover:text-gray-400 mt-2 text-blue-500">{{$cityAdmin->email}}</p>
                                        <div class="mt-3 text-left ">
                                            <h2 class="text-lg font-bold">assigned cities:</h2>
                                            <p class="mt-2 text-gray-800">Tanger, Tetouan, Larache</p>
                                        </div>
                                    </div>
                                    <hr class="mt-6" />
                                    <div class="flex  bg-gray-50 ">
                                        <div class="bg-yellow-700 text-center w-1/2 p-4 hover:bg-yellow-500 cursor-pointer">
                                            <a href="/city-admins/{{$cityAdmin->id}}/edit" class="text-white">Éditer</a>
                                        </div>
                                        <div class="border"></div>
                                        <form method="POST" class="bg-red-700 text-center w-1/2 p-4 hover:bg-red-500 cursor-pointer" onsubmit="return confirm('are you sure?')" action="/city-admins/{{$cityAdmin->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white">
                                                supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
