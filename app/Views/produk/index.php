<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- ══════════════════════════════════════════════
     HERO SECTION
     ══════════════════════════════════════════════ -->
<section class="hero-section mb-12" data-aos="fade-up">
    <!-- Hero pakai bg_hero.jpg sebagai background, gradient transparan ke kiri -->
    <div class="hero-card-bg">
        <div class="hero-bg-img"></div>
        <div class="hero-bg-gradient"></div>
        <div class="hero-text hero-text-overlay">
            <span class="hero-badge" data-aos="fade-right" data-aos-delay="100">🐾 Petshop Management System</span>
            <h1 class="hero-title" data-aos="fade-right" data-aos-delay="150">
                Kelola Produk<br>
                <span class="hero-title-accent">Hewan Peliharaan</span><br>
                dengan Mudah
            </h1>
            <p class="hero-desc" data-aos="fade-right" data-aos-delay="200">
                Tambah, edit, dan hapus produk petshop dengan tampilan yang bersih,
                modern, dan menyenangkan. Semua data tersimpan rapi di database.
            </p>
            <div class="flex flex-wrap gap-3 mt-8" data-aos="fade-right" data-aos-delay="250">
                <a href="/produk/tambah" class="btn-hero-primary" id="hero-btn-tambah">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-7-7h14"/></svg>
                    Tambah Produk
                </a>
                <a href="#produk-list" class="btn-hero-secondary-dark" id="hero-btn-lihat">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                    Lihat Produk
                </a>
            </div>
            <!-- Stats row -->
            <div class="hero-stats mt-10" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <span class="stat-num stat-num-light"><?= count($produk ?? []) ?></span>
                    <span class="stat-label stat-label-light">Total Produk</span>
                </div>
                <div class="stat-divider stat-divider-light"></div>
                <div class="stat-item">
                    <span class="stat-num stat-num-light"><?= count(array_unique(array_column($produk ?? [], 'kategori'))) ?></span>
                    <span class="stat-label stat-label-light">Kategori</span>
                </div>
                <div class="stat-divider stat-divider-light"></div>
                <div class="stat-item">
                    <span class="stat-num stat-num-light"><?= array_sum(array_column($produk ?? [], 'stok')) ?></span>
                    <span class="stat-label stat-label-light">Total Stok</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════
     PRODUK LIST SECTION
     ══════════════════════════════════════════════ -->
<section id="produk-list" data-aos="fade-up" data-aos-delay="50">

    <!-- Section Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-800">Daftar Produk</h2>
            <p class="text-gray-500 text-sm mt-1 font-nunito">Kelola semua produk petshop kamu di sini</p>
        </div>
        <a href="/produk/tambah" class="btn-add-produk shrink-0" id="section-btn-tambah">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-7-7h14"/></svg>
            Tambah Produk
        </a>
    </div>

    <!-- Empty State -->
    <?php if (empty($produk)): ?>
    <div class="empty-state" data-aos="zoom-in">
        <div class="text-6xl mb-4">📦</div>
        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Produk</h3>
        <p class="text-gray-400 font-nunito mb-6">Yuk mulai tambahkan produk pertamamu!</p>
        <a href="/produk/tambah" class="btn-hero-primary" id="empty-btn-tambah">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-7-7h14"/></svg>
            Tambah Produk Sekarang
        </a>
    </div>

    <!-- Table -->
    <?php else: ?>
    <div class="table-wrapper table-no-scroll" data-aos="fade-up" data-aos-delay="100">
        <table class="produk-table" id="tabel-produk">
            <thead>
                <tr>
                    <th class="text-center w-10">#</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th class="text-right">Harga</th>
                    <th class="text-center">Stok</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $i => $p): ?>
                <tr class="table-row-item" data-aos="fade-up" data-aos-delay="<?= $i * 40 ?>">
                    <td class="text-center text-gray-400 font-mono text-sm"><?= $i + 1 ?></td>
                    <td>
                        <div class="flex items-center gap-3">
                            <!-- Gambar atau placeholder -->
                            <div class="product-img-thumb">
                                <?php if (!empty($p['gambar'])): ?>
                                    <img src="<?= esc($p['gambar']) ?>" alt="<?= esc($p['nama_produk']) ?>" class="w-full h-full object-cover rounded-xl">
                                <?php else: ?>
                                    <?= getKategoriIcon($p['kategori']) ?>
                                <?php endif; ?>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm leading-snug"><?= esc($p['nama_produk']) ?></p>
                                <p class="text-xs text-gray-400 font-mono">ID: <?= esc($p['id_produk']) ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-kategori badge-<?= strtolower(str_replace(' ', '-', $p['kategori'])) ?>">
                            <?= getKategoriIconSmall($p['kategori']) ?>
                            <?= esc($p['kategori']) ?>
                        </span>
                    </td>
                    <td class="text-right">
                        <span class="font-bold text-gray-800 text-sm">Rp <?= number_format($p['harga'], 0, ',', '.') ?></span>
                    </td>
                    <td class="text-center">
                        <span class="stok-badge <?= $p['stok'] <= 5 ? 'stok-rendah' : ($p['stok'] <= 20 ? 'stok-sedang' : 'stok-aman') ?>">
                            <?= $p['stok'] ?>
                        </span>
                    </td>
                    <td>
                        <p class="text-sm text-gray-500 font-nunito line-clamp-2 max-w-[200px]">
                            <?= esc($p['deskripsi'] ?? '—') ?>
                        </p>
                    </td>
                    <td>
                        <div class="flex items-center justify-center gap-2">
                            <!-- Tombol Edit (buka modal) -->
                            <button
                                class="btn-edit"
                                id="btn-edit-<?= $p['id_produk'] ?>"
                                onclick="openEditModal(
                                    <?= $p['id_produk'] ?>,
                                    '<?= addslashes(esc($p['nama_produk'])) ?>',
                                    '<?= esc($p['kategori']) ?>',
                                    <?= $p['harga'] ?>,
                                    <?= $p['stok'] ?>,
                                    '<?= addslashes(esc($p['deskripsi'] ?? '')) ?>',
                                    '<?= esc($p['gambar'] ?? '') ?>'
                                )"
                                title="Edit Produk">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </button>
                            <!-- Tombol Delete (buka modal) -->
                            <button
                                class="btn-delete"
                                id="btn-delete-<?= $p['id_produk'] ?>"
                                onclick="openDeleteModal(<?= $p['id_produk'] ?>, '<?= addslashes(esc($p['nama_produk'])) ?>')"
                                title="Hapus Produk">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6m4-6v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</section>

