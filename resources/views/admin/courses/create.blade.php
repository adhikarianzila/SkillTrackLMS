<x-app-layout>

    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf

        <div class="max-w-7xl mx-auto py-10 px-4">

            {{-- HEADER --}}
            <div class="mb-10">
                <h1 class="text-4xl font-bold text-slate-800 tracking-tight">
                    Create New Course
                </h1>

                <p class="text-slate-500 mt-2 text-base">
                    Create engaging courses and publish them to students.
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
                                    Course Information
                                </h3>
                                <p class="text-sm text-slate-500">
                                    Basic details about your course.
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-6">

                            {{-- Title --}}
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Course Title
                                </label>

                                <input type="text" name="title" placeholder="Laravel Mastery"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>

                            {{-- Skills --}}
                            <div class="col-span-12 md:col-span-6">

                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Skills Required
                                </label>

                                <input type="text" name="skills" id="skillInput" placeholder="Type skill and press Enter"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                                {{-- Skills chips
                                <div id="skillsList" class="flex flex-wrap gap-2 mt-3"></div>

                                <input type="hidden" name="skills" id="skillsHidden"> --}}
                            </div>

                            {{-- Description --}}
                            <div class="col-span-12">

                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Course Description
                                </label>

                                <textarea name="description" rows="8" placeholder="Write course description..."
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                         focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>

                            </div>

                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-span-12 lg:col-span-4">

                    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 sticky top-6">

                        {{-- Header --}}
                        <div class="flex items-center mb-8">

                            <div class="w-14 h-14 rounded-2xl bg-orange-50 flex items-center justify-center text-2xl">
                                🚀
                            </div>

                            <div class="ml-4">
                                <h3 class="text-2xl font-semibold text-slate-800">
                                    Publishing
                                </h3>
                                <p class="text-sm text-slate-500">
                                    Publish or save draft
                                </p>
                            </div>

                        </div>

                        {{-- Status card --}}
                        <div class="bg-slate-50 rounded-2xl p-5 mb-6 border border-slate-100">

                            <div class="flex justify-between mb-3">
                                <span class="text-slate-500 text-sm">Status</span>
                                <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                                    New Course
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500 text-sm">Visibility</span>
                                <span class="font-medium text-slate-700 text-sm">
                                    Private
                                </span>
                            </div>

                        </div>

                        {{-- Buttons --}}
                        <button type="submit" name="status" value="published"
                            class="w-full py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-semibold
                               transition shadow-md hover:shadow-lg mb-3">

                            🚀 Publish Course
                        </button>

                        <button type="submit" name="status" value="draft"
                            class="w-full py-3 rounded-2xl border border-slate-300 hover:bg-slate-100
                               font-semibold transition text-slate-700">

                            💾 Save as Draft
                        </button>

                    </div>
                </div>

            </div>
        </div>

    </form>

</x-app-layout>
