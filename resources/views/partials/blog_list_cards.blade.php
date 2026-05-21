@forelse($blogs as $blog)
    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-between border border-gray-100 transform hover:scale-[1.01] transition duration-200">
        <div>
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-48 object-cover" alt="{{ $blog->title }}">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image Provided</div>
            @endif
            
            <div class="p-5">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full font-semibold mb-2">
                    {{ $blog->category }}
                </span>
                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $blog->title }}</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $blog->short_description }}</p>
            </div>
        </div>
        
        <div class="p-5 pt-0 border-t border-gray-50 flex items-center justify-between text-xs text-gray-500">
            <span>📅 {{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</span>
            <a href="{{ route('blog.show', $blog->id) }}" class="text-blue-600 hover:text-blue-800 font-bold inline-flex items-center">
                Read Full →
            </a>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-12">
        <p class="text-gray-500 text-lg">No matching blogs found for your selected filters.</p>
    </div>
@endforelse