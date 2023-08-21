<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'GetPress.ai') }}</title>


    <!-- Scripts -->
    <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js" integrity="sha512-90vH1Z83AJY9DmlWa8WkjkV79yfS2n2Oxhsi2dZbIv0nC4E6m5AbH8Nh156kkM7JePmqD6tcZsfad1ueoaovww==" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        {!! file_get_contents($cssPath) !!}
    </style>

    @if (strpos((string) config('spark.brand.color'), '#') === 0)
    <style>
        .bg-custom-hex {
            background-color: {!! config('spark.brand.color') !!};
        }
    </style>
    @endif

    @inertiaHead

    @vite(['resources/css/app.css', 'resources/css/satoshi.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
    @if(count(Auth::user()->allTeams()) > 1)
    <div class="px-6 py-4 flex justify-end items-center">
        <p class="mr-2 text-sm">Switch Your Team: </p>
        <button id="dropdownCompanyNameButton" data-dropdown-toggle="dropdownCompanyName" class="max-w-xs w-40 flex justify-between items-center p-2 w-full rounded-lg bg-gray-200 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700" type="button">
            <span class="sr-only">Open user menu</span>
            <div class="flex items-center">
                <div>
                    <div class="font-semibold leading-none text-gray-900 dark:text-white mb-0.5 text-left">
                        {{ Auth::user()->current_team->name }}
                    </div>
                    <!-- <div class="text-sm text-gray-500 dark:text-gray-400">Team plan</div> -->
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div id="dropdownCompanyName" class="hidden z-10 w-60 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-placement="bottom">
                @foreach (Auth::user()->allTeams() as $team)
                    @if ($team->id != Auth::user()->current_team->id)
                        <form method="POST" action="{{ route('current-team.update') }}" x-data>
                            @method('PUT')
                            @csrf

                            <!-- Hidden Team ID -->
                            <input type="hidden" name="team_id" value="{{ $team->id }}">

                            <button type="submit" class="flex w-full items-center py-3 px-4 rounded hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <div class="font-semibold leading-none text-gray-900 dark:text-white mb-0.5">{{$team->name}}</div>
                                    <!-- <div class="text-sm text-gray-500 dark:text-gray-400">Personal plan</div> -->
                            </button>
                        </form>
                    @endif
                @endforeach
        </div>
    </div>
    @endif
    @inertia

    <!-- Scripts -->
    <script>
        window.translations = <?php echo $translations; ?>;

        {!! file_get_contents($jsPath) !!}
    </script>

    <x-impersonate::banner/>

</body>
</html>
