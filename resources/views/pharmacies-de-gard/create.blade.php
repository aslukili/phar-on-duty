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
                        <form method="post" action="/pharmacie-de-gard" class="max-w-xl mx-auto px-3.5">
                            @csrf
                            <input type="hidden" name="city_name_fk" value="<?php echo $_GET['city']?>">
                            <div class="relative z-0 w-full mb-6 group">
                                <select name="pharmacy_fk" id="pharmacy_fk" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    @foreach($pharmacies as $pharmacy)
                                        <option value="{{$pharmacy->id}}">{{$pharmacy->name_fr}}</option>
                                    @endforeach
                                </select>
                                <label for="pharmacy_fk" class="peer-focus:font-medium absolute text-lg text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Pharmacy (please choose one)
                                </label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="datetime-local" name="open_time" id="open_time" value="<?php echo date('Y-m-d')?>T20:00" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="open_time" class="peer-focus:font-medium absolute text-lg text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Open time</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="datetime-local" name="close_time" id="open_time" value="<?php echo date('Y-m-d')?>T09:00" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="close_time" class="peer-focus:font-medium absolute text-lg text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Close time</label>
                            </div>
                            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
