<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 flex items-center justify-center min-h-screen p-4 selection:bg-cyan-500 selection:text-white relative overflow-hidden">

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-indigo-600/20 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="relative w-full max-w-md bg-slate-900/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-800 p-8 sm:p-10 text-center">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">
                Registry Hub
            </h1>
            <p class="text-slate-400 text-sm mt-2 font-medium">Select an action below to continue.</p>
        </div>

        <div class="flex flex-col gap-4">
            
            <a href="{{ route('student.form') }}" 
                class="group flex items-center justify-between w-full bg-slate-800/50 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 hover:shadow-[0_0_15px_rgba(99,102,241,0.2)] rounded-xl px-6 py-4 transition-all duration-300 active:scale-[0.98]">
                <span class="font-semibold text-slate-200 group-hover:text-indigo-300 transition-colors">Register a Student</span>
                <svg class="w-5 h-5 text-slate-500 group-hover:text-indigo-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('course.form') }}" 
                class="group flex items-center justify-between w-full bg-slate-800/50 hover:bg-slate-800 border border-slate-700 hover:border-cyan-500/50 hover:shadow-[0_0_15px_rgba(6,182,212,0.2)] rounded-xl px-6 py-4 transition-all duration-300 active:scale-[0.98]">
                <span class="font-semibold text-slate-200 group-hover:text-cyan-300 transition-colors">Assign a Course</span>
                <svg class="w-5 h-5 text-slate-500 group-hover:text-cyan-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('report') }}" 
                class="group flex items-center justify-between w-full bg-slate-800/50 hover:bg-slate-800 border border-slate-700 hover:border-purple-500/50 hover:shadow-[0_0_15px_rgba(168,85,247,0.2)] rounded-xl px-6 py-4 transition-all duration-300 active:scale-[0.98]">
                <span class="font-semibold text-slate-200 group-hover:text-purple-300 transition-colors">View Roster Report</span>
                <svg class="w-5 h-5 text-slate-500 group-hover:text-purple-400 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

        </div>
    </div>

</body>

</html>