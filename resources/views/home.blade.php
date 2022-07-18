

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
{{--        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />--}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Pharmacies de gard | Tanger ville</title>
    </head>
<body>
    <main>
        @include('partials._hero')
        <section class="container mx-auto mt-7 md:mt-16 lg:mt-24" id="gard-pharmacies">
            <div class="max-w-md mx-4">
                <form class="">
                    <div class="flex gap-3">
                        <select name="city" id="city_name" placehoder="lksj" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            <option disabled selected hidden>Sélectionnez une ville</option>
                            @foreach($cities as $city)
                                <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Trouver</button>
                    </div>
                </form>
            </div>
            <div class="mt-7 bg-white lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 mb-8">
                @unless(count($pharmacies) == 0)
                    @foreach($pharmacies as $pharmacy)
                        @if(strtotime($pharmacy->close_time) > time() && time() > (strtotime($pharmacy->close_time) - (60*60*24)))
                            <x-pharmacy-card :pharmacy="$pharmacy"/>

                        @endif
                    @endforeach
                @else
                    <p class="text-lg text-red-500">Les pharmacies de garde d'aujourd'hui n'ont pas encore été publiées, veuillez visiter le site après midi</p>
                @endunless
            </div>

        </section>
    </main>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>