<?= $this->endSection() ?>

<!-- ══════════════════════════════════════════════
     MODAL: EDIT PRODUK
     ══════════════════════════════════════════════ -->
<?= $this->section('modals') ?>

<!-- EDIT MODAL -->
<div id="modal-edit" class="modal-overlay hidden" aria-modal="true" role="dialog">
    <div class="modal-box" data-aos="zoom-in">
        <div class="modal-header">
            <div class="flex items-center gap-3">
                <div class="modal-icon-edit">✏️</div>
                <div>
                    <h3 class="text-lg font-extrabold text-gray-800">Edit Produk</h3>
                    <p class="text-xs text-gray-400 font-nunito">Perbarui informasi produk</p>
                </div>
            </div>
            <button onclick="closeEditModal()" class="modal-close-btn" id="close-edit-modal" aria-label="Tutup">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <form id="form-edit" method="post" action="" class="modal-body">
            <?= csrf_field() ?>
            <div class="form-grid-2">
                <div class="form-group">
                    <label for="edit-nama" class="form-label">Nama Produk <span class="text-peach">*</span></label>
                    <input type="text" id="edit-nama" name="nama_produk" class="form-input" placeholder="cth: Royal Canin Adult" required>
                </div>
                <div class="form-group">
                    <label for="edit-kategori" class="form-label">Kategori <span class="text-peach">*</span></label>
                    <select id="edit-kategori" name="kategori" class="form-input" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Makanan">🍖 Makanan</option>
                        <option value="Aksesoris">🎀 Aksesoris</option>
                        <option value="Obat">💊 Obat</option>
                        <option value="Kandang">🏠 Kandang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-harga" class="form-label">Harga (Rp) <span class="text-peach">*</span></label>
                    <input type="number" id="edit-harga" name="harga" class="form-input" placeholder="0" min="0" required>
                </div>
                <div class="form-group">
                    <label for="edit-stok" class="form-label">Stok <span class="text-peach">*</span></label>
                    <input type="number" id="edit-stok" name="stok" class="form-input" placeholder="0" min="0" required>
                </div>
                <div class="form-group col-span-2">
                    <label for="edit-gambar" class="form-label">URL Gambar</label>
                    <input type="text" id="edit-gambar" name="gambar" class="form-input" placeholder="https://... (opsional)">
                </div>
                <div class="form-group col-span-2">
                    <label for="edit-deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="edit-deskripsi" name="deskripsi" rows="3" class="form-input resize-none" placeholder="Deskripsi singkat produk..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeEditModal()" class="btn-modal-cancel" id="cancel-edit">Batal</button>
                <button type="submit" class="btn-modal-save" id="submit-edit">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE MODAL -->
