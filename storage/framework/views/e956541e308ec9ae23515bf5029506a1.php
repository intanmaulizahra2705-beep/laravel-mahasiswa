<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

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
                radial-gradient(circle at 88% 8%, #ffe3ef 0, transparent 34%),
                radial-gradient(circle at 8% 92%, #e4f1ff 0, transparent 36%),
                var(--bg);
        }

        h1, h2, h3, .btn, .badge, .chip { font-family: "Fredoka", sans-serif; }

        .layout {
            max-width: 1200px; margin: auto; padding: 28px;
            display: grid; grid-template-columns: 340px 1fr; gap: 32px; align-items: start;
        }

        /* ===== SIDEBAR ===== */
        .side {
            position: sticky; top: 28px; display: flex; flex-direction: column; gap: 18px;
            animation: slideIn .8s cubic-bezier(.2, 1.2, .4, 1) both;
        }

        .back {
            align-self: flex-start; display: inline-flex; align-items: center; gap: 8px;
            background: #fff; border-radius: 999px; padding: 10px 18px; color: var(--ink);
            text-decoration: none; font: 600 14px "Fredoka", sans-serif; box-shadow: var(--shadow);
            transition: transform .2s cubic-bezier(.3, 1.7, .5, 1);
        }
        .back:hover { transform: translateX(-5px); }

        .intro h1 { font-size: 36px; line-height: 1.05; margin-bottom: 8px; }
        .intro p { color: var(--muted); font-weight: 700; font-size: 14px; line-height: 1.5; }

        /* live preview card */
        .preview-label { font: 600 13px "Fredoka", sans-serif; color: var(--muted); margin-bottom: -6px; display: flex; align-items: center; gap: 8px; }
        .preview-label i { width: 9px; height: 9px; border-radius: 50%; background: #4ade80; animation: ping 1.8s infinite; }
        @keyframes ping { 0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, .6); } 80%, 100% { box-shadow: 0 0 0 9px rgba(74, 222, 128, 0); } }

        .card {
            position: relative; margin-top: 14px; background: #fff; border-radius: 30px; box-shadow: var(--shadow-lg);
            padding: 0 22px 22px; transform: rotate(-1.5deg);
            transition: transform .4s cubic-bezier(.3, 1.6, .5, 1);
        }
        .card:hover { transform: rotate(0) translateY(-6px); }
        .card::before {
            content: ""; position: absolute; top: -14px; left: 50%; width: 54px; height: 16px; margin-left: -27px;
            background: #fff; border: 4px solid var(--pink); border-bottom: 0; border-radius: 12px 12px 0 0;
        }
        .band { margin: 0 -22px; height: 74px; background: var(--pink); border-radius: 30px 30px 50% 50% / 30px 30px 26px 26px; }
        .avatar {
            width: 74px; height: 74px; margin: -38px auto 10px; border-radius: 50%;
            background: var(--pink); border: 5px solid #fff; box-shadow: 0 0 0 4px var(--pink);
            display: grid; place-items: center; font: 600 30px "Fredoka", sans-serif;
        }
        .avatar.bump { animation: bump .4s cubic-bezier(.3, 1.8, .5, 1); }
        @keyframes bump { 0% { transform: scale(.7) rotate(-12deg); } 100% { transform: none; } }

        .name { text-align: center; font: 600 19px "Fredoka", sans-serif; line-height: 1.2; word-break: break-word; }
        .nim { text-align: center; color: var(--muted); font-weight: 700; font-size: 13px; margin: 3px 0 14px; }
        .empty-val { opacity: .45; }

        .tags { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-bottom: 14px; }
        .badge { padding: 5px 13px; border-radius: 999px; font-size: 13px; font-weight: 500; }
        .badge-class { background: var(--butter); }
        .badge-semester { background: var(--mint); }

        .info { border-top: 2px dashed var(--line); padding-top: 12px; display: grid; gap: 6px; font-size: 13px; font-weight: 700; }
        .info div { display: flex; gap: 8px; align-items: center; }
        .info span { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

        /* ===== FORM ===== */
        .form-card {
            background: #fff; border-radius: 40px; box-shadow: var(--shadow-lg); padding: 36px;
            animation: pop .8s .1s cubic-bezier(.2, 1.3, .4, 1) both;
        }

        .form-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 26px; }
        .form-head h2 { font-size: 28px; margin-bottom: 4px; }
        .form-head p { color: var(--muted); font-weight: 600; font-size: 14px; }
        .chip { background: var(--butter); border-radius: 999px; padding: 7px 14px; font-size: 13px; font-weight: 500; white-space: nowrap; }

        .error-box { background: #ffe3e8; border-radius: 24px; padding: 16px 20px; margin-bottom: 24px; animation: shake .4s ease; }
        .error-box strong { display: block; font-family: "Fredoka", sans-serif; margin-bottom: 6px; }
        .error-box ul { padding-left: 20px; font-size: 13px; font-weight: 600; }
        .error-box li { margin-bottom: 3px; }

        fieldset { border: 0; margin-bottom: 28px; }
        legend {
            display: inline-flex; align-items: center; gap: 8px; margin-bottom: 16px;
            padding: 7px 16px; border-radius: 999px; font: 600 15px "Fredoka", sans-serif;
        }
        .f-id legend { background: var(--pink); }
        .f-ak legend { background: var(--sky); }
        .f-ko legend { background: var(--mint); }

        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .full { grid-column: 1 / -1; }

        label { display: block; font-weight: 800; font-size: 13px; margin: 0 0 8px 6px; transition: transform .2s; }
        .input-wrapper { position: relative; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 17px; pointer-events: none; transition: transform .3s cubic-bezier(.3, 1.8, .5, 1); }
        .input-wrapper:focus-within .input-icon { transform: translateY(-50%) scale(1.3) rotate(-10deg); }

        input {
            width: 100%; height: 52px; border: 2px solid var(--line); background: #fffafc; border-radius: 20px;
            padding: 0 16px 0 46px; font: 700 14px "Nunito", sans-serif; color: var(--ink); outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s, transform .2s;
        }
        input:hover { background: #fff; border-color: #e7d4e4; }
        input:focus { background: #fff; border-color: var(--lavender); box-shadow: 0 5px 0 rgba(205, 180, 246, .55); transform: translateY(-2px); }
        input::placeholder { color: #c0b6cc; font-weight: 600; }

        .helper, .counter { color: var(--muted); font-size: 12px; font-weight: 600; margin: 6px 0 0 6px; }
        .counter { text-align: right; margin-right: 6px; }

        .form-footer {
            display: flex; justify-content: space-between; align-items: center; gap: 16px;
            padding-top: 24px; border-top: 2px dashed var(--line);
        }
        .secure { color: var(--muted); font-size: 13px; font-weight: 700; }
        .buttons { display: flex; gap: 12px; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 50px;
            border: 0; border-radius: 999px; padding: 0 26px; font-size: 16px; font-weight: 600;
            color: var(--ink); text-decoration: none; cursor: pointer; background: #fff;
            box-shadow: 0 5px 0 rgba(74, 59, 92, .18); transition: transform .15s, box-shadow .15s;
        }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 0 rgba(74, 59, 92, .18); }
        .btn:active { transform: translateY(4px); box-shadow: 0 1px 0 rgba(74, 59, 92, .18); }
        .btn-cancel { background: #f3edf8; }
        .btn-save { background: var(--pink-deep); color: #fff; }
        .btn-save.loading { pointer-events: none; opacity: .75; }
        .spinner { width: 16px; height: 16px; border: 3px solid #fff; border-top-color: transparent; border-radius: 50%; animation: spin .7s linear infinite; }

        /* ===== TOAST ===== */
        .toast-container { position: fixed; top: 26px; right: 26px; z-index: 9999; }
        .toast {
            min-width: 320px; max-width: 420px; background: #fff; border-radius: 28px; padding: 16px 18px;
            box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 14px;
            animation: toastIn .7s cubic-bezier(.2, 1.4, .4, 1);
        }
        .toast-icon { width: 46px; height: 46px; border-radius: 18px; background: var(--rose); display: grid; place-items: center; font-size: 22px; flex-shrink: 0; }
        .toast strong { display: block; font-family: "Fredoka", sans-serif; }
        .toast span { color: var(--muted); font-size: 13px; font-weight: 600; }

        @keyframes slideIn { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: none; } }
        @keyframes pop { from { opacity: 0; transform: scale(.95) translateY(26px); } to { opacity: 1; transform: none; } }
        @keyframes toastIn { from { opacity: 0; transform: translateX(120px) scale(.9); } to { opacity: 1; transform: none; } }
        @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-6px); } 75% { transform: translateX(6px); } }
        @keyframes spin { to { transform: rotate(360deg); } }

        :focus-visible { outline: 3px solid var(--lavender); outline-offset: 3px; }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation: none !important; transition: none !important; } }

        @media (max-width: 920px) {
            .layout { grid-template-columns: 1fr; padding: 16px; gap: 24px; }
            .side { position: static; }
            .preview-wrap { max-width: 340px; width: 100%; }
        }
        @media (max-width: 600px) {
            .form-card { padding: 22px; border-radius: 32px; }
            .form-head { flex-direction: column; }
            .grid { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
            .form-footer { flex-direction: column-reverse; align-items: stretch; }
            .buttons { flex-direction: column-reverse; }
            .btn { width: 100%; }
            .toast-container { left: 14px; right: 14px; top: 14px; }
            .toast { min-width: 0; width: 100%; }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR: live preview -->
    <aside class="side">

        <a href="<?php echo e(route('mahasiswa.index')); ?>" class="back">← Kembali ke data</a>

        <div class="intro">
            <h1>Tambah mahasiswa</h1>
            <p>Isi formulir di samping. Kartu di bawah ikut berubah saat kamu mengetik.</p>
        </div>

        <div class="preview-wrap">
            <div class="preview-label"><i></i> Pratinjau kartu</div>

            <div class="card">
                <div class="band"></div>
                <div class="avatar" id="pvAvatar">?</div>

                <div class="name empty-val" id="pvNama">Nama mahasiswa</div>
                <div class="nim empty-val" id="pvNim">NIM belum diisi</div>

                <div class="tags">
                    <span class="badge badge-class empty-val" id="pvKelas">Kelas</span>
                    <span class="badge badge-semester empty-val" id="pvSemester">Semester</span>
                </div>

                <div class="info">
                    <div>💻 <span class="empty-val" id="pvJurusan">Jurusan</span></div>
                    <div>✉️ <span class="empty-val" id="pvEmail">Email</span></div>
                    <div>📱 <span class="empty-val" id="pvHp">Nomor HP</span></div>
                </div>
            </div>
        </div>

    </aside>

    <!-- FORM -->
    <main class="form-card">

        <div class="form-head">
            <div>
                <h2>Informasi mahasiswa</h2>
                <p>Masukkan data dengan benar dan lengkap.</p>
            </div>
            <span class="chip">Semua kolom wajib diisi</span>
        </div>

        <?php if($errors->any()): ?>
            <div class="error-box">
                <strong>⚠️ Ada data yang perlu diperbaiki</strong>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('mahasiswa.store')); ?>" method="POST" id="studentForm">
            <?php echo csrf_field(); ?>

            <!-- IDENTITAS -->
            <fieldset class="f-id">
                <legend>🪪 Identitas</legend>
                <div class="grid">

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <div class="input-wrapper">
                            <span class="input-icon">🪪</span>
                            <input type="text" id="nim" name="nim" value="<?php echo e(old('nim')); ?>"
                                   placeholder="Contoh: 23105111089" maxlength="20" required>
                        </div>
                        <div class="helper">Nomor identitas mahasiswa.</div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama lengkap</label>
                        <div class="input-wrapper">
                            <span class="input-icon">👤</span>
                            <input type="text" id="nama" name="nama" value="<?php echo e(old('nama')); ?>"
                                   placeholder="Contoh: Arman Muharrir" maxlength="255" required>
                        </div>
                        <div class="counter"><span id="namaCounter">0</span>/255</div>
                    </div>

                </div>
            </fieldset>

            <!-- AKADEMIK -->
            <fieldset class="f-ak">
                <legend>📚 Informasi akademik</legend>
                <div class="grid">

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div class="input-wrapper">
                            <span class="input-icon">🏫</span>
                            <input type="text" id="kelas" name="kelas" value="<?php echo e(old('kelas')); ?>"
                                   placeholder="Contoh: FTI-06" maxlength="20" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <div class="input-wrapper">
                            <span class="input-icon">📚</span>
                            <input type="number" id="semester" name="semester" value="<?php echo e(old('semester')); ?>"
                                   placeholder="Contoh: 3" min="1" max="14" required>
                        </div>
                        <div class="helper">Masukkan semester 1–14.</div>
                    </div>

                    <div class="form-group full">
                        <label for="jurusan">Jurusan</label>
                        <div class="input-wrapper">
                            <span class="input-icon">💻</span>
                            <input type="text" id="jurusan" name="jurusan" value="<?php echo e(old('jurusan')); ?>"
                                   placeholder="Contoh: Teknik Informatika" maxlength="255" required>
                        </div>
                    </div>

                </div>
            </fieldset>

            <!-- KONTAK -->
            <fieldset class="f-ko">
                <legend>💌 Informasi kontak</legend>
                <div class="grid">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon">✉️</span>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"
                                   placeholder="nama@email.com" maxlength="255" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <div class="input-wrapper">
                            <span class="input-icon">📱</span>
                            <input type="text" id="no_hp" name="no_hp" value="<?php echo e(old('no_hp')); ?>"
                                   placeholder="081234567890" maxlength="20" required>
                        </div>
                    </div>

                </div>
            </fieldset>

            <!-- FOOTER -->
            <div class="form-footer">
                <div class="secure">🔒 Data akan divalidasi sebelum disimpan.</div>

                <div class="buttons">
                    <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-cancel">Batal</a>

                    <button type="submit" class="btn btn-save" id="saveButton">
                        <span id="buttonIcon">✓</span>
                        <span id="buttonText">Simpan mahasiswa</span>
                    </button>
                </div>
            </div>

        </form>

    </main>

</div>

<!-- TOAST ERROR -->
<?php if($errors->any()): ?>
<div class="toast-container">
    <div class="toast">
        <div class="toast-icon">⚠️</div>
        <div>
            <strong>Data belum lengkap</strong>
            <span>Periksa kembali form kamu.</span>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
    /* ===== LIVE PREVIEW ===== */
    const fields = {
        nama:     { el: document.getElementById('pvNama'),     fallback: 'Nama mahasiswa' },
        nim:      { el: document.getElementById('pvNim'),      fallback: 'NIM belum diisi' },
        kelas:    { el: document.getElementById('pvKelas'),    fallback: 'Kelas' },
        semester: { el: document.getElementById('pvSemester'), fallback: 'Semester', format: v => 'Semester ' + v },
        jurusan:  { el: document.getElementById('pvJurusan'),  fallback: 'Jurusan' },
        email:    { el: document.getElementById('pvEmail'),    fallback: 'Email' },
        no_hp:    { el: document.getElementById('pvHp'),       fallback: 'Nomor HP' },
    };

    const avatar = document.getElementById('pvAvatar');
    let lastInitial = '?';

    function updatePreview(id) {
        const input = document.getElementById(id);
        const f = fields[id];
        const value = input.value.trim();

        f.el.textContent = value ? (f.format ? f.format(value) : value) : f.fallback;
        f.el.classList.toggle('empty-val', !value);

        if (id === 'nama') {
            const initial = value ? value.charAt(0).toUpperCase() : '?';
            if (initial !== lastInitial) {
                avatar.textContent = initial;
                avatar.classList.remove('bump');
                void avatar.offsetWidth;
                avatar.classList.add('bump');
                lastInitial = initial;
            }
        }
    }

    Object.keys(fields).forEach(id => {
        const input = document.getElementById(id);
        input.addEventListener('input', () => updatePreview(id));
        updatePreview(id); // isi awal dari old()
    });

    /* ===== NAMA COUNTER ===== */
    const nama = document.getElementById('nama');
    const counter = document.getElementById('namaCounter');
    const updateCounter = () => counter.textContent = nama.value.length;
    nama.addEventListener('input', updateCounter);
    updateCounter();

    /* ===== FORM LOADING ===== */
    const form = document.getElementById('studentForm');
    const button = document.getElementById('saveButton');

    form.addEventListener('submit', function () {
        if (!form.checkValidity()) return;
        button.classList.add('loading');
        document.getElementById('buttonIcon').innerHTML = '<span class="spinner"></span>';
        document.getElementById('buttonText').textContent = 'Menyimpan...';
    });

    /* ===== LABEL NUDGE ===== */
    document.querySelectorAll('input').forEach(input => {
        const label = input.closest('.form-group').querySelector('label');
        input.addEventListener('focus', () => label.style.transform = 'translateX(4px)');
        input.addEventListener('blur', () => label.style.transform = '');
    });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-2\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>