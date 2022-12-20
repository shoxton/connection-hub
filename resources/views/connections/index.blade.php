<x-layout>
    @foreach ($apps as $key => $app)
        <div class="bg-white rounded p-6 w-64 shadow-md">
            <p>{{ $key }}</p>
        </div>
    @endforeach
</x-layout>
