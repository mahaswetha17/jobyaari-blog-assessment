<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - JobYaari</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-4 h-16 flex items-center">
            <a href="{{ route('home') }}" class="text-blue-600 font-medium hover:underline">← Back to Blog Home</a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-10">
        <article class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden p-6 md:p-10">
            <div class="mb-6">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-bold mb-3">{{ $blog->category }}</span>
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 leading-tight mb-2">{{ $blog->title }}</h1>
                <p class="text-sm text-gray-500">Published on {{ \Carbon\Carbon::parse($blog->published_date)->format('F d, Y') }}</p>
            </div>

            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-96 object-cover rounded-xl mb-8" alt="{{ $blog->title }}">
            @endif

            <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed text-base whitespace-pre-line">
                {{ $blog->content }}
            </div>
        </article>
    </main>
</body>
</html>