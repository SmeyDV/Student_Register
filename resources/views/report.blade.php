<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Roster Report</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 min-h-screen p-4 sm:p-8 selection:bg-cyan-500 selection:text-white relative overflow-x-hidden">

    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-indigo-600/10 blur-[150px] rounded-full pointer-events-none"></div>

    <div class="relative max-w-3xl mx-auto mt-4 sm:mt-10">
        <div class="bg-slate-900/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-800 p-6 sm:p-10">

            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">
                    Roster Report
                </h2>
                <p class="text-slate-400 text-sm mt-2 font-medium">Select a course to view currently enrolled students.</p>
            </div>

            <form method="GET" action="{{ route('report') }}" class="flex flex-col sm:flex-row gap-4 items-end">
                <div class="w-full sm:flex-1">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Select Course</label>
                    <div class="relative">
                        <select name="course" required
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-800 rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all shadow-inner appearance-none cursor-pointer">
                            <option value="PHP" {{ (isset($selectedCourse) && $selectedCourse == 'PHP') ? 'selected' : '' }} class="bg-slate-900">PHP</option>
                            <option value="Laravel" {{ (isset($selectedCourse) && $selectedCourse == 'Laravel') ? 'selected' : '' }} class="bg-slate-900">Laravel</option>
                            <option value="Python" {{ (isset($selectedCourse) && $selectedCourse == 'Python') ? 'selected' : '' }} class="bg-slate-900">Python</option>
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full sm:w-auto bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 hover:border-cyan-500/50 font-bold py-3.5 px-8 rounded-xl shadow-lg transition-all duration-300 active:scale-[0.98] whitespace-nowrap group">
                    <span class="group-hover:text-cyan-400 transition-colors">Search</span>
                </button>
            </form>

            <div class="h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent my-10"></div>

            @if(isset($students) && count($students) > 0)

            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-200">Enrolled in <span class="text-cyan-400">{{ $selectedCourse }}</span></h3>
                <span class="bg-indigo-500/10 text-indigo-400 text-xs font-bold px-3 py-1 rounded-full border border-indigo-500/20">
                    {{ count($students) }} Students
                </span>
            </div>

            <ul class="space-y-3">
                @foreach($students as $student)
                <li class="group bg-slate-950/40 border border-slate-800 hover:border-slate-700 hover:bg-slate-800/50 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between transition-all duration-200">
                    <div class="flex flex-col">
                        <span class="text-slate-200 font-semibold group-hover:text-cyan-300 transition-colors">{{ $student->first_name }}</span>
                        <span class="text-slate-500 text-sm mt-1 flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            {{ $student->email }}
                        </span>
                    </div>
                    <div class="mt-4 sm:mt-0 flex items-center">
                        <span class="inline-flex items-center gap-1.5 bg-slate-900 text-slate-400 text-xs font-mono px-3 py-1.5 rounded-lg border border-slate-800">
                            <span class="text-slate-600">ID:</span> {{ $student->roll_no }}
                        </span>
                    </div>
                </li>
                @endforeach
            </ul>

            @elseif(isset($selectedCourse))
            <div class="text-center bg-slate-950/30 border border-slate-800 border-dashed rounded-2xl p-12">
                <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-800">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <p class="text-slate-300 font-medium text-lg">No students found.</p>
                <p class="text-slate-500 text-sm mt-1">There are currently no students enrolled in <span class="text-slate-400 font-semibold">{{ $selectedCourse }}</span>.</p>
            </div>
            @else
            <div class="text-center p-8">
                <p class="text-slate-500 text-sm">Select a course and generate the report to view the roster.</p>
            </div>
            @endif

        </div>
        <button type="button" onclick="window.location='{{ route('welcome') }}'"
            class="mt-4 w-full bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 hover:border-cyan-500/50 font-bold py-3.5 px-8 rounded-xl shadow-lg transition-all duration-300 active:scale-[0.98] flex justify-center items-center gap-2 group">
            <span>Back to Dashboard</span>
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
            </svg>
        </button>
    </div>

</body>
</html>