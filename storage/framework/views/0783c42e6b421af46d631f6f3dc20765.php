<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa — StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f3f4f6;
            --white: #ffffff;
            --black: #171717;
            --muted: #737373;

            --purple: #c4b5fd;
            --yellow: #fde68a;
            --green: #bbf7d0;
            --blue: #bfdbfe;
            --red: #fecaca;

            --border: 2px solid var(--black);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: var(--bg);
            color: var(--black);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =========================
           BACKGROUND
        ========================== */

        .background-shape {
            position: fixed;
            z-index: -1;
            border: 2px solid var(--black);
            opacity: .07;
            animation: floating 7s ease-in-out infinite;
        }

        .shape-one {
            width: 260px;
            height: 260px;
            border-radius: 50%;
            right: -100px;
            top: 100px;
        }

        .shape-two {
            width: 180px;
            height: 180px;
            transform: rotate(20deg);
            left: -70px;
            bottom: 70px;
            animation-delay: 1.5s;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-20px) rotate(8deg);
            }
        }

        /* =========================
           PAGE
        ========================== */

        .page {
            width: min(1200px, calc(100% - 40px));
            margin: auto;
            padding: 35px 0 60px;
        }

        /* =========================
           TOP NAV
        ========================== */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            animation: slideDown .6s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            font-size: 18px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--purple);
            border: var(--border);
            box-shadow: 3px 3px 0 var(--black);
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--black);
            text-decoration: none;
            font-weight: 700;
            transition: .2s;
        }

        .back:hover {
            transform: translateX(-4px);
        }

        /* =========================
           MAIN GRID
        ========================== */

        .layout {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 25px;
            align-items: start;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            animation: slideLeft .7s ease;
        }

        .intro-card {
            background: var(--purple);
            border: 3px solid var(--black);
            box-shadow: 8px 8px 0 var(--black);
            padding: 28px;
            position: relative;
            overflow: hidden;
        }

        .intro-card::after {
            content: "01";
            position: absolute;
            right: -10px;
            bottom: -35px;
            font-size: 130px;
            font-weight: 800;
            opacity: .08;
        }

        .big-icon {
            width: 70px;
            height: 70px;
            display: grid;
            place-items: center;
            background: var(--white);
            border: 3px solid var(--black);
            box-shadow: 5px 5px 0 var(--black);
            font-size: 32px;
            margin-bottom: 25px;
            animation: bounce 2.5s infinite;
        }

        .intro-card h1 {
            font-size: 32px;
            line-height: 1.05;
            margin-bottom: 12px;
            letter-spacing: -1px;
        }

        .intro-card p {
            line-height: 1.6;
            font-size: 14px;
        }

        .steps {
            background: var(--white);
            border: var(--border);
            box-shadow: 5px 5px 0 var(--black);
            margin-top: 20px;
            padding: 20px;
        }

        .steps-title {
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 15px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 32px;
            height: 32px;
            display: grid;
            place-items: center;
            border: 2px solid var(--black);
            font-weight: 800;
            flex-shrink: 0;
        }

        .step.active .step-number {
            background: var(--green);
            box-shadow: 2px 2px 0 var(--black);
        }

        .step-text strong {
            display: block;
            font-size: 13px;
        }

        .step-text span {
            font-size: 11px;
            color: var(--muted);
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: var(--white);
            border: 3px solid var(--black);
            box-shadow: 8px 8px 0 var(--black);
            padding: 32px;
            animation: slideRight .7s ease;
        }

        .form-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .form-header h2 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .form-header p {
            color: var(--muted);
            font-size: 13px;
        }

        .required {
            background: var(--yellow);
            border: 2px solid var(--black);
            padding: 8px 11px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        /* =========================
           ERROR
        ========================== */

        .error-box {
            background: var(--red);
            border: 2px solid var(--black);
            padding: 15px;
            margin-bottom: 25px;
            animation: shake .35s ease;
        }

        .error-box strong {
            display: block;
            margin-bottom: 8px;
        }

        .error-box ul {
            padding-left: 20px;
            font-size: 13px;
        }

        .error-box li {
            margin-bottom: 3px;
        }

        /* =========================
           FORM GRID
        ========================== */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }

        input {
            width: 100%;
            height: 50px;
            border: 2px solid var(--black);
            background: #fafafa;
            padding: 0 15px 0 42px;
            font-family: inherit;
            font-size: 14px;
            color: var(--black);
            outline: none;
            transition: .2s ease;
        }

        input:hover {
            background: #fff;
        }

        input:focus {
            background: white;
            box-shadow: 4px 4px 0 var(--black);
            transform: translate(-1px, -1px);
        }

        input::placeholder {
            color: #a3a3a3;
        }

        .helper {
            color: var(--muted);
            font-size: 11px;
            margin-top: 6px;
        }

        .counter {
            text-align: right;
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        /* =========================
           SECTION
        ========================== */

        .section-title {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 4px;
            padding-bottom: 10px;
            border-bottom: 2px dashed #ccc;
        }

        .section-title span {
            background: var(--blue);
            border: 2px solid var(--black);
            padding: 5px 8px;
            font-size: 11px;
            font-weight: 800;
        }

        .section-title strong {
            font-size: 13px;
        }

        /* =========================
           BUTTONS
        ========================== */

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px dashed #ccc;
        }

        .secure {
            color: var(--muted);
            font-size: 11px;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            border: 2px solid var(--black);
            padding: 0 18px;
            font-family: inherit;
            font-weight: 800;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            color: var(--black);
            box-shadow: 4px 4px 0 var(--black);
            transition: .15s ease;
        }

        .btn:hover {
            transform: translate(3px, 3px);
            box-shadow: 1px 1px 0 var(--black);
        }

        .btn-cancel {
            background: #f5f5f5;
        }

        .btn-save {
            background: var(--green);
        }

        .btn-save.loading {
            pointer-events: none;
            opacity: .7;
        }

        .spinner {
            width: 15px;
            height: 15px;
            border: 2px solid var(--black);
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }

        /* =========================
           TOAST
        ========================== */

        .toast-container {
            position: fixed;
            top: 25px;
            right: 25px;
            z-index: 9999;
        }

        .toast {
            min-width: 330px;
            max-width: 420px;
            background: white;
            border: 3px solid var(--black);
            box-shadow: 7px 7px 0 var(--black);
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: toastIn .45s cubic-bezier(.2,.8,.2,1);
        }

        .toast-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--red);
            border: 2px solid var(--black);
            flex-shrink: 0;
        }

        .toast strong {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .toast span {
            font-size: 12px;
            color: var(--muted);
        }

        /* =========================
           ANIMATIONS
        ========================== */

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideLeft {
            from {
                opacity: 0;
                transform: translateX(-25px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(25px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-7px);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateX(100px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 18px;
            }

            .steps {
                margin-top: 0;
            }
        }

        @media (max-width: 650px) {

            .page {
                width: min(100% - 24px, 600px);
                padding-top: 20px;
            }

            .topbar {
                margin-bottom: 18px;
            }

            .brand span {
                display: none;
            }

            .sidebar {
                display: block;
            }

            .steps {
                margin-top: 18px;
            }

            .form-card {
                padding: 20px;
            }

            .form-header {
                flex-direction: column;
                gap: 12px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .buttons {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }

            .toast-container {
                top: 15px;
                right: 15px;
                left: 15px;
            }

            .toast {
                min-width: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="background-shape shape-one"></div>
<div class="background-shape shape-two"></div>

<div class="page">

    <!-- TOP BAR -->

    <div class="topbar">

        <div class="brand">

            <div class="brand-icon">
                🎓
            </div>

            <span>StudentHub</span>

        </div>

        <a
            href="<?php echo e(route('mahasiswa.index')); ?>"
            class="back"
        >
            ← Kembali ke Data
        </a>

    </div>


    <!-- MAIN -->

    <div class="layout">

        <!-- SIDEBAR -->

        <aside class="sidebar">

            <div class="intro-card">

                <div class="big-icon">
                    ✨
                </div>

                <h1>
                    Tambah<br>
                    Mahasiswa.
                </h1>

                <p>
                    Lengkapi informasi mahasiswa di bawah.
                    Data yang kamu masukkan akan langsung
                    tersimpan ke database.
                </p>

            </div>


            <div class="steps">

                <div class="steps-title">
                    Proses Pendaftaran
                </div>

                <div class="step active">

                    <div class="step-number">
                        01
                    </div>

                    <div class="step-text">
                        <strong>Data Mahasiswa</strong>
                        <span>Informasi pribadi</span>
                    </div>

                </div>

                <div class="step">

                    <div class="step-number">
                        02
                    </div>

                    <div class="step-text">
                        <strong>Validasi</strong>
                        <span>Periksa data</span>
                    </div>

                </div>

                <div class="step">

                    <div class="step-number">
                        03
                    </div>

                    <div class="step-text">
                        <strong>Selesai</strong>
                        <span>Data tersimpan</span>
                    </div>

                </div>

            </div>

        </aside>


        <!-- FORM -->

        <main class="form-card">

            <div class="form-header">

                <div>

                    <h2>Informasi Mahasiswa</h2>

                    <p>
                        Masukkan data dengan benar dan lengkap.
                    </p>

                </div>

                <div class="required">
                    * WAJIB DIISI
                </div>

            </div>


            <?php if($errors->any()): ?>

                <div class="error-box">

                    <strong>
                        ⚠️ Ada data yang perlu diperbaiki
                    </strong>

                    <ul>

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <?php echo e($error); ?>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            <?php endif; ?>


            <form
                action="<?php echo e(route('mahasiswa.store')); ?>"
                method="POST"
                id="studentForm"
            >

                <?php echo csrf_field(); ?>


                <div class="form-grid">

                    <!-- IDENTITAS -->

                    <div class="section-title">

                        <span>01</span>

                        <strong>
                            Identitas
                        </strong>

                    </div>


                    <!-- NIM -->

                    <div class="form-group">

                        <label for="nim">
                            NIM
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🪪
                            </span>

                            <input
                                type="text"
                                id="nim"
                                name="nim"
                                value="<?php echo e(old('nim')); ?>"
                                placeholder="Contoh: 23105111089"
                                maxlength="20"
                                required
                            >

                        </div>

                        <div class="helper">
                            Nomor identitas mahasiswa.
                        </div>

                    </div>


                    <!-- NAMA -->

                    <div class="form-group">

                        <label for="nama">
                            Nama Lengkap
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                👤
                            </span>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                value="<?php echo e(old('nama')); ?>"
                                placeholder="Contoh: Arman Muharrir"
                                maxlength="255"
                                required
                            >

                        </div>

                        <div class="counter">
                            <span id="namaCounter">0</span>/255
                        </div>

                    </div>


                    <!-- AKADEMIK -->

                    <div class="section-title">

                        <span>02</span>

                        <strong>
                            Informasi Akademik
                        </strong>

                    </div>


                    <!-- KELAS -->

                    <div class="form-group">

                        <label for="kelas">
                            Kelas
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🏫
                            </span>

                            <input
                                type="text"
                                id="kelas"
                                name="kelas"
                                value="<?php echo e(old('kelas')); ?>"
                                placeholder="Contoh: FTI-06"
                                maxlength="20"
                                required
                            >

                        </div>

                    </div>


                    <!-- JURUSAN -->

                    <div class="form-group">

                        <label for="jurusan">
                            Jurusan
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                💻
                            </span>

                            <input
                                type="text"
                                id="jurusan"
                                name="jurusan"
                                value="<?php echo e(old('jurusan')); ?>"
                                placeholder="Contoh: Teknik Informatika"
                                maxlength="255"
                                required
                            >

                        </div>

                    </div>


                    <!-- SEMESTER -->

                    <div class="form-group">

                        <label for="semester">
                            Semester
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                📚
                            </span>

                            <input
                                type="number"
                                id="semester"
                                name="semester"
                                value="<?php echo e(old('semester')); ?>"
                                placeholder="Contoh: 3"
                                min="1"
                                max="14"
                                required
                            >

                        </div>

                        <div class="helper">
                            Masukkan semester 1–14.
                        </div>

                    </div>


                    <!-- KONTAK -->

                    <div class="section-title">

                        <span>03</span>

                        <strong>
                            Informasi Kontak
                        </strong>

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉️
                            </span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                placeholder="nama@email.com"
                                maxlength="255"
                                required
                            >

                        </div>

                    </div>


                    <!-- NO HP -->

                    <div class="form-group">

                        <label for="no_hp">
                            Nomor HP
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                📱
                            </span>

                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                value="<?php echo e(old('no_hp')); ?>"
                                placeholder="081234567890"
                                maxlength="20"
                                required
                            >

                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="form-footer">

                    <div class="secure">
                        🔒 Data akan divalidasi sebelum disimpan.
                    </div>

                    <div class="buttons">

                        <a
                            href="<?php echo e(route('mahasiswa.index')); ?>"
                            class="btn btn-cancel"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="btn btn-save"
                            id="saveButton"
                        >
                            <span id="buttonIcon">✓</span>
                            <span id="buttonText">
                                Simpan Mahasiswa
                            </span>
                        </button>

                    </div>

                </div>

            </form>

        </main>

    </div>

</div>


<!-- TOAST ERROR -->

<?php if($errors->any()): ?>

<div class="toast-container">

    <div class="toast">

        <div class="toast-icon">
            ⚠️
        </div>

        <div>

            <strong>
                Data belum lengkap
            </strong>

            <span>
                Periksa kembali form kamu.
            </span>

        </div>

    </div>

</div>

<?php endif; ?>


<script>

    /* =========================
       NAMA CHARACTER COUNTER
    ========================== */

    const nama = document.getElementById('nama');
    const counter = document.getElementById('namaCounter');

    function updateCounter() {
        counter.textContent = nama.value.length;
    }

    nama.addEventListener('input', updateCounter);

    updateCounter();


    /* =========================
       FORM LOADING
    ========================== */

    const form = document.getElementById('studentForm');
    const button = document.getElementById('saveButton');
    const buttonIcon = document.getElementById('buttonIcon');
    const buttonText = document.getElementById('buttonText');

    form.addEventListener('submit', function () {

        if (!form.checkValidity()) {
            return;
        }

        button.classList.add('loading');

        buttonIcon.innerHTML = '<span class="spinner"></span>';

        buttonText.textContent = 'Menyimpan...';

    });


    /* =========================
       INPUT ANIMATION
    ========================== */

    document.querySelectorAll('input').forEach(input => {

        input.addEventListener('focus', function () {

            this.closest('.form-group')
                .querySelector('label')
                .style.transform = 'translateX(3px)';

        });

        input.addEventListener('blur', function () {

            this.closest('.form-group')
                .querySelector('label')
                .style.transform = '';

        });

    });

</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>