<div id="modal-delete" class="modal-overlay hidden" aria-modal="true" role="dialog">
    <div class="modal-box modal-box-sm">
        <div class="modal-header">
            <div class="flex items-center gap-3">
                <div class="modal-icon-delete">🗑️</div>
                <div>
                    <h3 class="text-lg font-extrabold text-gray-800">Hapus Produk</h3>
                    <p class="text-xs text-gray-400 font-nunito">Tindakan ini tidak bisa dibatalkan</p>
                </div>
            </div>
            <button onclick="closeDeleteModal()" class="modal-close-btn" id="close-delete-modal" aria-label="Tutup">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="px-6 py-4 text-center">
            <div class="text-5xl mb-3">😿</div>
            <p class="text-gray-600 font-nunito text-sm">
                Kamu yakin ingin menghapus produk<br>
                <strong class="text-gray-900 text-base" id="delete-produk-name">—</strong>?
            </p>
            <p class="text-xs text-red-400 mt-2 font-nunito">Data yang dihapus tidak dapat dikembalikan!</p>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeDeleteModal()" class="btn-modal-cancel" id="cancel-delete">Batal</button>
            <a href="#" id="delete-confirm-btn" class="btn-modal-delete">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                Ya, Hapus!
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- ══════════════════════════════════════════════
     SCRIPTS
     ══════════════════════════════════════════════ -->
<?= $this->section('scripts') ?>
<script>
// ─── Helper ─────────────────────────────────────────────────
function trapFocus(modal) {
    const focusable = modal.querySelectorAll('input, select, textarea, button, a[href]');
    if (focusable.length) focusable[0].focus();
}

// ─── Edit Modal ─────────────────────────────────────────────
function openEditModal(id, nama, kategori, harga, stok, deskripsi, gambar) {
    const modal = document.getElementById('modal-edit');
    document.getElementById('edit-nama').value      = nama;
    document.getElementById('edit-kategori').value  = kategori;
    document.getElementById('edit-harga').value     = harga;
    document.getElementById('edit-stok').value      = stok;
    document.getElementById('edit-deskripsi').value = deskripsi;
    document.getElementById('edit-gambar').value    = gambar;
    document.getElementById('form-edit').action     = '/produk/edit/' + id;

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    setTimeout(() => modal.querySelector('.modal-box').classList.add('modal-animate-in'), 10);
    trapFocus(modal);
}
function closeEditModal() {
    const modal = document.getElementById('modal-edit');
    modal.querySelector('.modal-box').classList.remove('modal-animate-in');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }, 200);
}

// ─── Delete Modal ────────────────────────────────────────────
function openDeleteModal(id, nama) {
    const modal = document.getElementById('modal-delete');
    document.getElementById('delete-produk-name').textContent = nama;
    document.getElementById('delete-confirm-btn').href = '/produk/hapus/' + id;

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    setTimeout(() => modal.querySelector('.modal-box').classList.add('modal-animate-in'), 10);
}
function closeDeleteModal() {
    const modal = document.getElementById('modal-delete');
    modal.querySelector('.modal-box').classList.remove('modal-animate-in');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }, 200);
}

// Tutup modal saat klik overlay
document.getElementById('modal-edit').addEventListener('click', function(e) {
    if (e.target === this) closeEditModal();
});
document.getElementById('modal-delete').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});

// Tutup modal dengan ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditModal();
        closeDeleteModal();
    }
});
</script>

<?php
// Helper: icon besar untuk product thumb (44x44px)
function getKategoriIcon($kategori) {
    $icons = [
        'Makanan' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#F97316" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>',
        'Aksesoris' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#A855F7" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'Obat' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"/><path d="m8.5 8.5 7 7"/></svg>',
        'Kandang' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
    ];
    return $icons[$kategori] ?? '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF8C69" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="4" r="2"/><circle cx="18" cy="8" r="2"/><circle cx="20" cy="16" r="2"/><path d="M9 10a5 5 0 0 0 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/></svg>';
}

// Helper: icon kecil inline untuk badge kategori
function getKategoriIconSmall($kategori) {
    $icons = [
        'Makanan'   => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>',
        'Aksesoris' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'Obat'      => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"/><path d="m8.5 8.5 7 7"/></svg>',
        'Kandang'   => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
    ];
    return $icons[$kategori] ?? '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="4" r="2"/><circle cx="18" cy="8" r="2"/><circle cx="20" cy="16" r="2"/><path d="M9 10a5 5 0 0 0 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/></svg>';
}
?>
<?= $this->endSection() ?>
