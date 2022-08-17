
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
{{--        @include('partials._hero')--}}
        <section class="container mx-auto" id="gard-pharmacies">
            <div class="pr-5 text-right">
                <h1 class=" font-bold text-green-900 text-xl">
                    صيدليات الحراسة بمدينة طنجة
                </h1>
                <p>
                    ليوم
                    <span id="arabicDate"></span>
                </p>
            </div>
            <div class="">
                <div class="grid grid-cols-2">
                    <div onclick="displayNightPharmacies()" id="night" class="bg-gray-300  border-b-4 border-blue-400 cursor-pointer text-center">
                        <p class="text-lg font-bold text-blue-700 hover:underline">ليلا</p>
                    </div>
                    <div onclick="displayDayPharmacies()" id="day" class=" bg-gray-100 border-x-4 border-t-4  border-blue-400  cursor-pointer  text-center">
                        <p class="text-lg font-bold text-blue-700 hover:underline">نهارا</p>
                    </div>
                </div>
                <div id="nightPharmacies" style="display: none" class="border-x-4 border-b-4 border-blue-400 bg-gray-100">
                    <p class="pr-3 text-right ">
                        من 8:30 مساء إلى 9:30 صباحا لليوم الموالي
                    </p>

                    <div   class="mt-5 md:grid md:grid-cols-2 xl:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 mb-8">
                        @unless(count($nightPharmacies) == 0)
                            @foreach($nightPharmacies as $pharmacy)
                                @if(strtotime($pharmacy->close_time) > time() && time() > (strtotime($pharmacy->close_time) - (60*60*24)))
                                    <x-pharmacy-card :pharmacy="$pharmacy"/>
                                @endif
                            @endforeach
                        @else
                            <p class="text-lg text-red-500">Les pharmacies de garde d'aujourd'hui n'ont pas encore été publiées, veuillez visiter le site après midi</p>
                        @endunless
                    </div>
                </div>

                <div id="dayPharmacies"  class="border-x-4 border-b-4 border-blue-400 bg-gray-100">
                    <p class="pr-3 text-right">
                        من <span>

                            <?php
                                if (isset($dayPharmacies[0]->open_time)){
                                    echo date('H:i', strtotime($dayPharmacies[0]->open_time));
                                }
                                ?>
                        </span> إلى
                        <span>
                            <?php
                                if (isset($dayPharmacies[0]->close_time)) {
                                    echo date('H:i', strtotime($dayPharmacies[0]->close_time));
                                }
                                ?>
                        </span>
                    </p>
                    <div   class="mt-5 md:grid md:grid-cols-2 xl:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 mb-8">
                        @unless(count($dayPharmacies) == 0)
                            @foreach($dayPharmacies as $pharmacy)
{{--                                @if(strtotime($pharmacy->close_time) > time() && time() > (strtotime($pharmacy->close_time) - (60*60*24)))--}}
                                    <x-pharmacy-card :pharmacy="$pharmacy"/>
{{--                                @endif--}}
                            @endforeach
                        @else
                            <p class="text-lg text-red-500">Les pharmacies de garde d'aujourd'hui n'ont pas encore été publiées, veuillez visiter le site après midi</p>
                        @endunless
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script>
        let date = new Date();
        let months = ["يناير", "فبراير", "مارس", "أبريل", "ماي", "يونيو",
            "يوليوز", "غشت", "شتنبر", "أكتوبر", "نونبر", "دجنبر"
        ];
        let days = ["اﻷحد", "الإثنين", "الثلاثاء", "اﻷربعاء", "الخميس", "الجمعة", "السبت"];
        let todayArabic = days[date.getDay()] +' '+ date.getDate() + ' ' + months[date.getMonth()]+' '+date.getFullYear()


        document.getElementById("arabicDate").innerHTML = todayArabic;

        //    toggle DAY AND NIGHT
        const night = document.getElementById('nightPharmacies');
        // const nightButton = document.getElementById('night');
        const day = document.getElementById('dayPharmacies');
        // const dayButton = document.getElementById('day');

        function displayDayPharmacies() {
            // TODO
            night.style.display = "none";
            day.style.removeProperty('display');
            document.getElementById("day").classList.remove("bg-gray-300", "border-b-4")
            document.getElementById('day').classList.add("bg-gray-100", "border-x-4", "border-t-4")
            //remove classes from night button
            document.getElementById('night').classList.add("border-b-4", "bg-gray-300")
            document.getElementById('night').classList.remove("bg-gray-100", "border-x-4", "border-t-4")


        }

        function displayNightPharmacies() {
            // TODO
            day.style.display = "none";
            night.style.removeProperty('display')

            document.getElementById("night").classList.remove("bg-gray-300", "border-b-4")
            document.getElementById('night').classList.add("bg-gray-100", "border-x-4", "border-t-4")
            //remove classes from night button
            document.getElementById('day').classList.add("border-b-4", "bg-gray-300")
            document.getElementById('day').classList.remove("bg-gray-100", "border-x-4", "border-t-4")

        }
    </script>
</body>
</html>
