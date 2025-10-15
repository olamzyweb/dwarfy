<!DOCTYPE html>
<html>
<head>
    <title>Laravel URL Shortener</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center p-8">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">🔗 URL Shortener</h1>

        @if (session('short_url'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
                Shortened: 
                <a href="{{ session('short_url') }}" class="text-blue-600" target="_blank">
                    {{ session('short_url') }}
                </a>
            </div>
        @endif


        @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
        <form method="POST" action="{{ route('shorten') }}" class="mb-4">
            @csrf
            <input type="url" name="original_url" placeholder="Enter URL..."
                   class="border w-full p-2 rounded mb-2" required>
            <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">
                Shorten URL
            </button>
        </form>

        <h2 class="font-semibold mb-2">Recent Links</h2>
        <ul>
            @foreach($links as $link)
                <li class="text-sm mb-1">
                    <a href="{{ url($link->short_code) }}" target="_blank" class="text-blue-500">
                        {{ url($link->short_code) }}
                    </a>
                    <span class="text-gray-600">({{ $link->clicks }} clicks)</span>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
