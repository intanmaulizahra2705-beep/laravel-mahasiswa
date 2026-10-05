<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Mahasiswa | StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f3ff;
            color: #171717;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .blob {
            position: fixed;
            border-radius: 50%;
            z-index: -1;
            animation: float 8s ease-in-out infinite;
        }

        .blob.one {
            width: 280px;
            height: 280px;
            background: #c4b5fd;
            top: -100px;
            right: -80px;
        }

        .blob.two {
            width: 220px;
            height: 220px;
            background: #fde68a;
            bottom: -80px;
            left: -70px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-18px) rotate(7deg);
            }
        }

        .container {
            width: min(1150px, calc(100% - 32px));
            margin: auto;
            padding: 40px 0 60px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            background: #7c3aed;
            border: 3px solid #171717;
            border-radius: 15px;
            box-shadow: 5px 5px 0 #171717;
            font-size: 24px;
        }

        .brand h1 {
            font-size: 23px;
            font-weight: 800;
        }

        .brand p {
            font-size: 13px;
            color: #737373;
        }

        .back-btn {
            text-decoration: none;
            color: #171717;
            background: white;
            border: 3px solid #171717;
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 800;
            box-shadow: 4px 4px 0 #171717;
            transition: .2s;
        }

        .back-btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #171717;
        }

        .layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 25px;
        }

        .sidebar {
            background: #7c3aed;
            color: white;
            border: 3px solid #171717;
            border-radius: 23px;
            padding: 27px;
            box-shadow: 7px 7px 0 #171717;
            height: fit-content;
            position: sticky;
            top: 20px;
            animation: slideLeft .6s ease;
        }

        .profile-circle {
            width: 92px;
            height: 92px;
            display: grid;
            place-items: center;
            background: #facc15;
            color: #171717;
            border: 3px solid #171717;
            border-radius: 22px;
            box-shadow: 5px 5px 0 #171717;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .sidebar h2 {
            font-size: 26px;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .sidebar > p {
            font-size: 14px;
            opacity: .8;
            line-height: 1.6;
        }

        .mini-info {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid rgba(255,255,255,.25);
        }

        .mini-info div {
            margin-bottom: 15px;
        }

        .mini-info small {
            display: block;
            opacity: .65;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .mini-info strong {
            font-size: 14px;
        }

        .form-card {
            background: white;
            border: 3px solid #171717;
            border-radius: 23px;
            padding: 30px;
            box-shadow: 7px 7px 0 #171717;
            animation: slideUp .6s ease;
        }

        .form-header {
            margin-bottom: 28px;
        }

        .form-header h2 {
            font-size: 30px;
            font-weight: 800;
        }

        .form-header p {
            color: #737373;
            margin-top: 6px;
            font-size: 14px;
        }

        .section {
            margin-top: 28px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
            font-size: 17px;
            font-weight: 800;
        }

        .section-number {
            width: 30px;
            height: 30px;
            display: grid;
            place-items: center;
            border: 2px solid #171717;
            border-radius: 9px;
            background: #facc15;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 800;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            pointer-events: none;
        }

        input,
        select {
            width: 100%;
            padding: 14px 15px 14px 43px;
            border: 2px solid #171717;
            border-radius: 11px;
            background: #fafafa;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        input:focus,
        select:focus {
            background: white;
            box-shadow: 4px 4px 0 #7c3aed;
            transform: translate(-1px, -1px);
        }

        .hint {
            font-size: 11px;
            color: #737373;
        }

        .error-box {
            background: #ffe4e6;
            border: 2px solid #e11d48;
            border-radius: 12px;
            padding: 14px 17px;
            margin-bottom: 20px;
            color: #9f1239;
            font-size: 13px;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px dashed #d4d4d4;
        }

        .btn {
            border: 3px solid #171717;
            border-radius: 12px;
            padding: 13px 20px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            color: #171717;
            box-shadow: 4px 4px 0 #171717;
            transition: .2s;
        }

        .btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #171717;
        }

        .btn-cancel {
            background: #e5e7eb;
        }

        .btn-save {
            background: #a7f3d0;
        }

        .btn-save.loading {
            pointer-events: none;
            opacity: .7;
        }

        .spinner {
            width: 15px;
            height: 15px;
            border: 2px solid #171717;
            border-top-color: transparent;
            border-radius: 50%;
            display: inline-block;
            vertical-align: middle;
            margin-right: 7px;
            animation: spin .7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideLeft {
            from {
                opacity: 0;
                transform: translateX(-18px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .toast {
            position: fixed;
            right: 25px;
            bottom: 25px;
            background: #171717;
            color: white;
            border: 3px solid #171717;
            border-radius: 14px;
            padding: 15px 20px;
            box-shadow: 5px 5px 0 #7c3aed;
            transform: translateY(120px);
            opacity: 0;
            transition: .35s ease;
            z-index: 999;
            font-size: 14px;
            font-weight: 700;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        @media (max-width: 850px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }
        }

        @media (max-width: 650px) {
            .container {
                width: min(100% - 22px, 1150px);
                padding-top: 25px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-card {
                padding: 22px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="blob one"></div>
<div class="blob two"></div>

<div class="container">

    <div class="topbar">

        <div class="brand">
            <div class="brand-icon">🎓</div>

            <div>
                <h1>StudentHub</h1>
                <p>Edit data mahasiswa</p>
            </div>
        </div>

        <a href="<?php echo e(route('mahasiswa.index')); ?>" class="back-btn">
            ← Kembali
        </a>

    </div>

    <div class="layout">

        
        <aside class="sidebar">

            <div class="profile-circle">
                <?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?>

            </div>

            <h2>Edit Data</h2>

            <p>
                Perbarui informasi mahasiswa yang sudah tersimpan
                di dalam sistem.
            </p>

            <div class="mini-info">

                <div>
                    <small>NIM SAAT INI</small>
                    <strong><?php echo e($mahasiswa->nim); ?></strong>
                </div>

                <div>
                    <small>NAMA</small>
                    <strong><?php echo e($mahasiswa->nama); ?></strong>
                </div>

                <div>
                    <small>JURUSAN</small>
                    <strong><?php echo e($mahasiswa->jurusan); ?></strong>
                </div>

            </div>

        </aside>

        
        <main class="form-card">

            <div class="form-header">
                <h2>✏️ Edit Mahasiswa</h2>
                <p>
                    Silakan ubah data yang ingin diperbarui.
                </p>
            </div>

            <?php if($errors->any()): ?>
                <div class="error-box">
                    <strong>⚠️ Ada data yang perlu diperbaiki:</strong>

                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form
                action="<?php echo e(route('mahasiswa.update', $mahasiswa)); ?>"
                method="POST"
                id="editForm"
            >

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="section">

                    <div class="section-title">
                        <span class="section-number">01</span>
                        Identitas Mahasiswa
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="nim">NIM</label>

                            <div class="input-wrap">
                                <span class="input-icon">🪪</span>

                                <input
                                    type="text"
                                    id="nim"
                                    name="nim"
                                    value="<?php echo e(old('nim', $mahasiswa->nim)); ?>"
                                    maxlength="20"
                                    required
                                >
                            </div>

                            <span class="hint">
                                Nomor induk mahasiswa.
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>

                            <div class="input-wrap">
                                <span class="input-icon">👤</span>

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="<?php echo e(old('nama', $mahasiswa->nama)); ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>

                            <span class="hint">
                                Gunakan nama lengkap mahasiswa.
                            </span>
                        </div>

                    </div>

                </div>

                
                <div class="section">

                    <div class="section-title">
                        <span class="section-number">02</span>
                        Informasi Akademik
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="kelas">Kelas</label>

                            <div class="input-wrap">
                                <span class="input-icon">🏫</span>

                                <input
                                    type="text"
                                    id="kelas"
                                    name="kelas"
                                    value="<?php echo e(old('kelas', $mahasiswa->kelas)); ?>"
                                    maxlength="20"
                                    required
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="semester">Semester</label>

                            <div class="input-wrap">
                                <span class="input-icon">📚</span>

                                <select
                                    id="semester"
                                    name="semester"
                                    required
                                >
                                    <?php for($i = 1; $i <= 14; $i++): ?>
                                        <option
                                            value="<?php echo e($i); ?>"
                                            <?php echo e(old('semester', $mahasiswa->semester) == $i ? 'selected' : ''); ?>

                                        >
                                            Semester <?php echo e($i); ?>

                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group full">
                            <label for="jurusan">Jurusan</label>

                            <div class="input-wrap">
                                <span class="input-icon">💻</span>

                                <input
                                    type="text"
                                    id="jurusan"
                                    name="jurusan"
                                    value="<?php echo e(old('jurusan', $mahasiswa->jurusan)); ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>
                        </div>

                    </div>

                </div>

                
                <div class="section">

                    <div class="section-title">
                        <span class="section-number">03</span>
                        Informasi Kontak
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="email">Email</label>

                            <div class="input-wrap">
                                <span class="input-icon">✉️</span>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="<?php echo e(old('email', $mahasiswa->email)); ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP</label>

                            <div class="input-wrap">
                                <span class="input-icon">📱</span>

                                <input
                                    type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    value="<?php echo e(old('no_hp', $mahasiswa->no_hp)); ?>"
                                    maxlength="20"
                                    required
                                >
                            </div>
                        </div>

                    </div>

                </div>

                <div class="actions">

                    <a
                        href="<?php echo e(route('mahasiswa.show', $mahasiswa)); ?>"
                        class="btn btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                        id="saveBtn"
                    >
                        💾 Simpan Perubahan
                    </button>

                </div>

            </form>

        </main>

    </div>

</div>

<div class="toast" id="toast">
    ✨ Data berhasil diperbarui!
</div>

<script>

    const form = document.getElementById('editForm');
    const saveBtn = document.getElementById('saveBtn');

    form.addEventListener('submit', function () {

        saveBtn.classList.add('loading');

        saveBtn.innerHTML = `
            <span class="spinner"></span>
            Menyimpan perubahan...
        `;

    });

</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel\resources\views/mahasiswa/edit.blade.php ENDPATH**/ ?>