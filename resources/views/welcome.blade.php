<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API - open weather</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="flex flex-col">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Previsão do tempo</h2>
            <p class="text-gray-700">Pesquise pela cidade e veja o clima do dia.</p>
        </div>
        <form class="w-96 mx-auto" action="{{ route('searchWeather') }}">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ex: Fortaleza, CE" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>

        <div class="bg-white w-96 p-6 rounded-lg shadow-lg mt-2">
            @isset($data)
                <h1 class="text-5xl flex justify-center mb-2">{{ $data['temp'] }}&#8451</h1>
                <div class="flex flex-row">
                    <div class="flex-auto w-auto items-center">Min: {{ $data['temp_min']}}</div>
                    <div class="flex-auto w-auto items-center">Max: {{ $data['temp_max']}}</div>
                </div>
                <p>{{ $data['description'] }}</p>
                <p>humidade: {{ $data['humidity'] }}</p>
            @endisset
        </div>
    </div>
</body>

</html>
