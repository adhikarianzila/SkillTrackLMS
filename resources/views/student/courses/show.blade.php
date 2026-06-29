<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold">
            {{ $course->title }}
        </h1>

        <p class="text-gray-600 mt-4">
            {{ $course->description }}
        </p>

        <hr class="my-6">

        <h2 class="text-xl font-semibold mb-4">
            Course Content (Lessons will come here)
        </h2>

        <div class="bg-gray-100 p-6 rounded-xl">
            <p>📚 Lessons will be displayed here later</p>
        </div>

    </div>

</x-app-layout>
