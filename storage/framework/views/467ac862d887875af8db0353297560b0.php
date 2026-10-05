<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

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

        /* change tracker */
        .tracker {
            display: flex; align-items: center; gap: 12px; background: #fff; border-radius: 24px;
            padding: 12px 16px; box-shadow: var(--shadow); font-weight: 800; font-size: 14px;
            transition: background .3s;
        }
        .tracker .dot { width: 34px; height: 34px; border-radius: 12px; background: var(--mint); display: grid; place-items: center; font-size: 17px; transition: background .3s, transform .4s cubic-bezier(.3, 1.8, .5, 1); }
        .tracker.dirty { background: #fffbe0; }
        .tracker.dirty .dot { background: var(--butter); transform: rotate(-10deg) scale(1.1); }

        /* live preview card */
        .card {
            position: relative; margin-top: 14px; background: #fff; border-radius: 30px; box-shadow: var(--shadow-lg);
            padding: 0 22px 22px; transform: rotate(1.4deg);
            transition: transform .4s cubic-bezier(.3, 1.6, .5, 1);
        }
        .card:hover { transform: rotate(0) translateY(-6px); }
        .card::before {
            content: ""; position: absolute; top: -14px; left: 50%; width: 54px; height: 16px; margin-left: -27px;
            background: #fff; border: 4px solid var(--lavender); border-bottom: 0; border-radius: 12px 12px 0 0;
        }
        .band { margin: 0 -22px; height: 74px; background: var(--lavender); border-radius: 30px 30px 50% 50% / 30px 30px 26px 26px; }
        .avatar {
            width: 74px; height: 74px; margin: -38px auto 10px; border-radius: 50%;
            background: var(--lavender); border: 5px solid #fff; box-shadow: 0 0 0 4px var(--lavender);
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

        .btn-reset {
            min-height: 40px; padding: 0 18px; font-size: 14px; background: #f3edf8; white-space: nowrap;
            box-shadow: 0 4px 0 rgba(74, 59, 92, .15);
        }

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

        .label-row { display: flex; justify-content: space-between; align-items: center; margin: 0 6px 8px; min-height: 22px; }
        label { font-weight: 800; font-size: 13px; transition: transform .2s; }
        .changed {
            font: 600 11px "Fredoka", sans-serif; background: var(--butter); border-radius: 999px; padding: 2px 10px;
            display: none; animation: bump .4s cubic-bezier(.3, 1.8, .5, 1);
        }
        .form-group.is-changed .changed { display: inline-block; }

        .input-wrapper { position: relative; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 17px; pointer-events: none; transition: transform .3s cubic-bezier(.3, 1.8, .5, 1); }
        .input-wrapper:focus-within .input-icon { transform: translateY(-50%) scale(1.3) rotate(-10deg); }

        input, select {
            width: 100%; height: 52px; border: 2px solid var(--line); background: #fffafc; border-radius: 20px;
            padding: 0 16px 0 46px; font: 700 14px "Nunito", sans-serif; color: var(--ink); outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s, transform .2s;
        }
        select {
            appearance: none; -webkit-appearance: none; cursor: pointer; padding-right: 44px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='9' viewBox='0 0 14 9'%3E%3Cpath d='M1 1l6 6 6-6' fill='none' stroke='%239a8fa8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 18px center;
        }
        input:hover, select:hover { background-color: #fff; border-color: #e7d4e4; }
        input:focus, select:focus { background-color: #fff; border-color: var(--lavender); box-shadow: 0 5px 0 rgba(205, 180, 246, .55); transform: translateY(-2px); }
        .is-changed input, .is-changed select { border-color: #f5dd6b; background-color: #fffdf0; }

        .helper { color: var(--muted); font-size: 12px; font-weight: 600; margin: 6px 0 0 6px; }

        .form-footer {
            display: flex; justify-content: flex-end; align-items: center; gap: 12px;
            padding-top: 24px; border-top: 2px dashed var(--line);
        }

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

        @keyframes slideIn { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: none; } }
        @keyframes pop { from { opacity: 0; transform: scale(.95) translateY(26px); } to { opacity: 1; transform: none; } }
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
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="side">

        <a href="<?php echo e(route('mahasiswa.index')); ?>" class="back">← Kembali ke data</a>

        <div class="intro">
            <h1>Edit mahasiswa</h1>
            <p>Ubah data yang perlu diperbarui. Kolom yang berubah ditandai kuning.</p>
        </div>

        <div class="tracker" id="tracker">
            <div class="dot" id="trackerDot">✓</div>
            <span id="trackerText">Belum ada perubahan</span>
        </div>

        <div class="preview-wrap">
            <div class="card">
                <div class="band"></div>
                <div class="avatar" id="pvAvatar"><?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?></div>

                <div class="name" id="pvNama"><?php echo e($mahasiswa->nama); ?></div>
                <div class="nim" id="pvNim"><?php echo e($mahasiswa->nim); ?></div>

                <div class="tags">
                    <span class="badge badge-class" id="pvKelas"><?php echo e($mahasiswa->kelas); ?></span>
                    <span class="badge badge-semester" id="pvSemester">Semester <?php echo e($mahasiswa->semester); ?></span>
                </div>

                <div class="info">
                    <div>💻 <span id="pvJurusan"><?php echo e($mahasiswa->jurusan); ?></span></div>
                    <div>✉️ <span id="pvEmail"><?php echo e($mahasiswa->email); ?></span></div>
                    <div>📱 <span id="pvHp"><?php echo e($mahasiswa->no_hp); ?></span></div>
                </div>
            </div>
        </div>

    </aside>

    <!-- FORM -->
    <main class="form-card">

        <div class="form-head">
            <div>
                <h2>Informasi mahasiswa</h2>
                <p>Silakan ubah data yang ingin diperbarui.</p>
            </div>
            <button type="button" class="btn btn-reset" id="resetBtn">↺ Kembalikan data awal</button>
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

        <form action="<?php echo e(route('mahasiswa.update', $mahasiswa)); ?>" method="POST" id="editForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- IDENTITAS -->
            <fieldset class="f-id">
                <legend>🪪 Identitas</legend>
                <div class="grid">

                    <div class="form-group">
                        <div class="label-row"><label for="nim">NIM</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">🪪</span>
                            <input type="text" id="nim" name="nim" value="<?php echo e(old('nim', $mahasiswa->nim)); ?>"
                                   data-original="<?php echo e($mahasiswa->nim); ?>" maxlength="20" required>
                        </div>
                        <div class="helper">Nomor induk mahasiswa.</div>
                    </div>

                    <div class="form-group">
                        <div class="label-row"><label for="nama">Nama lengkap</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">👤</span>
                            <input type="text" id="nama" name="nama" value="<?php echo e(old('nama', $mahasiswa->nama)); ?>"
                                   data-original="<?php echo e($mahasiswa->nama); ?>" maxlength="255" required>
                        </div>
                        <div class="helper">Gunakan nama lengkap mahasiswa.</div>
                    </div>

                </div>
            </fieldset>

            <!-- AKADEMIK -->
            <fieldset class="f-ak">
                <legend>📚 Informasi akademik</legend>
                <div class="grid">

                    <div class="form-group">
                        <div class="label-row"><label for="kelas">Kelas</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">🏫</span>
                            <input type="text" id="kelas" name="kelas" value="<?php echo e(old('kelas', $mahasiswa->kelas)); ?>"
                                   data-original="<?php echo e($mahasiswa->kelas); ?>" maxlength="20" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-row"><label for="semester">Semester</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">📚</span>
                            <select id="semester" name="semester" data-original="<?php echo e($mahasiswa->semester); ?>" required>
                                <?php for($i = 1; $i <= 14; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(old('semester', $mahasiswa->semester) == $i ? 'selected' : ''); ?>>
                                        Semester <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full">
                        <div class="label-row"><label for="jurusan">Jurusan</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">💻</span>
                            <input type="text" id="jurusan" name="jurusan" value="<?php echo e(old('jurusan', $mahasiswa->jurusan)); ?>"
                                   data-original="<?php echo e($mahasiswa->jurusan); ?>" maxlength="255" required>
                        </div>
                    </div>

                </div>
            </fieldset>

            <!-- KONTAK -->
            <fieldset class="f-ko">
                <legend>💌 Informasi kontak</legend>
                <div class="grid">

                    <div class="form-group">
                        <div class="label-row"><label for="email">Email</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">✉️</span>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email', $mahasiswa->email)); ?>"
                                   data-original="<?php echo e($mahasiswa->email); ?>" maxlength="255" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-row"><label for="no_hp">No. HP</label><span class="changed">diubah</span></div>
                        <div class="input-wrapper">
                            <span class="input-icon">📱</span>
                            <input type="text" id="no_hp" name="no_hp" value="<?php echo e(old('no_hp', $mahasiswa->no_hp)); ?>"
                                   data-original="<?php echo e($mahasiswa->no_hp); ?>" maxlength="20" required>
                        </div>
                    </div>

                </div>
            </fieldset>

            <!-- FOOTER -->
            <div class="form-footer">
                <a href="<?php echo e(route('mahasiswa.show', $mahasiswa)); ?>" class="btn btn-cancel">Batal</a>

                <button type="submit" class="btn btn-save" id="saveBtn">
                    <span id="buttonIcon">💾</span>
                    <span id="buttonText">Simpan perubahan</span>
                </button>
            </div>

        </form>

    </main>

</div>

<script>
    const ids = ['nim', 'nama', 'kelas', 'semester', 'jurusan', 'email', 'no_hp'];
    const preview = {
        nim: 'pvNim', nama: 'pvNama', kelas: 'pvKelas', semester: 'pvSemester',
        jurusan: 'pvJurusan', email: 'pvEmail', no_hp: 'pvHp'
    };
    const avatar = document.getElementById('pvAvatar');
    let lastInitial = avatar.textContent.trim();

    function refresh(id) {
        const input = document.getElementById(id);
        const value = input.value.trim();
        const target = document.getElementById(preview[id]);

        target.textContent = id === 'semester' ? 'Semester ' + value : value;
        target.classList.toggle('empty-val', !value);

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

        input.closest('.form-group').classList.toggle('is-changed', input.value !== input.dataset.original);
        updateTracker();
    }

    function updateTracker() {
        const n = document.querySelectorAll('.form-group.is-changed').length;
        document.getElementById('tracker').classList.toggle('dirty', n > 0);
        document.getElementById('trackerDot').textContent = n > 0 ? '✏️' : '✓';
        document.getElementById('trackerText').textContent =
            n > 0 ? n + ' kolom diubah' : 'Belum ada perubahan';
    }

    ids.forEach(id => {
        const input = document.getElementById(id);
        input.addEventListener('input', () => refresh(id));
        input.addEventListener('change', () => refresh(id));
        refresh(id); // sinkron awal (termasuk old() setelah error validasi)

        const label = input.closest('.form-group').querySelector('label');
        input.addEventListener('focus', () => label.style.transform = 'translateX(4px)');
        input.addEventListener('blur', () => label.style.transform = '');
    });

    /* kembalikan data awal */
    document.getElementById('resetBtn').addEventListener('click', () => {
        ids.forEach(id => {
            const input = document.getElementById(id);
            input.value = input.dataset.original;
            refresh(id);
        });
    });

    /* loading saat simpan */
    const form = document.getElementById('editForm');
    form.addEventListener('submit', function () {
        if (!form.checkValidity()) return;
        document.getElementById('saveBtn').classList.add('loading');
        document.getElementById('buttonIcon').innerHTML = '<span class="spinner"></span>';
        document.getElementById('buttonText').textContent = 'Menyimpan perubahan...';
    });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-2\resources\views/mahasiswa/edit.blade.php ENDPATH**/ ?>