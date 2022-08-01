<x-layout :user="$authUser">
    <section class="bg-gray-50 flex-grow">
        <div id="main" class="main-content flex-1 bg-gray-50 pb-24 md:pb-5">
            <div class="bg-gray-800 ">
                <div class=" rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h1 class="font-bold pl-2">{{$title}}</h1>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="container mx-auto">
                    <div class="mt-7">
                        <form method="post" action="/users" class="max-w-xl mx-auto px-3.5 bg-sky-100 p-7 shadow-lg">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">nom et prénom</label>
                                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="John Doe" required>
                            </div>
                            @error('name')
                            <p class="text-red-500 mt-1.5">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@admin.com" required>
                            </div>
                            @error('email')
                            <p class="text-red-500 mt-1.5">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">numéro de téléphone</label>
                                <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@admin.com" required>
                            </div>
                            @error('phone')
                                <p class="text-red-500 mt-1.5">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Mot de passe</label>
                                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="***********" required>
                            </div>
                            @error('password')
                            <p class="text-red-500 mt-1.5">{{$message}}</p>
                            @enderror
                            <div class="relative z-0 w-full mb-6 group">
                                <select name="pharmacy_fk[]" id="pharmacy_fk" class="chosen-select w-full " multiple>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <label for="pharmacy_fk" class="peer-focus:font-medium absolute text-lg text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                </label>
                            </div>
                            <p class="text-green-700">L'e-mail et le mot de passe seront utilisés pour connecter cet utilisateur</p>
                            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
