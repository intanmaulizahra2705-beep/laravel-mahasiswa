<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa | StudentHub</title>

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
            filter: blur(2px);
            z-index: -1;
            animation: float 8s ease-in-out infinite;
        }

        .blob.one {
            width: 260px;
            height: 260px;
            background: #c4b5fd;
            top: -80px;
            right: -60px;
        }

        .blob.two {
            width: 200px;
            height: 200px;
            background: #fde68a;
            bottom: -60px;
            left: -50px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0);
            }
            50% {
                transform: translateY(-20px) rotate(8deg);
            }
        }

        .container {
            width: min(1100px, calc(100% - 32px));
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            font-size: 25px;
        }

        .brand h1 {
            font-size: 23px;
            font-weight: 800;
        }

        .brand p {
            color: #737373;
            font-size: 13px;
            margin-top: 2px;
        }

        .back-btn {
            text-decoration: none;
            color: #171717;
            background: white;
            border: 3px solid #171717;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 700;
            box-shadow: 4px 4px 0 #171717;
            transition: .2s ease;
        }

        .back-btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #171717;
        }

        .hero {
            background: #7c3aed;
            border: 3px solid #171717;
            border-radius: 24px;
            padding: 34px;
            color: white;
            box-shadow: 8px 8px 0 #171717;
            margin-bottom: 28px;
            animation: slideUp .6s ease;
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #facc15;
            color: #171717;
            border: 3px solid #171717;
            border-radius: 22px;
            font-size: 38px;
            font-weight: 800;
            box-shadow: 5px 5px 0 #171717;
        }

        .hero h2 {
            font-size: clamp(28px, 5vw, 42px);
            font-weight: 800;
            line-height: 1.05;
        }

        .hero p {
            margin-top: 9px;
            opacity: .85;
            font-size: 15px;
        }

        .nim-badge {
            display: inline-block;
            margin-top: 15px;
            background: white;
            color: #171717;
            border: 2px solid #171717;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .card {
            background: white;
            border: 3px solid #171717;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 6px 6px 0 #171717;
            animation: slideUp .6s ease;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .info {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px dashed #d4d4d4;
        }

        .info:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border: 2px solid #171717;
            border-radius: 11px;
            background: #f5f3ff;
            font-size: 18px;
        }

        .info small {
            display: block;
            color: #737373;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .info strong {
            font-size: 15px;
            word-break: break-word;
        }

        .full {
            grid-column: 1 / -1;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            text-decoration: none;
            border: 3px solid #171717;
            border-radius: 12px;
            padding: 13px 19px;
            font-weight: 800;
            color: #171717;
            box-shadow: 4px 4px 0 #171717;
            transition: .2s ease;
        }

        .btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #171717;
        }

        .btn-edit {
            background: #facc15;
        }

        .btn-home {
            background: #e5e7eb;
        }

        .danger-form {
            display: inline;
        }

        .btn-delete {
            cursor: pointer;
            background: #fb7185;
            font-family: inherit;
            font-size: 14px;
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

        @media (max-width: 700px) {
            .container {
                width: min(100% - 22px, 1100px);
                padding-top: 25px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero {
                padding: 25px;
            }

            .hero-content {
                align-items: flex-start;
                flex-direction: column;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
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
                <p>Detail data mahasiswa</p>
            </div>
        </div>

        <a href="<?php echo e(route('mahasiswa.index')); ?>" class="back-btn">
            ← Kembali
        </a>
    </div>

    <section class="hero">
        <div class="hero-content">

            <div class="avatar">
                <?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?>

            </div>

            <div>
                <h2><?php echo e($mahasiswa->nama); ?></h2>

                <p>
                    <?php echo e($mahasiswa->jurusan); ?>

                    · Kelas <?php echo e($mahasiswa->kelas); ?>

                </p>

                <span class="nim-badge">
                    NIM · <?php echo e($mahasiswa->nim); ?>

                </span>
            </div>

        </div>
    </section>

    <div class="grid">

        <div class="card">
            <h3>👤 Identitas</h3>

            <div class="info">
                <div class="info-icon">🪪</div>
                <div>
                    <small>NIM</small>
                    <strong><?php echo e($mahasiswa->nim); ?></strong>
                </div>
            </div>

            <div class="info">
                <div class="info-icon">👨‍🎓</div>
                <div>
                    <small>Nama Lengkap</small>
                    <strong><?php echo e($mahasiswa->nama); ?></strong>
                </div>
            </div>

            <div class="info">
                <div class="info-icon">🏫</div>
                <div>
                    <small>Kelas</small>
                    <strong><?php echo e($mahasiswa->kelas); ?></strong>
                </div>
            </div>
        </div>

        <div class="card">
            <h3>📚 Akademik</h3>

            <div class="info">
                <div class="info-icon">💻</div>
                <div>
                    <small>Jurusan</small>
                    <strong><?php echo e($mahasiswa->jurusan); ?></strong>
                </div>
            </div>

            <div class="info">
                <div class="info-icon">📖</div>
                <div>
                    <small>Semester</small>
                    <strong>Semester <?php echo e($mahasiswa->semester); ?></strong>
                </div>
            </div>

            <div class="info">
                <div class="info-icon">📅</div>
                <div>
                    <small>Terdaftar</small>
                    <strong><?php echo e($mahasiswa->created_at->format('d F Y')); ?></strong>
                </div>
            </div>
        </div>

        <div class="card full">
            <h3>📞 Informasi Kontak</h3>

            <div class="grid" style="box-shadow:none;">

                <div class="info">
                    <div class="info-icon">✉️</div>
                    <div>
                        <small>Email</small>
                        <strong><?php echo e($mahasiswa->email); ?></strong>
                    </div>
                </div>

                <div class="info">
                    <div class="info-icon">📱</div>
                    <div>
                        <small>No. HP</small>
                        <strong><?php echo e($mahasiswa->no_hp); ?></strong>
                    </div>
                </div>

            </div>

            <div class="actions">

                <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>" class="btn btn-edit">
                    ✏️ Edit Data
                </a>

                <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-home">
                    🏠 Daftar Mahasiswa
                </a>

                <form
                    action="<?php echo e(route('mahasiswa.destroy', $mahasiswa)); ?>"
                    method="POST"
                    class="danger-form"
                    onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')"
                >
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-delete">
                        🗑️ Hapus
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel\resources\views/mahasiswa/show.blade.php ENDPATH**/ ?>