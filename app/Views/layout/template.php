<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PawStore — Sistem Manajemen Produk Petshop berbasis CodeIgniter 4">
    <title><?= esc($title ?? 'PawStore Petshop') ?></title>

    <!-- Google Fonts: Plus Jakarta Sans + Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/petshop.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        nunito:  ['Nunito', 'sans-serif'],
                    },
                    colors: {
                        peach:   { DEFAULT: '#FF8C69', light: '#FFE5DC', soft: '#FFF0EA', dark: '#E8643D' },
                        cream:   { DEFAULT: '#FFF8F3', card: '#FFFCFA' },
                        sage:    { DEFAULT: '#6BCB77', light: '#E8F8EA' },
                        sky:     { DEFAULT: '#4D96FF', light: '#E8F2FF' },
                        lavender:{ DEFAULT: '#C77DFF', light: '#F3E8FF' },
                        amber:   { DEFAULT: '#FFB627', light: '#FFF5DC' },
                    }
                }
            }
        }
    </script>
</head>

<body class="font-jakarta bg-cream min-h-screen antialiased">

    <!-- Decorative blobs -->
    <div class="blob-1" aria-hidden="true"></div>
    <div class="blob-2" aria-hidden="true"></div>

    <!-- ══════════════════════════════════════════════
         NAVBAR
         ══════════════════════════════════════════════ -->
    <header class="petshop-navbar sticky top-0 z-50">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-8 h-16 flex items-center justify-between gap-4">

            <!-- Brand -->
            <a href="/produk" class="flex items-center gap-2.5 shrink-0 group" id="nav-brand">
                <div class="brand-paw">🐾</div>
                <div class="leading-none">
                    <span class="text-lg font-black text-gray-800 tracking-tight">Paw<span class="text-peach">Store</span></span>
                    <p class="text-[10px] text-gray-400 font-nunito font-semibold tracking-widest uppercase mt-0.5">Petshop Management</p>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-1">
                <a href="/produk" class="nav-link" id="nav-produk">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="6" height="6" rx="1"/><rect x="9" y="3" width="6" height="6" rx="1"/><rect x="16" y="3" width="6" height="6" rx="1"/><rect x="2" y="10" width="6" height="6" rx="1"/><rect x="9" y="10" width="6" height="6" rx="1"/><rect x="16" y="10" width="6" height="6" rx="1"/><rect x="2" y="17" width="6" height="6" rx="1"/><rect x="9" y="17" width="6" height="6" rx="1"/><rect x="16" y="17" width="6" height="6" rx="1"/></svg>
                    Semua Produk
                </a>
                <a href="/produk/tambah" class="nav-link" id="nav-tambah">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-7-7h14"/></svg>
                    Tambah Produk
                </a>
            </nav>

            <!-- Right Side -->
            <div class="flex items-center gap-3">
                <a href="/produk/tambah" class="btn-cta-nav hidden sm:flex" id="nav-btn-tambah">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-7-7h14"/></svg>
                    Tambah
                </a>
                <!-- Mobile hamburger -->
                <button class="md:hidden p-2 rounded-xl text-gray-500 hover:bg-peach-light transition-colors" aria-label="Menu" id="mobile-menu-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
            </div>

        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden border-t border-peach-light/50" id="mobile-menu">
            <div class="px-4 py-3 flex flex-col gap-1">
                <a href="/produk" class="mobile-nav-link">🏪 Semua Produk</a>
                <a href="/produk/tambah" class="mobile-nav-link">➕ Tambah Produk</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 w-full max-w-screen-xl mx-auto px-4 sm:px-8 py-8 min-h-[calc(100vh-64px-60px)]">
        <!-- Flash Messages -->
        <?php if (session()->has('success')): ?>
        <div class="flash-success mb-6" id="flash-msg" data-aos="fade-down">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <?= session('success') ?>
            <button onclick="document.getElementById('flash-msg').remove()" class="ml-auto text-green-600 hover:text-green-800">✕</button>
        </div>
        <?php endif; ?>
        <?php if (session()->has('error')): ?>
        <div class="flash-error mb-6" id="flash-msg-err" data-aos="fade-down">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            <?= session('error') ?>
        </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <!-- Modal Slot -->
    <?= $this->renderSection('modals') ?>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-peach-light">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-gray-400 font-nunito">
            <span>🐾 © 2025 <strong class="text-peach">PawStore</strong> — Praktikum Web Programming Bab 5</span>
            <span class="font-mono">CodeIgniter 4 · PHP · MySQL · Tailwind CSS</span>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 650, easing: 'ease-out-cubic', once: true, offset: 30 });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu    = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>