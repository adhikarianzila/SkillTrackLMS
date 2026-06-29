<x-app-layout>

    <form action="#" method="POST">
        @csrf

        <div class="max-w-7xl mx-auto py-10 px-4">

            {{-- HEADER --}}
            <div class="mb-10">
                <h1 class="text-4xl font-bold text-slate-800 tracking-tight">
                    Create New Lesson
                </h1>

                <p class="text-slate-500 mt-2 text-base">
                    Create engaging Lessons and publish them to students.
                </p>
            </div>

            <div class="grid grid-cols-12 gap-8">

                {{-- LEFT --}}
                <div class="col-span-12 lg:col-span-8">

                    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8">

                        {{-- Section header --}}
                        <div class="flex items-center mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-2xl">
                                📚
                            </div>

                            <div class="ml-4">
                                <h3 class="text-2xl font-semibold text-slate-800">
                                    Lesson Information
                                </h3>
                                <p class="text-sm text-slate-500">
                                    Basic details about your lesson.
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6">

                            {{-- select course --}}
                            <div class="col-span-12">
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Select Course
                                </label>

                                <select
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                    text-slate-700
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                     outline-none transition">

                                    <option selected disabled>Choose a Course</option>
                                    @foreach ($courses as $id => $title)
                                        <option value='{{ $id }}'>{{ $title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- Lesson title --}}
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Lesson Title
                                </label>

                                <input type="text" name="title" placeholder="Lesson Title"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Lesson Order
                                </label>

                                <input type="number" name="title" placeholder="1" min="1"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>

                            {{-- Description --}}
                            <div class="col-span-12">

                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Content
                                </label>

                                <textarea name="content" rows="8" placeholder="Write Lesson Contents..."
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                         focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>

                            </div>
                            <div class="col-span-12 flex justify-end">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700
                                    text-white font-semibold transition shadow-md hover:shadow-lg">

                                    💾 Save Lesson
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

</x-app-layout>
