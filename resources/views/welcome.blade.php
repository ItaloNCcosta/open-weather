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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="flex flex-col">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Previsão do tempo</h2>
            <p class="text-gray-700">Pesquise pelas cidades brasileiras e veja o clima do dia.</p>
        </div>
        <form class="w-96 mx-auto" href="#">
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
                <select class="w-75" id="city" type="search" name="search">
                    <option value="" disabled selected>Selecione uma cidade</option>
                </select>
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>

        <div class="bg-white w-96 p-6 rounded-lg shadow-lg mt-2">
            @if($data)
                <h1 class="text-5xl flex justify-center mb-2">{{ $data['temp'] }}&#8451</h1>
                <div class="flex flex-row">
                    <div class="flex-auto w-auto items-center">Min: {{ $data['temp_min'] }}</div>
                    <div class="flex-auto w-auto items-center">Max: {{ $data['temp_max'] }}</div>
                </div>
                <p>{{ $data['description'] }}</p>
                <p>humidade: {{ $data['humidity'] }}</p>
            @endif
        </div>
    </div>

    <!-- JavaScript do jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript do Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#city').select2({
                placeholder: 'Selecione uma cidade',
                minimumInputLength: 1,
                ajax: {
                    url: '{{ route('search.cities') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.name,
                                    text: item.name
                                };
                            })
                        };
                    },
                    cache: true
                },
                allowClear: true
            });
        });
    </script>
</body>

</html>
