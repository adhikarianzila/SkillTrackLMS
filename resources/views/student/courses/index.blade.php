<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📚 Courses
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            <!-- TOP SECTION -->
            <div class="flex justify-between items-center mb-8">

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Available Courses
                    </h3>
                    <p class="text-sm text-gray-500">
                        Start learning and build your skills
                    </p>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-teal-500 transition">
                    + Browse Skills
                </button>

            </div>

            <!-- COURSE GRID -->
            @foreach ($courses as $course)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- COURSE CARD -->
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-6">

                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-semibold text-gray-800">{{ $course->title }}</h3>
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-600 rounded-full">
                                {{ $course->skills }}
                            </span>
                        </div>

                        <p class="text-sm text-gray-500 mb-4">
                            {{ $course->description }}
                        </p>

                        <!-- PROGRESS -->
                        <div class="w-full bg-gray-200 h-2 rounded-full mb-4">
                            <div class="bg-teal-500 h-2 rounded-full" style="width: 70%"></div>
                        </div>

                        <div class="flex justify-between items-center">

                            <span class="text-sm text-gray-500">
                                70% completed
                            </span>
                            @if (auth()->user()->courses->contains($course->id))
                                <a href="{{ route('student.courses.show', $course) }}"
                                    class="inline-block px-5 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                                    Continue Learning
                                </a>
                            @else
                                <form action="{{ route('student.courses.enroll', $course) }}" method="POST">

                                    @csrf

                                    <button type="submit"
                                        class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                                        Enroll Now
                                    </button>

                                </form>
                            @endif
                        </div>

                    </div>
            @endforeach
        </div>

    </div>

    </div>

</x-app-layout>
