<x-layout :user="$authUser">
    <section class="bg-gray-50 flex-grow">
        <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">
            <div class="bg-gray-800 ">
                <div class=" rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h1 class="font-bold pl-2">{{$title}}</h1>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="container mx-auto flex justify-center">
                    <form  method="post" action="/cities/{{$city->id}}" class="p-6 max-w-md">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Le nom de ville</label>
                            <input type="text" id="name" name="name" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{$city->name}}" placeholder="example: Tanger">
                        </div>
                        <div class="mt-3">
                            <label for="user_id" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                            <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach($users as $user)
                                    <option @if($user->id == $city->user_id)selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center p-1.5 space-x-2 rounded-b">
                            <button data-modal-toggle="defaultModal" type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Modifier</button>
                            <a href="/cities" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
