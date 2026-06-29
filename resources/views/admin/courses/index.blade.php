<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-slate-800">
                    Course Management
                </h2>
                <p class="text-slate-500 mt-1">
                    Manage all courses in your LMS platform.
                </p>
            </div>

            <a href="{{ route('admin.courses.create') }}"
                class="inline-flex items-center px-5 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-2xl shadow-lg transition duration-300">

                Add New Course
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">
                    <p class="text-slate-500 text-sm">Total Courses</p>
                    <h3 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $totalCourses }}
                    </h3>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">
                    <p class="text-slate-500 text-sm">Published</p>
                    <h3 class="text-4xl font-bold text-teal-600 mt-2">
                        {{ $publishedCount }}

                    </h3>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">
                    <p class="text-slate-500 text-sm">Draft Courses</p>
                    <h3 class="text-4xl font-bold text-orange-500 mt-2">
                        {{ $draftCount }}

                    </h3>
                </div>

            </div>

            {{-- Course Table --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">

                <div class="p-6 border-b">
                    <h3 class="text-xl font-semibold text-slate-800">
                        All Courses
                    </h3>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr class="text-left text-slate-600">

                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Students</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Actions</th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @foreach ($courses as $course)
                                {{-- Sample Row --}}
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-5">
                                        <div>
                                            <h4 class="font-semibold text-slate-800">
                                                {{ $course->title }}
                                            </h4>

                                            <p class="text-sm text-slate-500">
                                                {{ $course->description }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="px-6 py-5">
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                            Web Development
                                        </span>
                                    </td>

                                    <td class="px-6 py-5">
                                        {{ $course->users_count }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-sm">
                                            {{ Str::ucfirst($course->status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-5">

                                        <div class="flex justify-center gap-3">

                                            <a href="{{ route('admin.courses.edit', $course) }}"
                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-sm transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm transition">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                            {{-- Add @foreach here later --}}

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
