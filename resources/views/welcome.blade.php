<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
    src="/docs/images/blog/image-4.jpg" alt="">
<div class="flex flex-col justify-between p-4 leading-normal">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
        technology acquisitions 2021</h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
        technology acquisitions of 2021 so far, in reverse chronological order.</p>
</div> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Portfolio</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>

<body class="antialiased xs:mx-7">
    <livewire:navbar />
    <main class="max-w-6xl mx-auto">
        <section class="min-h-screen scroll-down left-1/2 xs:h-2/3" id="scroll-down">
            <div class="min-h-6x1 lg:py-52 xs:py-28 left-1/2">
                <p class="text-8xl font-extrabold pb-8 text-white tracking-widest select-none xs:text-6xl">Portfolio,</p>
                <p class="text-3xl font-extrabold text-white tracking-wide select-none">
                    <span
                        class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                        {{ $profile[0]['firstname'] }} {{ $profile[0]['name'] }}
                    </span>
                </p>
            </div>
            <div class="scroll-down-arrow" id="animate">
        </section>


        <hr class="w-80 h-1 my-8 bg-gray-200 border-0 rounded mx-auto">


        <section class="" id="information">
            <div class="min-h-6x1 text-center pt-20">
                <h1 class="text-6xl font-extrabold text-white tracking-widest select-none xs:text-3xl">Informations</h1>
            </div>
            <div class="flex xs:flex-col pt-36 mx-auto">
                <div class="lg:flex-row xs:flex-col mx-auto ">
                    <h2 class="lg:text-4xl xs:text-2xl font-extrabold text-white">{{ $profile[0]['firstname'] }}
                        {{ $profile[0]['name'] }},</h2>
                    <p class="my-4 text-lg text-gray-500 ">{{ $profile[0]['biography'] }}</p>
                </div>
                <div class="lg:flex-row xs:flex:col mx-auto">
                    <dl class="max-w-md text-gray-900 divide-y divide-blue-400">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-white md:text-lg dark:text-gray-400 select-none">Adresse Email</dt>
                            <dd class="text-lg font-semibold text-gray-500 select-all">{{ $profile[0]['email'] }}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-white md:text-lg dark:text-gray-400 select-none">Numéro de téléphone
                            </dt>
                            <dd class="text-lg font-semibold text-gray-500 select-all">{{ $profile[0]['phone'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>


        <div class="mt-36">
            <hr class="w-80 h-1 my-8 bg-gray-200 border-0 rounded mx-auto">
        </div>


        <section class="min-h-screen" id="formation">
            <div class="min-h-6x1 text-center pt-20">
                <h1 class="text-6xl font-extrabold text-white tracking-widest select-none xs:text-4xl">Formations</h1>
            </div>
            @foreach ($etudes as $etude)
                <div class="pt-16 justify-center flex" id="{{ $etude['name'] }}">
                    <p class="flex items-center bg-background md:max-w-xl hover:bg-hover rounded-lg">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 lg:text-2xl xs:text-xl font-bold tracking-tight text-white text-center">
                            {{ $etude['name'] }}
                        </h5>
                        <p class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                            {{ $etude['description'] }}
                        </p>

                        <p class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                            <span class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année de
                                début
                            </span> {{ date('j F, Y.', strtotime($etude['started_at'])) }}
                        </p>
                        <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700 w-20 mx-auto">
                        @if ($etude['current'] == 0)
                            <p class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                                <span class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année
                                    de Fin
                                </span> {{ date('j F, Y.', strtotime($etude['finished_at'])) }}
                            </p>
                        @else
                            <p class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                                <span class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année
                                    de Fin
                                </span> en cours...
                            </p>
                        @endif
                    </div>
                    </p>
                </div>
                <div class="inline-flex items-center justify-center w-full select-none">
                    <hr class="w-64 h-1 my-8 bg-gradient-to-r from-white via-blue-400 to-white border-0 rounded ">
                    <div class="absolute px-2 -translate-x-1/2 bg-background left-1/2 ">
                        <svg class="w-8 h-8" id="master-artboard" viewBox="0 0 1400 980" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            style="enable-background:new 0 0 1400 980;" width="1400px" height="980px"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="text-path-0"
                                    d="M 1459.4779052734375 292.0559997558594 A 100 -31 0 0 0 1514.0557861328125 292.0559997558594 A 100 -31 0 0 0 1459.4779052734375 292.0559997558594 Z"
                                    style="fill: none; stroke: red; stroke-width: 2;" />
                                <path id="path-1"
                                    d="M 1459.4779052734375 292.0559997558594 A 100 -31 0 0 0 1514.0557861328125 292.0559997558594 A 100 -31 0 0 0 1459.4779052734375 292.0559997558594 Z"
                                    style="fill: none; stroke: red; stroke-width: 2;" />
                                <style id="ee-google-fonts">
                                    @import url(https://fonts.googleapis.com/css?family=Arvo:700,400,400italic,700italic);
                                </style>
                            </defs>
                            <g
                                transform="matrix(7.061864852905274, 0, 0, 7.061864852905274, -2353.713436070298, -3702.193907917185)">
                                <g transform="matrix(1, 0, 0, 1, 0, 0)">
                                    <g transform="matrix(1, 0, 0, 1, 1.1368683772161603e-13, 0)">
                                        <g>
                                            <path class="st20"
                                                d="M431.7,634.6l-45.4-2.4l-8,6.3c0,0,41.9,8,53.4,8c0,0,0,0,0,0L431.7,634.6L431.7,634.6z"
                                                style="fill: rgb(255, 196, 32);" />
                                            <path class="st22"
                                                d="M477.1,632.2l-45.4,2.4v11.9c11.5,0,53.4-8,53.4-8L477.1,632.2z"
                                                style="fill: rgb(252, 160, 13);" />
                                        </g>
                                        <path class="st21"
                                            d="M422.8,549.7c0,4.2,2.9,7.7,6.8,8.7c-1.6,12.7-3.9,30.8-6.2,36.5c-2.9,7.1-6.4,13.6-10.1,16.1&#10;&#9;&#9;&#9;c-4.4-14.4-19-37-32.5-50c0.7-1.3,1.2-2.8,1.2-4.4c0-5-4-9-9-9c-5,0-9,4-9,9c0,5,4,9,9,9c1.7,0,3.2-0.5,4.5-1.3&#10;&#9;&#9;&#9;c10.2,17,15.8,43.8,13.3,61.3c0.1,0,0.2,0,0.5,0l0,0h40.5v-85C426.8,540.8,422.8,544.8,422.8,549.7z"
                                            style="fill: rgb(254, 241, 66);" />
                                        <path class="st20"
                                            d="M472.1,625.7c0.2,0,0.4,0,0.5,0c-2.5-17.7,2.9-45.1,13.3-62c1.3,0.8,2.8,1.2,4.5,1.2c5,0,9-4,9-9&#10;&#9;&#9;&#9;c0-5-4-9-9-9c-4.9,0-9,4-9,9c0,2,0.7,3.8,1.7,5.3c-13.1,13-27.8,35.4-31.9,49.6c-4.1-3.4-8.5-8.6-11.2-16.9&#10;&#9;&#9;&#9;c-1.7-5.2-4.2-22.9-6.1-35.5c3.9-1,6.8-4.5,6.8-8.7c0-5-4-9-9-9c0,0,0,0,0,0v85L472.1,625.7L472.1,625.7z"
                                            style="fill: rgb(255, 196, 32);" />
                                        <path class="st21"
                                            d="M391.3,628c0,5,5,9.2,11.1,9.2h29.3V628C413.9,628,396.1,628,391.3,628z"
                                            style="fill: rgb(254, 241, 66);" />
                                        <path class="st20"
                                            d="M472,628c-4.3,0-22.3,0-40.3,0v9.2h29.1C467,637.2,472,633.1,472,628z"
                                            style="fill: rgb(255, 196, 32);" />
                                    </g>
                                </g>
                            </g><text class="single-line-text"
                                style="font-size: 101.11px; font-family: null; fill: rgb(59, 59, 59); white-space: pre; color: rgb(51, 51, 51); font-weight: 900; fill-opacity: 1; letter-spacing: -0.220744px; text-anchor: middle;"
                                transform="matrix(3.7675871849060063, 0, 0, 3.7675871849060063, -5003.529712507769, -439.3325006269969)">
                                <textPath startOffset="25%" xlink:href="#text-path-0">E</textPath>
                            </text><text class="single-line-text"
                                style="font-size: 101.11px; font-family: null; fill: rgb(59, 59, 59); white-space: pre; color: rgb(51, 51, 51); font-weight: 900; fill-opacity: 1; letter-spacing: -0.220744px; text-anchor: middle;"
                                transform="matrix(3.7675871849060063, 0, 0, 3.7675871849060063, -4820.343309592138, -292.33917158905956)">
                                <textPath startOffset="25%" xlink:href="#path-1">L</textPath>
                            </text>
                        </svg>
                    </div>
                </div>
            @endforeach
        </section>


        <div class="mt-36">
            <hr class="w-80 h-1 my-8 bg-gray-200 border-0 rounded mx-auto">
        </div>


        <section class="min-h-screen" id="competence">
            <div class="min-h-6x1 text-center pt-20 pb-20 select-none">
                <h1 class="text-6xl font-extrabold text-white tracking-widest xs:text-3xl">Compétences</h1>
            </div>

            <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="flex pt-16 pb-12">

                <div class="flex-col">
                    <p class="xs:text-2xl lg:text-4xl font-extrabold text-white tracking-wide">
                        <span class="underline decoration-5 decoration-blue-400 select-none">
                            Outils
                        </span>
                    </p>
                    <div class="pt-10 mx-auto xs:divide-y-2">
                        @foreach ($outils as $outil)
                            <div class="lg:flex lg:flex-row pt-5">
                                <div class="">
                                    <h2 class="lg:text-2xl xs:text-lg font-extrabold text-white">
                                        {{ $outil['title'] }},</h2>
                                    <p class="my-4 lg:text-lg xs:text-base text-gray-500 ">{{ $outil['description'] }}</p>
                                </div>
                                <div class="lg:ml-auto">
                                    <dl class="text-gray-900 divide-y divide-blue-400">
                                        <div class="flex flex-col pb-3 pt-5">
                                            <dt
                                                class="mb-1 text-right text-white lg:text-lg xs:text-base dark:text-gray-400 select-none">
                                                Lien Documentation</dt>
                                            <dd class="lg:text-sm xs:text-xs text-right font-semibold text-gray-500 select-all">
                                                {{ $outil['lien_doc'] }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">

            <div class="flex pt-16 pb-12">

                <div class="flex-col">
                    <p class="lg:text-4xl xs:text-2xl font-extrabold text-white tracking-wide select-none">
                        <span class="underline decoration-5 decoration-blue-400">
                            Langages
                        </span>
                    </p>
                    <div class="pt-10 mx-auto w-full">
                        @foreach ($competences as $competence)
                            <div class="flex w-full">
                                <div class="flex-row">
                                    <h2 class="lg:text-2xl xs:text-base font-extrabold text-white">
                                        {{ $competence['title'] }},</h2>
                                    <div class="flex flex-row select-none">
                                        <p class="my-4 lg:text-lg xs:text-sm font-bold text-gray-500 select-none">Niveau de maitrise
                                            : </p>
                                        @for ($index_lvl = 0; $index_lvl < 5; $index_lvl++)
                                            @if ($index_lvl < $competence['lvl'])
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="lg:w-6 lg:h-6 lg:my-4 lg:ml-px xs:w-4 text-yellow-300">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="lg:w-6 lg:h-6 lg:my-4 lg:ml-px xs:w-4 text-gray-600">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        @endfor


                                    </div>

                                </div>
                                <div class="flex-row pl-24 select-none ml-auto">
                                    <img src="/Languages/{{ $competence['logo'] }}"
                                        alt="logo {{ $competence['logo'] }}" class="lg:w-24 lg:h-24 xs:w-16">
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            </div>
        </section>

        <div class="mt-36">
            <hr class="w-80 h-1 my-8 bg-gray-200 border-0 rounded mx-auto">
        </div>


        <section class="min-h-screen" id="experience">
            <div class="min-h-6x1 text-center pt-20 pb-20 select-none">
                <h1 class="lg:text-6xl font-extrabold text-white tracking-widest xs:text-3xl">Expériences</h1>
            </div>
            <div class="lg:flex pt-16 pb-12">

                <div class="lg:flex-col">
                    @foreach ($experiences as $experience)
                        <div class="pt-10 flex-col">
                            <div class="flex ">
                                <div class="">
                                    <h2 class="lg:text-2xl xs:text-lg font-extrabold text-white">
                                        {{ $experience['title'] }},</h2>
                                    <p class="my-4 text-lg text-gray-500 ">{{ $experience['description'] }}</p>
                                </div>
                                <div class="">
                                    <dl class="max-w-md text-gray-900 divide-y divide-blue-400">
                                        <div class="flex flex-col pb-3 pt-5">
                                            <dt
                                                class="mb-1 text-right text-white md:text-lg dark:text-gray-400 select-none">
                                                Langage(s)</dt>
                                            <dd class="text-sm text-right font-semibold text-gray-500 select-all">
                                                {{ implode(', ', $experience['competences']) }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>

                            </div>
                            <div class="pt-16">
                                <div class="lg:flex lg:flex-row lg:divide-x-2 xs:divide-y-2 divide-blue-400">
                                    <div class="">
                                        @foreach ($compagnies as $compagnie)
                                            @if ($compagnie['id'] == $experience['company_id'])
                                                <div class="pb-3 px-8">
                                                    <dt
                                                        class="mb-1 text-white md:text-lg dark:text-gray-400 select-none">
                                                        {{ $compagnie['name'] }}</dt>
                                                    <dd class="text-sm font-semibold text-gray-500 select-all">
                                                        {{ $compagnie['lien'] }}
                                                    </dd>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div>
                                        @foreach ($etudes as $etude)
                                            @if ($etude['id'] == $experience['etude_id'])
                                                <div class="pb-3 px-8">
                                                    <dt
                                                        class="mb-1 text-white md:text-lg dark:text-gray-400 select-none">
                                                    </dt>
                                                    <dd class="text-sm font-semibold text-gray-500 select-none">
                                                        <a href="#{{ $etude['name'] }}">{{ $etude['name'] }}</a>
                                                    </dd>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="px-8">
                                            <p class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                                                <span
                                                    class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année de début
                                                </span> {{ date('j F, Y.', strtotime($etude['started_at'])) }}
                                            </p>
                                        </div>
                                        @if ($etude['current'] == 0)
                                            <div class="px-8">
                                                <p
                                                    class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                                                    <span
                                                        class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année de Fin
                                                    </span> {{ date('j F, Y.', strtotime($etude['finished_at'])) }}
                                                </p>
                                            </div>
                                        @else
                                            <div class="px-8">
                                                <p
                                                    class="mb-3 font-medium text-gray-500 text-center whitespace-pre-line">
                                                    <span
                                                        class="font-bold text-gray-500 text-center whitespace-pre-line select-none">Année de Fin
                                                    </span> en cours...
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>


    </main>

    @livewireScripts
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
