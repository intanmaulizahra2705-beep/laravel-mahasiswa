<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mahasiswa Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f5f6f8;
            --card: #ffffff;
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
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
           BACKGROUND DECORATION
        ========================== */

        .blob {
            position: fixed;
            width: 260px;
            height: 260px;
            border: 2px solid #171717;
            border-radius: 50%;
            z-index: -1;
            opacity: .08;
            animation: float 8s ease-in-out infinite;
        }

        .blob.one {
            top: 80px;
            right: -100px;
        }

        .blob.two {
            bottom: -100px;
            left: -80px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-25px) rotate(8deg);
            }
        }

        /* =========================
           PAGE
        ========================== */

        .page {
            max-width: 1400px;
            margin: auto;
            padding: 30px;
        }

        /* =========================
           HEADER
        ========================== */

        .hero {
            position: relative;
            background: var(--purple);
            border: var(--border);
            box-shadow: 8px 8px 0 var(--black);
            padding: 35px;
            margin-bottom: 28px;
            overflow: hidden;
            animation: slideDown .7s ease;
        }

        .hero::after {
            content: "CRUD";
            position: absolute;
            right: 30px;
            bottom: -30px;
            font-size: 100px;
            font-weight: 800;
            opacity: .08;
            pointer-events: none;
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .brand-icon {
            width: 65px;
            height: 65px;
            display: grid;
            place-items: center;
            background: white;
            border: var(--border);
            box-shadow: 4px 4px 0 var(--black);
            font-size: 30px;
            animation: bounce 2.5s infinite;
        }

        .hero h1 {
            font-size: clamp(28px, 4vw, 46px);
            line-height: 1;
            margin-bottom: 8px;
            letter-spacing: -1.5px;
        }

        .hero p {
            font-size: 15px;
            font-weight: 500;
        }

        .status {
            background: var(--green);
            border: var(--border);
            padding: 10px 16px;
            font-weight: 700;
            box-shadow: 3px 3px 0 var(--black);
        }

        .status-dot {
            display: inline-block;
            width: 9px;
            height: 9px;
            background: #22c55e;
            border: 1px solid var(--black);
            border-radius: 50%;
            margin-right: 7px;
            animation: pulse 1.5s infinite;
        }

        /* =========================
           STATS
        ========================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--card);
            border: var(--border);
            box-shadow: 5px 5px 0 var(--black);
            padding: 23px;
            position: relative;
            overflow: hidden;
            animation: fadeUp .7s ease both;
        }

        .stat-card:nth-child(2) {
            animation-delay: .1s;
        }

        .stat-card:nth-child(3) {
            animation-delay: .2s;
        }

        .stat-card:hover {
            transform: translate(-3px, -3px);
            box-shadow: 8px 8px 0 var(--black);
            transition: .2s ease;
        }

        .stat-icon {
            font-size: 25px;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 34px;
            font-weight: 800;
        }

        .stat-label {
            color: var(--muted);
            font-size: 14px;
            margin-top: 3px;
        }

        /* =========================
           TOOLBAR
        ========================== */

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            gap: 15px;
        }

        .toolbar h2 {
            font-size: 24px;
        }

        .toolbar p {
            color: var(--muted);
            font-size: 14px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: var(--border);
            padding: 13px 18px;
            text-decoration: none;
            color: var(--black);
            font-weight: 800;
            background: white;
            cursor: pointer;
            font-family: inherit;
            box-shadow: 4px 4px 0 var(--black);
            transition: .15s ease;
        }

        .btn:hover {
            transform: translate(3px, 3px);
            box-shadow: 1px 1px 0 var(--black);
        }

        .btn-add {
            background: var(--yellow);
        }

        /* =========================
           TABLE
        ========================== */

        .table-card {
            background: white;
            border: var(--border);
            box-shadow: 7px 7px 0 var(--black);
            overflow: hidden;
            animation: fadeUp .8s ease;
        }

        .table-head {
            padding: 18px 22px;
            border-bottom: var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }

        .table-head strong {
            font-size: 16px;
        }

        .count {
            background: var(--blue);
            border: 2px solid var(--black);
            padding: 5px 10px;
            font-weight: 800;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: var(--black);
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        td {
            padding: 16px 15px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: #f7f5ff;
            transform: scale(1.002);
        }

        .student {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--purple);
            border: 2px solid var(--black);
            font-weight: 800;
        }

        .student-name {
            font-weight: 800;
        }

        .student-nim {
            color: var(--muted);
            font-size: 12px;
            margin-top: 2px;
        }

        .badge {
            display: inline-block;
            padding: 6px 9px;
            border: 2px solid var(--black);
            font-size: 12px;
            font-weight: 800;
        }

        .badge-class {
            background: var(--yellow);
        }

        .badge-semester {
            background: var(--green);
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border: 2px solid var(--black);
            background: white;
            text-decoration: none;
            color: var(--black);
            cursor: pointer;
            transition: .15s;
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 3px 3px 0 var(--black);
        }

        .detail {
            background: var(--blue);
        }

        .edit {
            background: var(--yellow);
        }

        .delete {
            background: var(--red);
        }

        /* =========================
           EMPTY
        ========================== */

        .empty {
            text-align: center;
            padding: 70px 20px;
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        .empty h3 {
            font-size: 22px;
            margin-bottom: 6px;
        }

        .empty p {
            color: var(--muted);
            margin-bottom: 20px;
        }

        /* =========================
           TOAST
        ========================== */

        .toast {
            position: fixed;
            right: 25px;
            top: 25px;
            z-index: 9999;
            min-width: 320px;
            max-width: 420px;
            background: white;
            border: var(--border);
            box-shadow: 7px 7px 0 var(--black);
            padding: 17px 18px;
            display: flex;
            align-items: center;
            gap: 13px;
            animation: toastIn .5s cubic-bezier(.2,.8,.2,1);
        }

        .toast-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--green);
            border: 2px solid var(--black);
            font-size: 20px;
            flex-shrink: 0;
        }

        .toast-content strong {
            display: block;
            margin-bottom: 2px;
        }

        .toast-content span {
            color: var(--muted);
            font-size: 13px;
        }

        .toast-close {
            margin-left: auto;
            border: none;
            background: none;
            font-size: 20px;
            cursor: pointer;
        }

        .toast.hide {
            animation: toastOut .4s ease forwards;
        }

        /* =========================
           MODAL
        ========================== */

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.45);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 5000;
        }

        .modal.active {
            display: flex;
            animation: fadeIn .2s ease;
        }

        .modal-box {
            width: 100%;
            max-width: 430px;
            background: white;
            border: 3px solid var(--black);
            box-shadow: 9px 9px 0 var(--black);
            padding: 28px;
            animation: modalIn .3s ease;
        }

        .modal-icon {
            width: 55px;
            height: 55px;
            display: grid;
            place-items: center;
            background: var(--red);
            border: 2px solid var(--black);
            font-size: 25px;
            margin-bottom: 18px;
        }

        .modal-box h3 {
            font-size: 23px;
            margin-bottom: 8px;
        }

        .modal-box p {
            color: var(--muted);
            line-height: 1.5;
            margin-bottom: 25px;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            background: #eee;
        }

        .btn-confirm {
            background: var(--red);
        }

        /* =========================
           ANIMATIONS
        ========================== */

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(.9) translateY(15px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
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

        @keyframes toastOut {
            to {
                opacity: 0;
                transform: translateX(120px);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-6px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.5);
            }
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 800px) {

            .page {
                padding: 16px;
            }

            .hero {
                padding: 25px;
            }

            .hero-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .toolbar {
                align-items: stretch;
                flex-direction: column;
            }

            .btn-add {
                width: 100%;
            }

            .toast {
                left: 15px;
                right: 15px;
                top: 15px;
                min-width: auto;
            }
        }
    </style>
