<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/post">
                        @csrf
                        <div class="mb-5">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="w-full" required>
                            @error('title')
                            <span class="mt-3 text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="title">Body</label>
                            <textarea class="w-full" name="body" required></textarea>
                            @error('body')
                            <span class="mt-3 text-sm text-red-600">{{$message}}</span>
                            @enderror
                        </div>

                        <x-honeypot />

                        <div class="">

                            <input type="submit" name="publish" class="w-full py-5 bg-red-400">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
