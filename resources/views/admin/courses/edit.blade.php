<x-app-layout>

    <div class="max-w-1xl mx-auto px-4">

        {{-- Header --}}
        <div class="mb-5">
            <h1 class="text-4xl font-bold text-slate-800">
                Edit Course
            </h1>

            <p class="text-slate-500 mt-2">
                Update your course information and keep your content up to date.
            </p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">

            {{-- Top Banner --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-3">
                <div class="flex items-center gap-4">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                        ✏️
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            Update Course
                        </h2>

                        <p class="text-blue-100">
                            Modify the details below and save changes.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Form --}}
            <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="p-8 space-y-6">

                @csrf
                @method('PUT')

                {{-- Course Title --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Course Title
                    </label>

                    <input type="text" name="title" value="{{ old('title', $course->title) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4
                                  focus:outline-none focus:ring-2 focus:ring-blue-500
                                  focus:border-blue-500 transition">

                    @error('title')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Course Description
                    </label>

                    <textarea name="description" rows="8"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4
                                     focus:outline-none focus:ring-2 focus:ring-blue-500
                                     focus:border-blue-500 transition resize-none">{{ old('description', $course->description) }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- Status --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Course Status
                    </label>

                    <select name="status"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4
               focus:outline-none focus:ring-2 focus:ring-blue-500
               focus:border-blue-500 transition">

                        <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>
                            💾 Draft
                        </option>

                        <option value="published" {{ old('status', $course->status) == 'published' ? 'selected' : '' }}>
                            🚀 Published
                        </option>

                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-4 pt-4">

                    <a href="{{ route('admin.courses.index') }}"
                        class="px-6 py-3 rounded-2xl border border-slate-300
                              text-slate-700 font-semibold hover:bg-slate-100 transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-8 py-3 rounded-2xl bg-blue-600 text-white font-semibold
                                   hover:bg-blue-700 transition shadow-lg hover:shadow-xl">

                        🚀 Update Course
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