</head>

<body>

<div class="blob one"></div>
<div class="blob two"></div>

<div class="page">

    <!-- HERO -->
    <section class="hero">

        <div class="hero-top">

            <div class="brand">

                <div class="brand-icon">
                    🎓
                </div>

                <div>
                    <h1>Mahasiswa.</h1>
                    <p>Kelola data mahasiswa dengan lebih sederhana.</p>
                </div>

            </div>

            <div class="status">
                <span class="status-dot"></span>
                Sistem Aktif
            </div>

        </div>

    </section>


    <!-- STATISTICS -->
    <section class="stats">

        <div class="stat-card">

            <div class="stat-icon">👥</div>

            <div class="stat-number">
                <?php echo e($mahasiswas->count()); ?>

            </div>

            <div class="stat-label">
                Total Mahasiswa
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">🏫</div>

            <div class="stat-number">
                <?php echo e($mahasiswas->unique('kelas')->count()); ?>

            </div>

            <div class="stat-label">
                Kelas Terdaftar
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">💻</div>

            <div class="stat-number">
                <?php echo e($mahasiswas->unique('jurusan')->count()); ?>

            </div>

            <div class="stat-label">
                Jurusan
            </div>

        </div>

    </section>


    <!-- TOOLBAR -->
    <div class="toolbar">

        <div>
            <h2>Daftar Mahasiswa</h2>
            <p>Data mahasiswa yang tersimpan di sistem.</p>
        </div>

        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-add">
            <span>＋</span>
            Tambah Mahasiswa
        </a>

    </div>


    <!-- TABLE -->
    <section class="table-card">

        <div class="table-head">

            <strong>Data Terbaru</strong>

            <span class="count">
                <?php echo e($mahasiswas->count()); ?> DATA
            </span>

        </div>

        <div class="table-wrapper">

            <?php if($mahasiswas->count() > 0): ?>

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td>
                                <strong><?php echo e($loop->iteration); ?></strong>
                            </td>

                            <td>

                                <div class="student">

                                    <div class="avatar">
                                        <?php echo e(strtoupper(substr($mahasiswa->nama, 0, 1))); ?>

                                    </div>

                                    <div>
                                        <div class="student-name">
                                            <?php echo e($mahasiswa->nama); ?>

                                        </div>

                                        <div class="student-nim">
                                            <?php echo e($mahasiswa->nim); ?>

                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td>
                                <span class="badge badge-class">
                                    <?php echo e($mahasiswa->kelas); ?>

                                </span>
                            </td>

                            <td>
                                <?php echo e($mahasiswa->jurusan); ?>

                            </td>

                            <td>
                                <span class="badge badge-semester">
                                    Semester <?php echo e($mahasiswa->semester); ?>

                                </span>
                            </td>

                            <td>
                                <?php echo e($mahasiswa->email); ?>

                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="<?php echo e(route('mahasiswa.show', $mahasiswa)); ?>"
                                        class="action-btn detail"
                                        title="Detail"
                                    >
                                        👁
                                    </a>

                                    <a
                                        href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>"
                                        class="action-btn edit"
                                        title="Edit"
                                    >
                                        ✏
                                    </a>

                                    <button
                                        type="button"
                                        class="action-btn delete"
                                        title="Hapus"
                                        onclick="openDeleteModal('<?php echo e(route('mahasiswa.destroy', $mahasiswa)); ?>', '<?php echo e($mahasiswa->nama); ?>')"
                                    >
                                        🗑
                                    </button>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            <?php else: ?>

                <div class="empty">

                    <div class="empty-icon">
                        📭
                    </div>

                    <h3>Belum ada mahasiswa</h3>

                    <p>
                        Tambahkan data mahasiswa pertama untuk memulai.
                    </p>

                    <a
                        href="<?php echo e(route('mahasiswa.create')); ?>"
                        class="btn btn-add"
                    >
                        ＋ Tambah Mahasiswa
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </section>

