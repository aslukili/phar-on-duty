@props(['pharmacy'])

<div class="bg-gray-50 border border-gray-200 rounded mt-5 md:mt-0">
    <div class="flex">
        <img
            class="hidden w-36 mr-6 md:block"
            src="{{asset('images/pharmacy-logo.png')}}"
            alt=""
        />
        <div class="p-5 xl:pl-0">
            <h3 class="font-bold text-md xl:text-lg">
                <a href="/courses/{{$pharmacy->id}}">{{$pharmacy->name_fr}}r</a>
            </h3>
            <div class="text-sm mb-4">{{$pharmacy->address_fr}}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-phone"></i> {{$pharmacy->tel}}
            </div>
        </div>
    </div>
</div>
