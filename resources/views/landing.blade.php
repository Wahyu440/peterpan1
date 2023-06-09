<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Landing Page</title>
</head>

<body class="h-14 bg-gradient-to-r from-violet-500 to-fuchsia-500 m-10 space-y-10">
    <div class="flex">
        <div class="m-auto flex space-x-2">
            <a class="rounded-full bg-gradient-to-r from-fuchsia-500 to-yellow-500 py-3 px-5 font-bold text-white text-3xl place-self-end button"
                href="/user/login">DONASI</a>
            <h1 class="text-6xl font-bold font-sans text-white">
                NonProfit.
            </h1>
        </div>
    </div>
    <div class="flex flex-wrap space-x-3">
        @foreach ($activity as $item)
        <div class="rounded overflow-hidden shadow-lg bg-[length:200px_100px] w-96 bg-white">
            <div class="bg-gradient-to-l from-violet-500 to-violet-800 py-1 px-2 flex-row-reverse flex">
                <br>
            </div>
            <div class="px-6 py-4 space-y-1 text-center">
                <p class="font-bold text-xl mb-2"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$item->name}}</p>
                <p class="font-semibold text-gray-800 text-base">{{ date('j F Y', strtotime($item->start)) }} -
                    {{ date('j F Y', strtotime($item->end)) }}</p>
            </div>
            <div class="px-6 py-4 grid gap-2 grid-cols-2 grid-rows-2">
                <p class="font-semibold text-gray-600 text-base">Terkumpul :</p>
                <p class="font-semibold text-gray-400 text-base">
                    Rp{{ number_format($item->realization, 0, ',', '.') }}</p>
                <p class="font-semibold text-gray-600 text-base">Target :</p>
                <p class="font-semibold text-gray-400 text-base">
                    Rp{{ number_format($item->target, 0, ',', '.') }}</p>
                <div class="relative h-4 rounded-lg overflow-hidden bg-gray-200 col-span-2">
                    @php
                    $percentage = ($item->realization / $item->target) * 100;
                    $color = '';

                    if ($percentage < 15) { $color='red' ; } elseif ($percentage < 75) { $color='yellow' ; } else {
                        $color='green' ; } @endphp <div class="absolute top-0 left-0 h-full bg-{{ $color }}-500"
                        style="width: {{ $percentage }}%;">
                </div>
            </div>
        </div>
        <div class="px-2 pt-4 pb-2 grid grid-cols-2 gap-5">
            <div class="rounded-lg" style="background: linear-gradient(to left, #ee7724, #d8363a)">
                <a href="/quick/login/{{$item->id}}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                            clip-rule="evenodd" />
                    </svg>

                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Donate</span>
                </a>
            </div>
            <span
                class="inline-block rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 bg-gradient-to-l from-violet-500 to-violet-800 text-white text-center">#{{$item->type}}</span>
        </div>
    </div>
    @endforeach
    </div>
</body>

</html>