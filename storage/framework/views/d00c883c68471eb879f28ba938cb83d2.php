<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>

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

        /* registered chip */
        .tracker {
            display: flex; align-items: center; gap: 12px; background: #fff; border-radius: 24px;
            padding: 12px 16px; box-shadow: var(--shadow); font-weight: 800; font-size: 14px;
        }
        .tracker .dot { width: 34px; height: 34px; border-radius: 12px; background: var(--mint); display: grid; place-items: center; font-size: 17px; }

        /* profile card */
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

        .name { text-align: center; font: 600 19px "Fredoka", sans-serif; line-height: 1.2; word-break: break-word; }
        .nim { text-align: center; color: var(--muted); font-weight: 700; font-size: 13px; margin: 3px 0 14px; }

        .tags { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-bottom: 14px; }
        .badge { padding: 5px 13px; border-radius: 999px; font-size: 13px; font-weight: 500; }
        .badge-class { background: var(--butter); }
        .badge-semester { background: var(--mint); }

        .info { border-top: 2px dashed var(--line); padding-top: 12px; display: grid; gap: 6px; font-size: 13px; font-weight: 700; }
        .info div { display: flex; gap: 8px; align-items: center; }
        .info span { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

        /* ===== MAIN ===== */
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
        label { font-weight: 800; font-size: 13px; }

        /* read-only field (tampilan seperti input) */
        .field {
            position: relative; display: flex; align-items: center; min-height: 52px; width: 100%;
            border: 2px solid var(--line); background: #fffafc; border-radius: 20px;
            padding: 0 16px 0 46px; font: 700 14px "Nunito", sans-serif; color: var(--ink);
            word-break: break-word; transition: border-color .2s, background .2s, transform .2s;
        }
        .field:hover { background: #fff; border-color: #e7d4e4; transform: translateY(-2px); }
        .field-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 17px; }

        .form-footer {
            display: flex; justify-content: flex-end; align-items: center; gap: 12px; flex-wrap: wrap;
            padding-top: 24px; border-top: 2px dashed var(--line);
        }
        .danger-form { margin-right: auto; display: inline; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 50px;
            border: 0; border-radius: 999px; padding: 0 26px; font-size: 16px; font-weight: 600;
            color: var(--ink); text-decoration: none; cursor: pointer; background: #fff;
            box-shadow: 0 5px 0 rgba(74, 59, 92, .18); transition: transform .15s, box-shadow .15s;
        }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 0 rgba(74, 59, 92, .18); }
        .btn:active { transform: translateY(4px); box-shadow: 0 1px 0 rgba(74, 59, 92, .18); }
        .btn-list { background: #f3edf8; }
        .btn-edit { background: var(--pink-deep); color: #fff; }
        .btn-delete { background: #ffe3e8; }

        @keyframes slideIn { from { opacity: 0; transform: translateX(-40px); } to { opacity: 1; transform: none; } }
        @keyframes pop { from { opacity: 0; transform: scale(.95) translateY(26px); } to { opacity: 1; transform: none; } }

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
            .danger-form { margin-right: 0; }
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
            <h1>Detail mahasiswa</h1>
            <p>Lihat informasi lengkap mahasiswa. Klik edit jika ada data yang perlu diperbarui.</p>
        </div>

        <div class="tracker">
            <div class="dot">📅</div>
            <span>Terdaftar <?php echo e($mahasiswa->created_at->format('d F Y')); ?></span>
        </div>

        <div class="preview-wrap">
            <div class="card">
                <div class="band"></div>
                <div class="avatar"><?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?></div>

                <div class="name"><?php echo e($mahasiswa->nama); ?></div>
                <div class="nim"><?php echo e($mahasiswa->nim); ?></div>

                <div class="tags">
                    <span class="badge badge-class"><?php echo e($mahasiswa->kelas); ?></span>
                    <span class="badge badge-semester">Semester <?php echo e($mahasiswa->semester); ?></span>
                </div>

                <div class="info">
                    <div>💻 <span><?php echo e($mahasiswa->jurusan); ?></span></div>
                    <div>✉️ <span><?php echo e($mahasiswa->email); ?></span></div>
                    <div>📱 <span><?php echo e($mahasiswa->no_hp); ?></span></div>
                </div>
            </div>
        </div>

    </aside>

    <!-- DETAIL -->
    <main class="form-card">

        <div class="form-head">
            <div>
                <h2>Informasi mahasiswa</h2>
                <p>Data lengkap mahasiswa yang terdaftar.</p>
            </div>
            <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>" class="btn btn-reset">✏️ Edit data</a>
        </div>

        <!-- IDENTITAS -->
        <fieldset class="f-id">
            <legend>🪪 Identitas</legend>
            <div class="grid">

                <div class="form-group">
                    <div class="label-row"><label>NIM</label></div>
                    <div class="field"><span class="field-icon">🪪</span><?php echo e($mahasiswa->nim); ?></div>
                </div>

                <div class="form-group">
                    <div class="label-row"><label>Nama lengkap</label></div>
                    <div class="field"><span class="field-icon">👤</span><?php echo e($mahasiswa->nama); ?></div>
                </div>

            </div>
        </fieldset>

        <!-- AKADEMIK -->
        <fieldset class="f-ak">
            <legend>📚 Informasi akademik</legend>
            <div class="grid">

                <div class="form-group">
                    <div class="label-row"><label>Kelas</label></div>
                    <div class="field"><span class="field-icon">🏫</span><?php echo e($mahasiswa->kelas); ?></div>
                </div>

                <div class="form-group">
                    <div class="label-row"><label>Semester</label></div>
                    <div class="field"><span class="field-icon">📚</span>Semester <?php echo e($mahasiswa->semester); ?></div>
                </div>

                <div class="form-group full">
                    <div class="label-row"><label>Jurusan</label></div>
                    <div class="field"><span class="field-icon">💻</span><?php echo e($mahasiswa->jurusan); ?></div>
                </div>

            </div>
        </fieldset>

        <!-- KONTAK -->
        <fieldset class="f-ko">
            <legend>💌 Informasi kontak</legend>
            <div class="grid">

                <div class="form-group">
                    <div class="label-row"><label>Email</label></div>
                    <div class="field"><span class="field-icon">✉️</span><?php echo e($mahasiswa->email); ?></div>
                </div>

                <div class="form-group">
                    <div class="label-row"><label>No. HP</label></div>
                    <div class="field"><span class="field-icon">📱</span><?php echo e($mahasiswa->no_hp); ?></div>
                </div>

            </div>
        </fieldset>

        <!-- FOOTER -->
        <div class="form-footer">

            <form action="<?php echo e(route('mahasiswa.destroy', $mahasiswa)); ?>" method="POST" class="danger-form"
                  onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-delete">🗑️ Hapus</button>
            </form>

            <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-list">🏠 Daftar mahasiswa</a>

            <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>" class="btn btn-edit">✏️ Edit data</a>
        </div>

    </main>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-2\resources\views/mahasiswa/show.blade.php ENDPATH**/ ?>