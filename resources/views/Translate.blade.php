<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/translate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cutomfontsize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontTheme.css') }}">
    <title>{{ \Stichoza\GoogleTranslate\GoogleTranslate::trans('Document', app()->getLocale()) }}</title>
</head>

<body>
    <div class="container">

        <h1 class="color">
            {{ \Stichoza\GoogleTranslate\GoogleTranslate::trans('How to Create Multi Language Website in Laravel', app()->getLocale()) }}
        </h1>

        @php
            $locales = [
                'en' => 'English',
                'fr' => 'French',
                'sp' => 'Spanish',
                'km' => 'Khmer',
                'ja' => 'Japanese',
                'ko' => 'Korean',
                'th' => 'Thai',
                'lo' => 'Lao',
                'vi' => 'Vietnamese',
                'zh' => 'Chinese',
                'ru' => 'Russian',
                'uk' => 'Ukrainian',
                'id' => 'Indonesian',
                'ar' => 'Arabic',
            ];

            $fontsize = [
                'df' => 'Default',
                'sm' => 'small',
                'md' => 'medium',
                'lg' => 'hight',
                'xl' => 'large',
            ];
            $fontfamily = [
                'defult' => 'Default',
                'times' => 'Times Serif',
                'courier' => 'Curier New',
            ];
        @endphp

        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong class="color">{{ \Stichoza\GoogleTranslate\GoogleTranslate::trans('Select Language ', app()->getLocale())}}:</strong>
            </div>
            <div class="col-md-4">
                <select class="form-control changeLang" id="color">
                    @foreach ($locales as $locale => $language)
                        <option value="{{ $locale }}" {{ Cookie::get('locale') == $locale ? 'selected' : '' }}>
                            {{ $language }}
                        </option>
                    @endforeach
                </select>
                <strong>{{ \Stichoza\GoogleTranslate\GoogleTranslate::trans('Font size ', app()->getLocale())}}:</strong>
                <select class="form-control fontsize">
                    @foreach ($fontsize as $sz => $s)
                        <option value="{{ $sz }}" {{ Cookie::get('font') == $sz ? 'selected' : '' }}>
                            {{ $s }}
                        </option>
                    @endforeach
                </select>
                <strong class="color">{{ \Stichoza\GoogleTranslate\GoogleTranslate::trans("Font Family", app()->getLocale())}}:</strong>
                <select class="form-control fonttheme">
                    @foreach ($fontfamily as $family => $ff)
                        <option value="{{ $family }}"
                            {{ Cookie::get('family') == $family ? 'selected' : '' }}>
                            {{ $ff }}
                        </option>
                    @endforeach
                </select>
                <div class="group-form mb-3">
                    <strong class="color">{{ \Stichoza\GoogleTranslate\GoogleTranslate::trans("Color", app()->getLocale())}}:</strong>
                    <input type="color" class="form-control" id="colorPicker">
                </div>
            </div>
        </div>
    </div>

    <h1 class="title cm-fs-t-{{ $size }} font-f-{{ $fonttheme }} color">
        {{ \Stichoza\GoogleTranslate\GoogleTranslate::trans('Cambodia', app()->getLocale()) }}</h1>
    <p class="text cm-fs-p-{{ $size }} font-f-{{ $fonttheme }} color">
        {{ \Stichoza\GoogleTranslate\GoogleTranslate::trans(
            "
                Certainly! Cambodia is a country located in Southeast Asia, bordered by Thailand to the west and northwest, Laos to the north, Vietnam to the east and southeast, and the Gulf of Thailand to the southwest. Here are some key points about Cambodia:
                1. Capital and Major Cities: The capital city of Cambodia is Phnom Penh, which is also the largest city in the country. Other major cities include Siem Reap, Battambang, and Sihanoukville.
                2. Population: As of my last update in January 2022, Cambodia has a population of over 16 million people. The population is primarily composed of ethnic Khmer, with smaller populations of Cham, Chinese, Vietnamese, and other ethnic groups.
                3. Language: Khmer is the official language of Cambodia and is spoken by the majority of the population. English and French are also commonly spoken, especially in urban areas and among the educated population.
                4. Religion: The predominant religion in Cambodia is Theravada Buddhism, which is practiced by over 95% of the population. There are also small Muslim and Christian minority communities.
                5. History: Cambodia has a rich and complex history, with the ancient Khmer Empire being one of the most powerful and influential civilizations in Southeast Asia. The iconic Angkor Wat temple complex, located near Siem Reap, is a UNESCO World Heritage Site and a symbol of Cambodia's cultural heritage. In more recent history, Cambodia endured the brutal Khmer Rouge regime under Pol Pot from 1975 to 1979, during which millions of Cambodians were killed or died from starvation and forced labor.
                6. Economy: Cambodia's economy is primarily based on agriculture, tourism, and manufacturing. The country has experienced rapid economic growth in recent years, driven in part by garment exports, tourism, and foreign investment.
                7. Culture: Cambodian culture is influenced by its rich history, religion, and traditions. Traditional dance and music, such as the classical Khmer dance and the Pinpeat orchestra, are important cultural expressions. The Cambodian cuisine is known for its use of aromatic herbs and spices, with dishes like amok (a curry dish) and nom banh chok (rice noodle dish) being popular.
                8. Tourism: Cambodia is a popular tourist destination, attracting visitors from around the world to explore its ancient temples, vibrant cities, and natural beauty. The Angkor Archaeological Park, with its magnificent temples including Angkor Wat, Angkor Thom, and Bayon, is a major highlight for tourists.
                Overall, Cambodia is a country with a rich cultural heritage, stunning landscapes, and a resilient population that has overcome significant challenges in its history.
                ",
            app()->getLocale(),
        ) }}
    </p>

    <script type="text/javascript">
        var url = "{{ route('translate') }}";
        var url_font = "{{ route('customfont') }}";
        var url_ff = "{{ route('customfonttheme') }}";
        var url_color = "{{ route('customColor') }}";

        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });

        $('.fontsize').change(function() {
            window.location.href = url_font + "?size=" + $(this).val();
        });

        $('.fonttheme').change(function() {
            window.location.href = url_ff + "?font=" + $(this).val();
        });

        $('#colorPicker').on('input', function() {
            var color = $(this).val();
            $('.color').css('color', color);
        });
    </script>
</body>

</html>
