<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Nunito:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #fff7f2;
            --ink: #4a3b5c;
            --muted: #9a8fa8;
            --pink: #ffc8dd;
            --pink-deep: #ff9ec4;
            --lavender: #cdb4f6;
            --sky: #bde0fe;
            --mint: #b8f0d0;
            --butter: #fff0a6;
            --rose: #ffb3c1;
            --line: #f1e4ee;
            --shadow: 0 6px 0 rgba(74, 59, 92, .12);
            --shadow-lg: 0 10px 0 rgba(74, 59, 92, .14);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: "Nunito", sans-serif;
            color: var(--ink);
            min-height: 100vh;
            background:
                radial-gradient(circle at 85% 6%, #ffe3ef 0, transparent 34%),
                radial-gradient(circle at 10% 90%, #e4f1ff 0, transparent 36%),
                var(--bg);
        }

        h1, h2, h3, .num, .btn, .badge, .chip { font-family: "Fredoka", sans-serif; }

        /* ===== LAYOUT: sidebar + main ===== */
        .layout {
            max-width: 1360px;
            margin: auto;
            padding: 28px;
            display: grid;
            grid-template-columns: 310px 1fr;
            gap: 32px;
            align-items: start;
        }

        /* ===== SIDEBAR ===== */
        .side {
            position: sticky;
            top: 28px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            animation: slideIn .8s cubic-bezier(.2, 1.2, .4, 1) both;
        }

        .brand {
            position: relative;
            background: linear-gradient(160deg, var(--lavender), var(--pink));
            border-radius: 44px 44px 44px 14px;
            padding: 28px 26px 26px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }
        .brand::after {
            content: ""; position: absolute; width: 150px; height: 150px; border-radius: 50%;
            background: rgba(255, 255, 255, .3); right: -50px; bottom: -50px;
        }

        .mascot {
            width: 84px; height: 84px; border-radius: 50% 50% 46% 54%;
            background: #fff; display: grid; place-items: center; font-size: 44px;
            box-shadow: var(--shadow); margin-bottom: 18px;
            animation: wobble 3.2s ease-in-out infinite; transform-origin: bottom center;
        }
        @keyframes wobble { 0%, 100% { transform: rotate(-7deg); } 50% { transform: rotate(7deg) translateY(-5px); } }

        .brand h1 { font-size: 40px; line-height: 1; color: #fff; text-shadow: 0 3px 0 rgba(74, 59, 92, .22); margin-bottom: 8px; }
        .brand p { color: #fff; font-weight: 700; font-size: 14px; line-height: 1.45; position: relative; z-index: 1; }

        .status {
            margin-top: 16px; display: inline-flex; align-items: center; gap: 8px;
            background: #fff; border-radius: 999px; padding: 7px 14px; font-weight: 800; font-size: 13px;
            position: relative; z-index: 1;
        }
        .status i { width: 10px; height: 10px; border-radius: 50%; background: #4ade80; animation: ping 1.8s infinite; }
        @keyframes ping { 0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, .6); } 80%, 100% { box-shadow: 0 0 0 10px rgba(74, 222, 128, 0); } }

        /* stats as stickers */
        .stat {
            display: flex; align-items: center; gap: 14px;
            border-radius: 28px; padding: 14px 18px; box-shadow: var(--shadow);
            transition: transform .3s cubic-bezier(.3, 1.7, .5, 1);
        }
        .stat:nth-of-type(1) { background: var(--sky); transform: rotate(-1.5deg); }
        .stat:nth-of-type(2) { background: var(--butter); transform: rotate(1.2deg); margin-left: 14px; }
        .stat:nth-of-type(3) { background: var(--mint); transform: rotate(-1deg); }
        .stat:hover { transform: rotate(0) scale(1.04); }
        .stat .ico { width: 46px; height: 46px; border-radius: 16px; background: rgba(255, 255, 255, .75); display: grid; place-items: center; font-size: 22px; }
        .num { font-size: 28px; font-weight: 700; line-height: 1; }
        .stat small { display: block; font-weight: 700; font-size: 13px; opacity: .7; margin-top: 3px; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            border: 0; border-radius: 999px; padding: 14px 24px; font-size: 16px; font-weight: 600;
            color: var(--ink); text-decoration: none; cursor: pointer; background: #fff;
            box-shadow: 0 5px 0 rgba(74, 59, 92, .18); transition: transform .15s, box-shadow .15s;
        }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 0 rgba(74, 59, 92, .18); }
        .btn:active { transform: translateY(4px); box-shadow: 0 1px 0 rgba(74, 59, 92, .18); }
        .btn-add { background: var(--pink-deep); color: #fff; font-size: 17px; padding: 16px 24px; }
        .btn-add span { display: inline-block; transition: transform .35s cubic-bezier(.3, 1.6, .5, 1); }
        .btn-add:hover span { transform: rotate(180deg) scale(1.2); }

        /* ===== MAIN ===== */
        .main-head {
            display: flex; justify-content: space-between; align-items: flex-end; gap: 16px; flex-wrap: wrap;
            margin-bottom: 26px; animation: fadeIn .8s .2s both;
        }
        .main-head h2 { font-size: 32px; line-height: 1.1; }
        .main-head p { color: var(--muted); font-weight: 600; margin-top: 4px; }

        .tools { display: flex; align-items: center; gap: 12px; }
        .search {
            display: flex; align-items: center; gap: 10px; background: #fff; border-radius: 999px;
            padding: 11px 18px; box-shadow: var(--shadow); min-width: 260px;
            transition: transform .2s, box-shadow .2s;
        }
        .search:focus-within { transform: translateY(-2px); box-shadow: 0 9px 0 rgba(205, 180, 246, .55); }
        .search input { border: 0; outline: 0; background: none; font: 700 14px "Nunito", sans-serif; color: var(--ink); width: 100%; }
        .search input::placeholder { color: var(--muted); }
        .chip { background: var(--lavender); color: #fff; border-radius: 999px; padding: 9px 16px; font-weight: 600; font-size: 14px; white-space: nowrap; }

        /* ===== ID CARDS ===== */
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px 24px; padding-top: 22px; }

        .card {
            --c: var(--pink);
            position: relative; background: #fff; border-radius: 30px; box-shadow: var(--shadow-lg);
            padding: 0 22px 20px; transform: rotate(var(--r, 0deg));
            transition: transform .35s cubic-bezier(.3, 1.6, .5, 1), box-shadow .3s;
            animation: cardIn .6s cubic-bezier(.2, 1.4, .4, 1) both;
        }
        .card:nth-child(4n+1) { --c: var(--pink); --r: -1.2deg; }
        .card:nth-child(4n+2) { --c: var(--sky); --r: .8deg; }
        .card:nth-child(4n+3) { --c: var(--mint); --r: -.6deg; }
        .card:nth-child(4n+4) { --c: var(--butter); --r: 1.2deg; }
        .card:nth-child(1) { animation-delay: .25s; } .card:nth-child(2) { animation-delay: .33s; }
        .card:nth-child(3) { animation-delay: .41s; } .card:nth-child(4) { animation-delay: .49s; }
        .card:nth-child(n+5) { animation-delay: .57s; }
        .card:hover { transform: rotate(0) translateY(-8px); box-shadow: 0 18px 0 rgba(74, 59, 92, .14); }

        /* lanyard slot */
        .card::before {
            content: ""; position: absolute; top: -14px; left: 50%; width: 54px; height: 16px; margin-left: -27px;
            background: #fff; border: 4px solid var(--c); border-radius: 12px 12px 0 0; border-bottom: 0;
        }

        .band {
            margin: 0 -22px; height: 78px; background: var(--c); border-radius: 30px 30px 50% 50% / 30px 30px 26px 26px;
            display: flex; justify-content: space-between; align-items: flex-start; padding: 16px 20px 0;
        }
        .no { font-family: "Fredoka", sans-serif; font-weight: 600; font-size: 13px; background: rgba(255, 255, 255, .7); border-radius: 999px; padding: 3px 11px; }

        .avatar {
            width: 74px; height: 74px; margin: -38px auto 10px; border-radius: 50%; position: relative;
            background: #fff; border: 5px solid #fff; box-shadow: 0 0 0 4px var(--c);
            display: grid; place-items: center; font: 600 30px "Fredoka", sans-serif; color: var(--ink);
            background: var(--c); transition: transform .4s cubic-bezier(.3, 1.8, .5, 1);
        }
        .card:hover .avatar { transform: rotate(-10deg) scale(1.12); }

        .name { text-align: center; font: 600 19px "Fredoka", sans-serif; line-height: 1.2; }
        .nim { text-align: center; color: var(--muted); font-weight: 700; font-size: 13px; margin: 3px 0 14px; }

        .tags { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-bottom: 14px; }
        .badge { padding: 5px 13px; border-radius: 999px; font-size: 13px; font-weight: 500; }
        .badge-class { background: var(--butter); }
        .badge-semester { background: var(--mint); }

        .info { border-top: 2px dashed var(--line); padding-top: 12px; display: grid; gap: 6px; font-size: 13px; font-weight: 700; }
        .info div { display: flex; gap: 8px; align-items: center; }
        .info span { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

        .actions { display: flex; justify-content: center; gap: 10px; margin-top: 16px; }
        .action-btn {
            width: 40px; height: 40px; border: 0; border-radius: 15px; display: grid; place-items: center;
            text-decoration: none; cursor: pointer; font-size: 17px; box-shadow: 0 3px 0 rgba(74, 59, 92, .14);
            transition: transform .2s cubic-bezier(.3, 1.8, .5, 1), box-shadow .2s;
        }
        .action-btn:hover { transform: translateY(-4px) rotate(-6deg) scale(1.1); box-shadow: 0 7px 0 rgba(74, 59, 92, .14); }
        .detail { background: var(--sky); } .edit { background: var(--butter); } .delete { background: var(--rose); }

        /* ===== EMPTY ===== */
        .empty { grid-column: 1 / -1; text-align: center; padding: 70px 20px; background: #fff; border-radius: 36px; box-shadow: var(--shadow-lg); }
        .empty .big { font-size: 64px; margin-bottom: 12px; animation: wobble 3s ease-in-out infinite; }
        .empty h3 { font-size: 24px; margin-bottom: 6px; }
        .empty p { color: var(--muted); font-weight: 600; margin-bottom: 22px; }
        #noResult { display: none; }

        /* ===== TOAST ===== */
        .toast {
            position: fixed; right: 26px; top: 26px; z-index: 9999; min-width: 320px; max-width: 420px;
            background: #fff; border-radius: 28px; padding: 16px 18px; box-shadow: var(--shadow-lg);
            display: flex; align-items: center; gap: 14px; animation: toastIn .7s cubic-bezier(.2, 1.4, .4, 1);
        }
        .toast-icon { width: 46px; height: 46px; border-radius: 18px; background: var(--mint); display: grid; place-items: center; font-size: 22px; flex-shrink: 0; }
        .toast-content strong { display: block; font-family: "Fredoka", sans-serif; }
        .toast-content span { color: var(--muted); font-size: 13px; font-weight: 600; }
        .toast-close { margin-left: auto; border: 0; background: none; font-size: 24px; color: var(--muted); cursor: pointer; }
        .toast.hide { animation: toastOut .4s ease forwards; }

        /* ===== MODAL ===== */
        .modal { position: fixed; inset: 0; z-index: 5000; padding: 20px; background: rgba(74, 59, 92, .35); backdrop-filter: blur(4px); display: none; align-items: center; justify-content: center; }
        .modal.active { display: flex; animation: fadeIn .2s ease; }
        .modal-box { width: 100%; max-width: 420px; background: #fff; border-radius: 36px; padding: 32px 30px 28px; box-shadow: var(--shadow-lg); text-align: center; animation: pop .45s cubic-bezier(.2, 1.5, .4, 1); }
        .modal-icon { width: 76px; height: 76px; margin: 0 auto 16px; border-radius: 28px; background: var(--rose); display: grid; place-items: center; font-size: 36px; animation: wobble 2.4s ease-in-out infinite; }
        .modal-box h3 { font-size: 24px; margin-bottom: 8px; }
        .modal-box p { color: var(--muted); font-weight: 600; line-height: 1.55; margin-bottom: 24px; }
        .modal-box p strong { color: var(--ink); }
        .modal-buttons { display: flex; justify-content: center; gap: 12px; }
        .btn-cancel { background: #f3edf8; }
        .btn-confirm { background: var(--pink-deep); color: #fff; }

        /* ===== ANIMATIONS ===== */
        @keyframes slideIn { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: none; } }
        @keyframes cardIn { from { opacity: 0; transform: translateY(40px) rotate(0) scale(.9); } to { opacity: 1; transform: rotate(var(--r, 0deg)); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pop { from { opacity: 0; transform: scale(.88) translateY(20px); } to { opacity: 1; transform: none; } }
        @keyframes toastIn { from { opacity: 0; transform: translateX(120px) scale(.9); } to { opacity: 1; transform: none; } }
        @keyframes toastOut { to { opacity: 0; transform: translateX(120px); } }

        :focus-visible { outline: 3px solid var(--lavender); outline-offset: 3px; }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation: none !important; transition: none !important; } }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 960px) {
            .layout { grid-template-columns: 1fr; padding: 16px; gap: 24px; }
            .side { position: static; display: grid; grid-template-columns: 1fr 1fr; }
            .brand, .btn-add { grid-column: 1 / -1; }
            .stat:nth-of-type(2) { margin-left: 0; }
        }
        @media (max-width: 560px) {
            .side { grid-template-columns: 1fr; }
            .search { min-width: 0; flex: 1; }
            .tools { width: 100%; }
            .toast { left: 14px; right: 14px; top: 14px; min-width: auto; }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="side">

        <div class="brand">
            <div class="mascot">🎓</div>
            <h1>Mahasiswa</h1>
            <p>Kelola data mahasiswa dengan lebih sederhana ✨</p>
            <div class="status"><i></i> Sistem aktif</div>
        </div>

        <div class="stat">
            <div class="ico">👥</div>
            <div>
                <div class="num"><?php echo e($mahasiswas->count()); ?></div>
                <small>Total mahasiswa</small>
            </div>
        </div>

        <div class="stat">
            <div class="ico">🏫</div>
            <div>
                <div class="num"><?php echo e($mahasiswas->unique('kelas')->count()); ?></div>
                <small>Kelas terdaftar</small>
            </div>
        </div>

        <div class="stat">
            <div class="ico">💻</div>
            <div>
                <div class="num"><?php echo e($mahasiswas->unique('jurusan')->count()); ?></div>
                <small>Jurusan</small>
            </div>
        </div>

        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-add">
            <span>＋</span> Tambah mahasiswa
        </a>

    </aside>

    <!-- MAIN -->
    <main>

        <div class="main-head">
            <div>
                <h2>Daftar mahasiswa</h2>
                <p>Data mahasiswa yang tersimpan di sistem.</p>
            </div>

            <div class="tools">
                <label class="search">
                    🔍
                    <input type="search" id="search" placeholder="Cari nama, NIM, atau kelas" autocomplete="off">
                </label>
                <span class="chip"><?php echo e($mahasiswas->count()); ?> data</span>
            </div>
        </div>

        <div class="grid" id="grid">

            <?php $__empty_1 = true; $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <article class="card" data-search="<?php echo e(strtolower($mahasiswa->nama . ' ' . $mahasiswa->nim . ' ' . $mahasiswa->kelas . ' ' . $mahasiswa->jurusan)); ?>">

                    <div class="band">
                        <span class="no">#<?php echo e($loop->iteration); ?></span>
                    </div>

                    <div class="avatar">
                        <?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?>

                    </div>

                    <div class="name"><?php echo e($mahasiswa->nama); ?></div>
                    <div class="nim"><?php echo e($mahasiswa->nim); ?></div>

                    <div class="tags">
                        <span class="badge badge-class"><?php echo e($mahasiswa->kelas); ?></span>
                        <span class="badge badge-semester">Semester <?php echo e($mahasiswa->semester); ?></span>
                    </div>

                    <div class="info">
                        <div>💻 <span><?php echo e($mahasiswa->jurusan); ?></span></div>
                        <div>✉️ <span><?php echo e($mahasiswa->email); ?></span></div>
                    </div>

                    <div class="actions">
                        <a href="<?php echo e(route('mahasiswa.show', $mahasiswa)); ?>" class="action-btn detail" title="Detail">👁</a>
                        <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>" class="action-btn edit" title="Edit">✏️</a>
                        <button
                            type="button"
                            class="action-btn delete"
                            title="Hapus"
                            onclick="openDeleteModal('<?php echo e(route('mahasiswa.destroy', $mahasiswa)); ?>', '<?php echo e($mahasiswa->nama); ?>')"
                        >🗑</button>
                    </div>

                </article>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="empty">
                    <div class="big">📭</div>
                    <h3>Belum ada mahasiswa</h3>
                    <p>Tambahkan data mahasiswa pertama untuk memulai.</p>
                    <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-add"><span>＋</span> Tambah mahasiswa</a>
                </div>

            <?php endif; ?>

            <div class="empty" id="noResult">
                <div class="big">🔎</div>
                <h3>Tidak ada yang cocok</h3>
                <p>Coba kata kunci lain, misalnya nama atau NIM.</p>
            </div>

        </div>

    </main>

</div>

<!-- SUCCESS TOAST -->
<?php if(session('success')): ?>
<div class="toast" id="toast">
    <div class="toast-icon">✓</div>
    <div class="toast-content">
        <strong>Berhasil! 🎉</strong>
        <span><?php echo e(session('success')); ?></span>
    </div>
    <button class="toast-close" onclick="closeToast()" aria-label="Tutup">×</button>
</div>
<?php endif; ?>

<!-- DELETE MODAL -->
<div class="modal" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">🥺</div>
        <h3>Hapus mahasiswa?</h3>
        <p>
            Data <strong id="deleteName"></strong>
            akan dihapus dari database. Tindakan ini tidak bisa dibatalkan.
        </p>
        <div class="modal-buttons">
            <button type="button" class="btn btn-cancel" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-confirm">Ya, hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    /* TOAST */
    function closeToast() {
        const toast = document.getElementById('toast');
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 400);
        }
    }
    setTimeout(closeToast, 4000);

    /* SEARCH */
    const search = document.getElementById('search');
    search.addEventListener('input', function () {
        const q = this.value.trim().toLowerCase();
        const cards = document.querySelectorAll('.card');
        let shown = 0;

        cards.forEach(card => {
            const match = card.dataset.search.includes(q);
            card.style.display = match ? '' : 'none';
            if (match) shown++;
        });

        document.getElementById('noResult').style.display =
            (cards.length > 0 && shown === 0) ? 'block' : 'none';
    });

    /* DELETE MODAL */
    function openDeleteModal(action, name) {
        document.getElementById('deleteForm').action = action;
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteModal').classList.add('active');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('active');
    }

    document.getElementById('deleteModal').addEventListener('click', function (e) {
        if (e.target === this) closeDeleteModal();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-2\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>