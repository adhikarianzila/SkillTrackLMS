<x-app-layout>

    <!-- HEADER SLOT (keeps Breeze structure) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📊 Dashboard
        </h2>
    </x-slot>

    <!-- PAGE CONTENT -->
    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- =========================
                 STATS CARDS
            ========================== -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-sm text-gray-500">Total Skills</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalSkills }}
                    </h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-sm text-gray-500">Average Progress</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ round($avgProgress) }}%
                    </h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-sm text-gray-500">Completed Skills</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $skills->where('progress', 100)->count() }}
                    </h2>
                </div>

            </div>

            <!-- =========================
                 HEADER SECTION
            ========================== -->
            <div class="bg-white rounded-2xl p-6 shadow-sm flex justify-between items-center">

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        📚 My Skills Progress
                    </h3>
                    <p class="text-sm text-gray-500">
                        Track your learning progress in real time
                    </p>
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-teal-500 transition shadow-sm">
                    + Add Skill
                </button>

            </div>

            <!-- =========================
                 SKILLS LIST
            ========================== -->
            <div class="space-y-4">

                @foreach ($skills as $skill)
                    <div class="bg-white rounded-2xl p-5 shadow-sm hover:shadow-md transition">

                        <!-- Skill name + percentage -->
                        <div class="flex justify-between mb-3">
                            <span class="font-medium text-gray-800">
                                {{ $skill->skill->name }}
                            </span>

                            <span class="text-sm text-gray-500">
                                {{ $skill->progress }}%
                            </span>
                        </div>

                        <!-- Progress bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="h-2 rounded-full bg-teal-500" style="width: {{ $skill->progress }}%">
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>
