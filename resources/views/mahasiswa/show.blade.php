<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $mahasiswa->nama }} — StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <style>
        :root {
            /* ===== SAME VISUAL SYSTEM AS INDEX ===== */
            --bg: #f3f0e9;
            --paper: #fffdf8;
            --paper-2: #ebe7de;

            --ink: #171717;
            --muted: #77736c;
            --line: #171717;

            --orange: #ff6b35;
            --yellow: #ffd84d;
            --blue: #9ed8ff;
            --green: #b8e986;

            --serif: "Instrument Serif", Georgia, serif;
            --sans: "DM Sans", system-ui, sans-serif;
            --mono: "DM Mono", monospace;

            --shadow: 7px 7px 0 var(--ink);
            --shadow-small: 4px 4px 0 var(--ink);

            --ease: cubic-bezier(.2, .75, .2, 1);
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
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 8% 8%,
                    rgba(255, 107, 53, .10),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 92% 80%,
                    rgba(158, 216, 255, .14),
                    transparent 28%
                ),
                var(--bg);

            color: var(--ink);

            font-family: var(--sans);

            -webkit-font-smoothing: antialiased;

            overflow-x: hidden;
        }

        /* subtle grid */

        body::before {
            content: "";

            position: fixed;
            inset: 0;

            pointer-events: none;

            opacity: .22;

            background-image:
                linear-gradient(
                    rgba(23,23,23,.045) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(23,23,23,.045) 1px,
                    transparent 1px
                );

            background-size: 30px 30px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black,
                    transparent 90%
                );
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* =====================================================
           PAGE
        ====================================================== */

        .page {
            position: relative;
            z-index: 1;

            width: min(1240px, calc(100% - 40px));

            margin: 0 auto;

            padding: 22px 0 70px;
        }

        /* =====================================================
           NAVBAR
        ====================================================== */

        .navbar {
            min-height: 62px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 38px;

            animation: fadeDown .7s var(--ease) both;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;

            text-decoration: none;
        }

        .brand-mark {
            width: 37px;
            height: 37px;

            display: grid;
            place-items: center;

            border: 2px solid var(--ink);
            border-radius: 11px;

            background: var(--yellow);

            box-shadow: var(--shadow-small);

            font-family: var(--serif);
            font-size: 23px;

            transition: .3s var(--ease);
        }

        .brand:hover .brand-mark {
            transform: translate(-2px, -2px) rotate(-4deg);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.045em;
        }

        .brand-name span {
            color: var(--muted);
            font-weight: 500;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 10px 14px;

            border: 1.5px solid transparent;
            border-radius: 999px;

            font-size: 11px;
            font-weight: 700;

            transition: .25s ease;
        }

        .nav-link:hover {
            border-color: var(--ink);
            background: var(--paper);
        }

        .nav-status {
            display: flex;
            align-items: center;
            gap: 8px;

            padding: 9px 13px;

            border: 2px solid var(--ink);
            border-radius: 999px;

            background: var(--green);

            font-family: var(--mono);
            font-size: 9px;
            font-weight: 500;

            box-shadow: 3px 3px 0 var(--ink);
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #28752d;
        }

        /* =====================================================
           BREADCRUMB
        ====================================================== */

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 20px;

            color: var(--muted);

            font-family: var(--mono);
            font-size: 9px;

            text-transform: uppercase;
            letter-spacing: .08em;

            animation: reveal .7s .08s var(--ease) both;
        }

        .breadcrumb a:hover {
            color: var(--ink);
        }

        .breadcrumb strong {
            color: var(--ink);
        }

        /* =====================================================
           HERO
        ====================================================== */

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;

            min-height: 390px;

            overflow: hidden;

            border: 3px solid var(--ink);
            border-radius: 27px;

            background: var(--paper);

            box-shadow: 10px 10px 0 var(--ink);

            animation: reveal .8s .14s var(--ease) both;
        }

        .hero-main {
            position: relative;

            display: flex;
            flex-direction: column;
            justify-content: center;

            padding: 48px;
        }

        .hero-main::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            left: -75px;
            bottom: -90px;

            border-radius: 50%;

            background: var(--blue);

            border: 3px solid var(--ink);
        }

        .hero-label {
            position: relative;
            z-index: 1;

            display: inline-flex;
            align-items: center;
            gap: 8px;

            width: fit-content;

            margin-bottom: 19px;
            padding: 7px 11px;

            border: 2px solid var(--ink);
            border-radius: 999px;

            background: var(--yellow);

            font-family: var(--mono);
            font-size: 9px;
            font-weight: 500;

            text-transform: uppercase;
            letter-spacing: .08em;

            box-shadow: 3px 3px 0 var(--ink);
        }

        .hero-label::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: var(--ink);
        }

        .hero-title {
            position: relative;
            z-index: 1;

            max-width: 760px;

            font-size: clamp(48px, 6.5vw, 78px);

            line-height: .9;

            letter-spacing: -.065em;

            font-weight: 800;
        }

        .hero-title em {
            font-family: var(--serif);
            font-weight: 400;
            font-style: italic;

            color: var(--orange);

            letter-spacing: -.025em;
        }

        .hero-description {
            position: relative;
            z-index: 1;

            max-width: 560px;

            margin-top: 22px;

            color: var(--muted);

            font-size: 13px;

            line-height: 1.7;
        }

        /* =====================================================
           HERO PROFILE SIDE
        ====================================================== */

        .hero-profile {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 34px;

            border-left: 3px solid var(--ink);

            background: var(--orange);

            overflow: hidden;
        }

        .hero-profile::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: -120px;
            top: -120px;

            border-radius: 50%;

            border: 3px solid var(--ink);
        }

        .hero-profile::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            left: -80px;
            bottom: -75px;

            border-radius: 50%;

            background: var(--yellow);

            border: 3px solid var(--ink);
        }

        .profile-card {
            position: relative;
            z-index: 2;

            width: 100%;

            padding: 25px;

            border: 3px solid var(--ink);
            border-radius: 22px;

            background: var(--paper);

            box-shadow: 8px 8px 0 var(--ink);

            transform: rotate(1.5deg);

            transition:
                transform .35s var(--ease),
                box-shadow .35s var(--ease);
        }

        .profile-card:hover {
            transform: rotate(0) translate(-3px, -3px);

            box-shadow: 11px 11px 0 var(--ink);
        }

        .profile-card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;

            margin-bottom: 28px;
        }

        .profile-mini-label {
            color: var(--muted);

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .1em;
        }

        .profile-number {
            color: rgba(23,23,23,.25);

            font-family: var(--serif);
            font-size: 43px;

            line-height: .7;
        }

        .avatar {
            width: 83px;
            height: 83px;

            display: grid;
            place-items: center;

            margin-bottom: 21px;

            border: 3px solid var(--ink);
            border-radius: 18px;

            background: var(--yellow);

            box-shadow: 5px 5px 0 var(--ink);

            font-family: var(--serif);
            font-size: 43px;
        }

        .profile-name {
            font-size: 25px;
            line-height: 1;

            font-weight: 800;

            letter-spacing: -.045em;

            word-break: break-word;
        }

        .profile-nim {
            margin-top: 11px;

            font-family: var(--mono);
            font-size: 9px;

            color: var(--muted);
        }

        /* =====================================================
           QUICK CARDS
        ====================================================== */

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 14px;

            margin-top: 27px;
        }

        .quick-card {
            position: relative;

            min-height: 126px;

            padding: 20px;

            border: 2px solid var(--ink);
            border-radius: 18px;

            background: var(--paper);

            box-shadow: 5px 5px 0 var(--ink);

            animation: reveal .7s var(--delay) var(--ease) both;

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .quick-card:hover {
            transform: translate(-3px, -3px);

            box-shadow: 8px 8px 0 var(--ink);
        }

        .quick-card:nth-child(1) {
            background: var(--yellow);
        }

        .quick-card:nth-child(2) {
            background: var(--blue);
        }

        .quick-card:nth-child(3) {
            background: var(--green);
        }

        .quick-index {
            position: absolute;

            top: 17px;
            right: 19px;

            font-family: var(--mono);
            font-size: 8px;

            opacity: .45;
        }

        .quick-label {
            margin-bottom: 22px;

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .quick-value {
            font-family: var(--serif);

            font-size: 28px;

            line-height: 1;

            word-break: break-word;
        }

        /* =====================================================
           SECTION
        ====================================================== */

        .section {
            margin-top: 58px;
        }

        .section-head {
            display: flex;
            align-items: center;
            gap: 13px;

            margin-bottom: 20px;
        }

        .section-number {
            width: 34px;
            height: 34px;

            display: grid;
            place-items: center;

            border: 2px solid var(--ink);
            border-radius: 9px;

            background: var(--ink);
            color: var(--paper);

            font-family: var(--mono);
            font-size: 9px;
        }

        .section-title {
            font-size: 13px;
            font-weight: 800;

            letter-spacing: -.02em;
        }

        .section-line {
            flex: 1;

            height: 2px;

            background: var(--ink);
        }

        /* =====================================================
           INFORMATION CARD
        ====================================================== */

        .info-card {
            overflow: hidden;

            border: 3px solid var(--ink);
            border-radius: 22px;

            background: var(--paper);

            box-shadow: 8px 8px 0 var(--ink);
        }

        .info-row {
            display: grid;
            grid-template-columns: 190px 1fr;

            min-height: 88px;

            border-bottom: 2px solid var(--ink);
        }

        .info-row:last-child {
            border-bottom: 0;
        }

        .info-label {
            display: flex;
            align-items: center;

            padding: 20px 22px;

            background: var(--paper-2);

            border-right: 2px solid var(--ink);

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .info-value {
            display: flex;
            align-items: center;

            padding: 20px 25px;

            font-size: 14px;
            font-weight: 700;

            word-break: break-word;
        }

        .info-value.large {
            font-family: var(--serif);

            font-size: 27px;
            font-weight: 400;

            line-height: 1;
        }

        .info-value.orange {
            color: var(--orange);
        }

        /* =====================================================
           CONTACT
        ====================================================== */

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 14px;

            margin-top: 14px;
        }

        .contact-card {
            min-height: 140px;

            padding: 22px;

            border: 2px solid var(--ink);
            border-radius: 18px;

            background: var(--paper);

            box-shadow: 5px 5px 0 var(--ink);

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .contact-card:hover {
            transform: translate(-3px, -3px);
            box-shadow: 8px 8px 0 var(--ink);
        }

        .contact-label {
            margin-bottom: 27px;

            color: var(--muted);

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .contact-value {
            font-size: 14px;
            font-weight: 700;

            word-break: break-word;
        }

        /* =====================================================
           RECORD STATUS
        ====================================================== */

        .record-status {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-top: 27px;
            padding: 16px 18px;

            border: 2px solid var(--ink);
            border-radius: 14px;

            background: var(--green);

            font-size: 10px;
            font-weight: 700;
        }

        .record-left {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .record-dot {
            width: 8px;
            height: 8px;

            border: 1.5px solid var(--ink);
            border-radius: 50%;

            background: #28752d;
        }

        .record-date {
            font-family: var(--mono);
            font-size: 8px;
        }

        /* =====================================================
           ACTIONS
        ====================================================== */

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-top: 55px;
            padding-top: 25px;

            border-top: 2px solid var(--ink);
        }

        .action-info {
            color: var(--muted);

            font-family: var(--mono);
            font-size: 8px;

            line-height: 1.7;

            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            min-height: 44px;

            padding: 0 17px;

            border: 2px solid var(--ink);
            border-radius: 999px;

            background: transparent;

            color: var(--ink);

            font-size: 10px;
            font-weight: 800;

            cursor: pointer;

            transition:
                transform .25s var(--ease),
                background .25s ease,
                color .25s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-back {
            background: var(--paper);
        }

        .btn-back:hover {
            background: var(--blue);
        }

        .btn-edit {
            background: var(--ink);
            color: white;

            box-shadow: 4px 4px 0 var(--orange);
        }

        .btn-edit:hover {
            background: var(--orange);
            color: var(--ink);

            box-shadow: 5px 5px 0 var(--ink);
        }

        .btn-delete {
            color: var(--muted);

            border-color: rgba(23,23,23,.25);
        }

        .btn-delete:hover {
            color: white;
            background: var(--orange);
        }

        /* =====================================================
           FOOTER
        ====================================================== */

        .footer {
            display: flex;
            justify-content: space-between;

            gap: 20px;

            margin-top: 55px;
            padding-top: 20px;

            border-top: 1px solid rgba(23,23,23,.2);

            color: var(--muted);

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .08em;
        }

        /* =====================================================
           ANIMATION
        ====================================================== */

        @keyframes fadeDown {

            from {
                opacity: 0;
                transform: translateY(-14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        @keyframes reveal {

            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 950px) {

            .hero {
                grid-template-columns: 1fr;
            }

            .hero-profile {
                min-height: 320px;

                border-left: 0;
                border-top: 3px solid var(--ink);
            }
        }

        @media (max-width: 720px) {

            .page {
                width: min(100% - 24px, 600px);

                padding-top: 12px;
            }

            .navbar {
                margin-bottom: 28px;
            }

            .brand-name {
                display: none;
            }

            .nav-link {
                display: none;
            }

            .nav-status {
                display: none;
            }

            .hero {
                border-radius: 20px;

                box-shadow: 7px 7px 0 var(--ink);
            }

            .hero-main {
                padding: 31px 23px;
            }

            .hero-title {
                font-size: 49px;
            }

            .hero-profile {
                padding: 28px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
            }

            .quick-card {
                min-height: 105px;
            }

            .section {
                margin-top: 45px;
            }

            .info-row {
                grid-template-columns: 1fr;
            }

            .info-label {
                min-height: 45px;

                border-right: 0;
                border-bottom: 2px solid var(--ink);
            }

            .info-value {
                min-height: 70px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .record-status {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions {
                align-items: stretch;
                flex-direction: column;
            }

            .action-buttons {
                width: 100%;

                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .footer {
                flex-direction: column;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <header class="navbar">

        <a
            href="{{ route('mahasiswa.index') }}"
            class="brand"
        >

            <div class="brand-mark">
                S
            </div>

            <div class="brand-name">
                StudentHub
                <span>/ Mahasiswa</span>
            </div>

        </a>


        <div class="nav-right">

            <a
                href="{{ route('mahasiswa.index') }}"
                class="nav-link"
            >
                ← Kembali
            </a>

            <a
                href="{{ route('mahasiswa.create') }}"
                class="nav-link"
            >
                + Tambah Mahasiswa
            </a>

            <div class="nav-status">
                <span class="status-dot"></span>
                SYSTEM ONLINE
            </div>

        </div>

    </header>


    <!-- =====================================================
         BREADCRUMB
    ====================================================== -->

    <div class="breadcrumb">

        <a href="{{ route('mahasiswa.index') }}">
            Mahasiswa
        </a>

        <span>/</span>

        <strong>
            Detail
        </strong>

    </div>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="hero">

        <div class="hero-main">

            <div class="hero-label">
                Student record
            </div>

            <h1 class="hero-title">
                Profil
                <br>
                <em>mahasiswa.</em>
            </h1>

            <p class="hero-description">
                Informasi lengkap mahasiswa yang terdaftar
                di StudentHub. Data akademik dan informasi
                kontak dirangkum dalam satu halaman.
            </p>

        </div>


        <div class="hero-profile">

            <div class="profile-card">

                <div class="profile-card-top">

                    <div class="profile-mini-label">
                        Student profile
                    </div>

                    <div class="profile-number">
                        01
                    </div>

                </div>


                <div class="avatar">
                    {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                </div>


                <div class="profile-name">
                    {{ $mahasiswa->nama }}
                </div>


                <div class="profile-nim">
                    NIM / {{ $mahasiswa->nim }}
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         QUICK INFORMATION
    ====================================================== -->

    <section class="quick-grid">

        <article
            class="quick-card"
            style="--delay:.20s"
        >

            <span class="quick-index">
                01
            </span>

            <div class="quick-label">
                Kelas
            </div>

            <div class="quick-value">
                {{ $mahasiswa->kelas }}
            </div>

        </article>


        <article
            class="quick-card"
            style="--delay:.30s"
        >

            <span class="quick-index">
                02
            </span>

            <div class="quick-label">
                Semester
            </div>

            <div class="quick-value">
                {{ $mahasiswa->semester }}
            </div>

        </article>


        <article
            class="quick-card"
            style="--delay:.40s"
        >

            <span class="quick-index">
                03
            </span>

            <div class="quick-label">
                Program Studi
            </div>

            <div class="quick-value">
                {{ $mahasiswa->jurusan }}
            </div>

        </article>

    </section>


    <!-- =====================================================
         IDENTITAS
    ====================================================== -->

    <section class="section">

        <div class="section-head">

            <div class="section-number">
                01
            </div>

            <div class="section-title">
                Identitas mahasiswa
            </div>

            <div class="section-line"></div>

        </div>


        <div class="info-card">

            <div class="info-row">

                <div class="info-label">
                    Nomor induk mahasiswa
                </div>

                <div class="info-value large">
                    {{ $mahasiswa->nim }}
                </div>

            </div>


            <div class="info-row">

                <div class="info-label">
                    Nama lengkap
                </div>

                <div class="info-value large">
                    {{ $mahasiswa->nama }}
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         AKADEMIK
    ====================================================== -->

    <section class="section">

        <div class="section-head">

            <div class="section-number">
                02
            </div>

            <div class="section-title">
                Informasi akademik
            </div>

            <div class="section-line"></div>

        </div>


        <div class="info-card">

            <div class="info-row">

                <div class="info-label">
                    Kelas
                </div>

                <div class="info-value">
                    {{ $mahasiswa->kelas }}
                </div>

            </div>


            <div class="info-row">

                <div class="info-label">
                    Semester
                </div>

                <div class="info-value orange">
                    Semester {{ $mahasiswa->semester }}
                </div>

            </div>


            <div class="info-row">

                <div class="info-label">
                    Program studi
                </div>

                <div class="info-value">
                    {{ $mahasiswa->jurusan }}
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         KONTAK
    ====================================================== -->

    <section class="section">

        <div class="section-head">

            <div class="section-number">
                03
            </div>

            <div class="section-title">
                Informasi kontak
            </div>

            <div class="section-line"></div>

        </div>


        <div class="contact-grid">

            <article class="contact-card">

                <div class="contact-label">
                    Email
                </div>

                <div class="contact-value">
                    {{ $mahasiswa->email ?: 'Belum diisi' }}
                </div>

            </article>


            <article class="contact-card">

                <div class="contact-label">
                    Nomor handphone
                </div>

                <div class="contact-value">
                    {{ $mahasiswa->no_hp ?: 'Belum diisi' }}
                </div>

            </article>

        </div>


        <!-- STATUS -->

        <div class="record-status">

            <div class="record-left">

                <span class="record-dot"></span>

                <span>
                    Data mahasiswa aktif
                </span>

            </div>


            <div class="record-date">

                Terdaftar
                {{ $mahasiswa->created_at->format('d M Y') }}

            </div>

        </div>

    </section>


    <!-- =====================================================
         ACTIONS
    ====================================================== -->

    <section class="actions">

        <div class="action-info">

            <div>
                StudentHub / Student Record
            </div>

            <div>
                Record #{{ str_pad($mahasiswa->id, 4, '0', STR_PAD_LEFT) }}
            </div>

        </div>


        <div class="action-buttons">

            <!-- DELETE -->

            <form
                action="{{ route('mahasiswa.destroy', $mahasiswa) }}"
                method="POST"
                onsubmit="return confirmDelete()"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-delete"
                >
                    Hapus
                </button>

            </form>


            <!-- BACK -->

            <a
                href="{{ route('mahasiswa.index') }}"
                class="btn btn-back"
            >
                ← Daftar mahasiswa
            </a>


            <!-- EDIT -->

            <a
                href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                class="btn btn-edit"
            >
                Edit mahasiswa
                <span>→</span>
            </a>

        </div>

    </section>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="footer">

        <span>
            StudentHub / Student Management System
        </span>

        <span>
            ID #{{ $mahasiswa->id }}
        </span>

    </footer>

</div>


<script>

    function confirmDelete() {

        return confirm(
            'Yakin ingin menghapus data mahasiswa ini?\n\nData yang sudah dihapus tidak dapat dikembalikan.'
        );

    }

</script>

</body>
</html>