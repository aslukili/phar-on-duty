@props(['pharmacy'])

<div class="cursor-pointer border border-lg border-gray-300 shadow-lg rounded mt-5 lg:mt-0 bg-yellow-50" >
    <div class="flex" >
        <div class="order-2 flex items-center">
            <img
                class=" hidden w-24 h-24 ml-1.5 md:block "
                src="{{asset('images/guard-pharmacy-logo.png')}}"
                alt=""
            />
        </div>

        <div class=" pt-1.5 pl-3 pb-1.5 pr-3 md:pr-0 md:pl-1.5 flex-grow bg-no-repeat bg-cover bg-center" style="background-image:linear-gradient(rgba(255, 246, 222, 0.9), rgba(255, 246, 222, 0.9)), url(https://tanja24.mcdn.ma/static/uploads/2019/06/logsotanja24-300png.png)">
            <h3 class="text-right font-bold text-green-700 text-md xl:text-lg">
                {{$pharmacy->pharmacy->name_ar}}
            </h3>
            <h3 class="font-bold text-green-700 text-md xl:text-lg">
                {{$pharmacy->pharmacy->name_fr}}
            </h3>
            <hr />
            <div class="text-sm mb-1.5 mt-1.5">
                <p class="text-right">
                    {{$pharmacy->pharmacy->address_ar}}
                    <i class="fa-solid fa-location-dot"></i>
                </p>
                <p class="mt-1">
                    <i class="fa-solid fa-location-dot"></i>
                    {{$pharmacy->pharmacy->address_fr}}
                </p>
            </div>
            <hr />
            <div class="flex justify-between items-center text-right mb-1.5 mt-1.5">
                <a href="tel:{{$pharmacy->pharmacy->tel}}" class="order-2 text-sm text-blue-700">
                    {{$pharmacy->pharmacy->tel}}
                    <i class="fa-solid fa-phone-flip"></i>
                </a>
                <button data-modal-toggle="modaldef{{$pharmacy->id}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-sm shadow-green-500/50  rounded-md text-sm px-3 py-1 text-center">المزيد</button>
            </div>
        </div>
        <div class="pb-9">
            <div id="modaldef{{$pharmacy->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b ">
                            <h3 class="text-xl text-green-700 font-semibold text-gray-900 ">
                                {{$pharmacy->pharmacy->name_ar}}
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
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <a href="whatsapp://send?text={{$pharmacy->pharmacy->map_link}}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300  shadow-md shadow-purple-500/50  font-medium rounded-sm text-sm px-1.5 py-1 text-center mr-1.5">أرسل عبر الواتساب</a>
                            <a href="{{$pharmacy->pharmacy->map_link}}" target="_blank" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300  shadow-md shadow-cyan-500/50  font-medium rounded-sm text-sm px-1.5 py-1 text-center mr-1.5">الخريطة</a>
                            <a href="tel:{{$pharmacy->pharmacy->tel}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-md shadow-green-500/50  font-medium rounded-sm text-sm px-1.5 py-1 text-center mr-1.5">اتصل بالصيدلية</a>
                        </div>
                        <div class="flex justify-center">
                            {!! $pharmacy->pharmacy->map_iframe !!}
                            {{--                            <iframe src="{!! $pharmacy->pharmacy->map_iframe !!}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                        </div>
                        <!-- call, map, partager -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
