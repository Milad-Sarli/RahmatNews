<div class="flex justify-center">
    @foreach($categories as $category)
    <h3 class="bg-red-900 text-white px-5 rounded-lg font-bold hover:bg-green-600">
        {{ $category->title }}</h3>
    @endforeach
    {{-- <style>
     .milad {
        display: flex;gap: 4px;justify-content: center;
     }
    </style> --}}
</div>
