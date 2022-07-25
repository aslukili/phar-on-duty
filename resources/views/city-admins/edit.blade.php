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
                    <div class="mt-7">
                        <form method="post" action="/city-admins/{{$cityAdmin->id}}" class="max-w-xl mx-auto px-3.5 bg-sky-100 p-7 shadow-lg">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 ">nom et prénom</label>
                                <input type="text" id="full_name" name="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{$cityAdmin->full_name}}" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@admin.com" value="{{$cityAdmin->email}}" required>
                            </div>
                            @error('email')
                            <p class="text-red-500 mt-1.5">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">numéro de téléphone</label>
                                <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@admin.com" value="{{$cityAdmin->phone}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Mot de passe </label>
                                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="***********"  required>
                            </div>
                            <p class="text-green-700">L'e-mail et le mot de passe seront utilisés pour connecter cet utilisateur</p>
                            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
