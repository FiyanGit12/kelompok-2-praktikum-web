<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel — Sistem Manajemen Data Mahasiswa">
    <title>Admin Panel | Student Manager</title>

    <!-- Google Fonts: Inter + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/crud.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        mono:  ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-[#07090f] min-h-screen text-white antialiased">

    <!-- Pixel grid background (fixed) -->
    <div class="pixel-grid-bg" aria-hidden="true"></div>

    <!-- Subtle top-center glow -->
    <div class="top-glow" aria-hidden="true"></div>

    <!-- ══════════════════════════════════════════
         NAVBAR — Admin style, dark & white
         ══════════════════════════════════════════ -->
    <header class="admin-navbar sticky top-0 z-50">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-8 h-14 flex items-center justify-between gap-4">

            <!-- Left: Brand -->
            <a href="/crud" class="flex items-center gap-3 shrink-0 group">
                <!-- Pixel logo mark -->
                <div class="nav-logo-mark">
                    <div class="pixel-logo"></div>
                </div>
                <div class="leading-none">
                    <span class="font-bold text-white text-sm tracking-tight">Student<span class="text-white/50">Manager</span></span>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="admin-badge">ADMIN</span>
                        <span class="text-[9px] text-white/25 font-mono">v1.0</span>
                    </div>
                </div>
            </a>

            <!-- Center: Nav links -->
            <nav class="hidden md:flex items-center gap-0.5">
                <a href="/crud" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                    </svg>
                    Dashboard
                </a>
                <a href="crud/tambah" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14m-7-7h14"/>
                    </svg>
                    Tambah Data
                </a>
            </nav>

            <!-- Right: Admin identity -->
            <div class="hidden sm:flex items-center gap-3">
                <!-- Status indicator -->
                <div class="flex items-center gap-1.5 text-xs text-white/30 font-mono">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/60 animate-pulse inline-block"></span>
                    ONLINE
                </div>
                <!-- Admin chip -->
                <div class="admin-chip">
                    <div class="admin-chip-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <div class="leading-none">
                        <p class="text-[10px] text-white/35 font-medium tracking-wider uppercase">Administrator</p>
                        <p class="text-[12px] text-white font-semibold mt-0.5">Admin Panel</p>
                    </div>
                </div>
            </div>

            <!-- Mobile hamburger -->
            <button class="md:hidden text-white/40 hover:text-white transition-colors p-1.5 rounded-lg hover:bg-white/5" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>
                </svg>
            </button>

        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 w-full max-w-screen-xl mx-auto px-4 sm:px-8 py-10 min-h-[calc(100vh-56px-60px)]">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Modal slot — OUTSIDE main stacking context -->
    <?= $this->renderSection('modals') ?>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/[0.04]">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-8 py-4 flex items-center justify-between text-[11px] font-mono text-white/20">
            <span>© 2025 StudentManager — Praktikum Web Programming</span>
            <span>CodeIgniter 4 // PHP</span>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 600, easing: 'ease-out-cubic', once: true, offset: 40 });
    </script>
</body>

</html>