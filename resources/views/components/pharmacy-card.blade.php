@props(['pharmacy'])

<div class="cursor-pointer bg-pink-100 border border-gray-200 rounded mt-5 lg:mt-0" >
    <div class="flex" >
        <img
            class="hidden w-36 mr-6 md:block"
            src="{{asset('images/pharmacy-logo.png')}}"
            alt=""
        />
        <div class="p-5 pt-1.5 xl:pl-0 flex-grow" data-modal-toggle="modaldef{{$pharmacy->id}}">
            <h3 class="font-bold text-md xl:text-lg">
                {{$pharmacy->pharmacy->name_fr}}
            </h3>
            <h3 class="text-right font-bold text-md xl:text-lg">
                {{$pharmacy->pharmacy->name_ar}}
            </h3>
            <hr />
            <div class="text-sm mb-4">
                <p>
                    {{$pharmacy->pharmacy->address_fr}}
                </p>
                <hr />
                <p class="text-right">
                    {{$pharmacy->pharmacy->address_ar}}
                </p>
                <hr />
            </div>
        </div>
        <div class="pb-9">
            <div id="modaldef{{$pharmacy->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b ">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                                {{$pharmacy->pharmacy->name_fr}}
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="modaldef{{$pharmacy->id}}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 grid md:grid-cols-2">
                            <p class="text-gray-700">{{$pharmacy->pharmacy->address_fr}}</p>
                            <p class="text-gray-700 text-right">{{$pharmacy->pharmacy->address_ar}}</p>
                        </div>
                        <div class="flex justify-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9116.336144090137!2d-5.809814931876154!3d35.77353879120224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b80a828cf88f1%3A0xdb1b8caba6311fdc!2sPharmacy%20Sahat%20Aloumam!5e0!3m2!1sen!2sma!4v1657026330083!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- call, map, partager -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <a href="tel:{{$pharmacy->pharmacy->tel}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Appel</a>
                            <a href="{{$pharmacy->pharmacy->map_link}}" target="_blank" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300  shadow-lg shadow-cyan-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cart</a>
                            <a href="whatsapp://send?text={{$pharmacy->pharmacy->map_link}}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300  shadow-lg shadow-purple-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Partager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