</div>


<!-- SUCCESS TOAST -->

<?php if(session('success')): ?>

<div class="toast" id="toast">

    <div class="toast-icon">
        ✓
    </div>

    <div class="toast-content">

        <strong>Berhasil! 🎉</strong>

        <span>
            <?php echo e(session('success')); ?>

        </span>

    </div>

    <button
        class="toast-close"
        onclick="closeToast()"
    >
        ×
    </button>

</div>

<?php endif; ?>


<!-- DELETE MODAL -->

<div class="modal" id="deleteModal">

    <div class="modal-box">

        <div class="modal-icon">
            🗑
        </div>

        <h3>Hapus mahasiswa?</h3>

        <p>
            Data <strong id="deleteName"></strong>
            akan dihapus dari database.
            Tindakan ini tidak dapat dibatalkan.
        </p>

        <div class="modal-buttons">

            <button
                type="button"
                class="btn btn-cancel"
                onclick="closeDeleteModal()"
            >
                Batal
            </button>

            <form id="deleteForm" method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button
                    type="submit"
                    class="btn btn-confirm"
                >
                    Ya, Hapus
                </button>

            </form>

        </div>

    </div>

</div>


<script>

    /* =========================
       TOAST
    ========================== */

    function closeToast() {

        const toast = document.getElementById('toast');

        if (toast) {

            toast.classList.add('hide');

            setTimeout(() => {
                toast.remove();
            }, 400);

        }

    }


    // Toast otomatis hilang
    setTimeout(() => {
        closeToast();
    }, 4000);


    /* =========================
       DELETE MODAL
    ========================== */

    function openDeleteModal(action, name) {

        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const nameElement = document.getElementById('deleteName');

        form.action = action;
        nameElement.textContent = name;

        modal.classList.add('active');

    }


    function closeDeleteModal() {

        const modal = document.getElementById('deleteModal');

        modal.classList.remove('active');

    }


    // Tutup modal kalau klik area luar
    document
        .getElementById('deleteModal')
        .addEventListener('click', function(e) {

            if (e.target === this) {
                closeDeleteModal();
            }

        });


    // ESC untuk tutup modal
    document.addEventListener('keydown', function(e) {

        if (e.key === 'Escape') {
            closeDeleteModal();
        }

    });

</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>