<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkillTrack LMS') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>
        /* =========================
           COLOR + SHADOW SYSTEM
        ========================== */
        :root {
            --bg: #f6f7fb;
            --text: #0f172a;
            --muted: #64748b;

            --blue: #2563eb;
            --teal: #14b8a6;
            --orange: #f97316;

            --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.06);
            --shadow-md: 0 6px 18px rgba(15, 23, 42, 0.08);
            --shadow-lg: 0 12px 30px rgba(15, 23, 42, 0.12);
            --shadow-hover: 0 10px 25px rgba(37, 99, 235, 0.15);
        }

        body {
            background: var(--bg);
            font-family: ui-sans-serif, system-ui;
            color: var(--text);
        }

        /* =========================
           LAYOUT
        ========================== */
        .layout {
            display: flex;
        }

        /* =========================
           SIDEBAR
        ========================== */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            padding: 25px;
            background: white;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .nav a {
            display: block;
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--muted);
            transition: 0.2s;
        }

        .nav a:hover {
            background: white;
            box-shadow: var(--shadow-sm);
            transform: translateX(3px);
            color: var(--text);
        }

        .nav a.active {
            background: white;
            color: var(--blue);
            box-shadow: var(--shadow-md);
            font-weight: 600;
        }

        /* =========================
           MAIN AREA
        ========================== */
        .main {
            margin-left: 240px;
            padding: 30px;
            width: 100%;
        }

        /* =========================
           TOP BAR
        ========================== */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .title {
            font-size: 20px;
            font-weight: 600;
        }

        .user {
            font-size: 13px;
            color: var(--muted);
            background: white;
            padding: 6px 12px;
            border-radius: 999px;
            box-shadow: var(--shadow-sm);
        }

        /* =========================
           CARD (PREMIUM FLOAT)
        ========================== */
        .card {
            background: white;
            border-radius: 18px;
            padding: 18px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: var(--shadow-sm);
            transition: 0.25s;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        /* =========================
           BUTTONS
        ========================== */
        .btn {
            background: var(--blue);
            color: white;
            padding: 10px 14px;
            border-radius: 12px;
            border: none;
            transition: 0.2s;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
        }

        .btn:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-1px);
            background: var(--teal);
        }

        .btn-orange {
            background: var(--orange);
        }

        .btn-orange:hover {
            background: #ea580c;
        }

        /* =========================
           PROGRESS BAR
        ========================== */
        .progress {
            background: #e5e7eb;
            height: 8px;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-bar {
            background: var(--teal);
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="layout">


        <!-- SIDEBAR -->
        <div class="sidebar">

            <div class="logo">🎓 SkillTrack</div>

            <div class="nav">
                <a href="/dashboard" class="active">📊 Dashboard</a>
                {{-- Admin Menu --}}
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.courses.index') }}">
                        📚 Course Management
                    </a>
                @endif
                {{-- Student Menu --}}
                @if (auth()->user()->role === 'student')
                    <a href="{{ route('student.courses.index') }}" class="block px-4 py-3 rounded-xl hover:bg-teal-100">
                        📚 Courses
                    </a>
                @endif
                <a href="{{ route('admin.lessons.index') }}"> Lessons</a>
                <a href="#">🧠 Skills</a>
                <a href="#">📈 Analytics</a>

            </div>

            <form method="POST" action="{{ route('logout') }}" style="margin-top:30px;">
                @csrf
                <button class="btn btn-orange" style="width:100%;">
                    Logout
                </button>
            </form>

        </div>

        <!-- MAIN -->
        <div class="main">

            <!-- TOP BAR -->
            <div class="topbar">

                <div class="title">
                    @yield('page-title', 'Dashboard')
                </div>

                <div class="user">
                    👋 {{ Auth::user()->name }}
                </div>

            </div>

            <!-- CONTENT -->
            @if (isset($header))
                <header>
                    {{ $header }}
                </header>
            @endif

            {{ $slot }}

        </div>

    </div>

</body>

</html>
