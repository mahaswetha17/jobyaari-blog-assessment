<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobYaari - Blog Management System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">

    <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <h1 class="text-2xl font-black text-blue-600 tracking-tight">Job<span class="text-gray-800">Yaari</span> Portal</h1>
            <a href="/login" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition">Admin Dashboard Login →</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="bg-white rounded-xl shadow-xs border border-gray-200 p-6 mb-8">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Refine Updates and Notifications</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Search Keywords</label>
                    <input type="text" id="searchFilter" placeholder="Type title or keyword..." class="w-full bg-gray-50 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-hidden focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Filter Category</label>
                    <select id="categoryFilter" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-hidden focus:border-blue-500">
                        <option value="">All Categories</option>
                        <option value="Admit Card">Admit Card</option>
                        <option value="Result">Result</option>
                        <option value="Job Alert">Job Alert</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Published Date</label>
                    <input type="date" id="dateFilter" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-hidden focus:border-blue-500">
                </div>
            </div>
        </div>

        <div id="blogGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @include('partials.blog_list_cards', ['blogs' => $blogs])
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Bind listener to inputs changing or keys typing
            $('#categoryFilter, #dateFilter, #searchFilter').on('keyup change', function() {
                let category = $('#categoryFilter').val();
                let date = $('#dateFilter').val();
                let search = $('#searchFilter').val();

                // Inject processing transparency loaders
                $('#blogGrid').css('opacity', '0.5');

                $.ajax({
                    url: "{{ route('blog.filter') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        category: category,
                        date: date,
                        search: search
                    },
                    success: function(dataHtml) {
                        // Dynamically swap content structure with complete transparency restoration
                        $('#blogGrid').html(dataHtml).css('opacity', '1');
                    },
                    error: function(error) {
                        console.error("AJAX Fetching Error Context: ", error);
                        $('#blogGrid').css('opacity', '1');
                    }
                });
            });
        });
    </script>
</body>
</html>