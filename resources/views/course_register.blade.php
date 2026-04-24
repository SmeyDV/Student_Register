<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 flex items-center justify-center min-h-screen p-4 selection:bg-cyan-500 selection:text-white relative overflow-hidden">

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-indigo-600/20 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="relative w-full max-w-md bg-slate-900/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-800 p-8 sm:p-10">

        <form method="POST" action="{{ route('course.store') }}" class="flex flex-col">
            @csrf

            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">
                    Assign Course
                </h2>
                <p class="text-slate-400 text-sm mt-2 font-medium">Link a student to a new course.</p>
            </div>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Student Roll Number</label>
                    <div class="relative">
                        <input type="text" name="roll_no" placeholder="Enter Roll Number" required
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-800 rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all shadow-inner placeholder:text-slate-600">

                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Course Selection</label>
                    <div class="relative">
                        <select name="course" required
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-800 rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all shadow-inner appearance-none cursor-pointer">
                            <option value="" class="bg-slate-900 text-slate-400">-- Select Course --</option>
                            <option value="PHP" class="bg-slate-900 text-slate-200">PHP</option>
                            <option value="Laravel" class="bg-slate-900 text-slate-200">Laravel</option>
                            <option value="Python" class="bg-slate-900 text-slate-200">Python</option>
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="mt-8 w-full bg-gradient-to-r from-indigo-500 to-cyan-500 hover:from-indigo-400 hover:to-cyan-400 text-white font-bold py-4 rounded-xl shadow-[0_0_20px_rgba(6,182,212,0.3)] transition-all duration-300 active:scale-[0.98] flex justify-center items-center gap-2 group">
                <span>Assign Course</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </button>

            <button type="button" onclick="window.location='{{ route('welcome') }}'"
                class="mt-4 w-full bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 hover:border-cyan-500/50 font-bold py-3.5 px-8 rounded-xl shadow-lg transition-all duration-300 active:scale-[0.98] flex justify-center items-center gap-2 group">
                <span>Back to Dashboard</span>
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                </svg>
            </button>
        </form>

    </div>
</body>

</html>