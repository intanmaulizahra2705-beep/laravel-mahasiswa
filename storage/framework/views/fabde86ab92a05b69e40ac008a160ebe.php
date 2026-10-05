<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mahasiswa — StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Instrument+Serif:ital@0;1&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --paper: #f4f0e8;
            --paper-dark: #e9e1d4;
            --ink: #171716;
            --white: #fffdf8;
            --muted: #77736b;
            --line: #171716;

            --clay: #c45239;
            --clay-light: #e6a08e;

            --yellow: #f3cc4f;
            --blue: #9bc6c9;
            --green: #a8c998;
            --pink: #e5aaa0;
            --lavender: #b8a9d9;

            --serif: "Instrument Serif", serif;
            --sans: "Manrope", sans-serif;
            --mono: "DM Mono", monospace;

            --shadow: 8px 8px 0 var(--ink);
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
                    rgba(243, 204, 79, .24),
                    transparent 20%
                ),
                radial-gradient(
                    circle at 94% 38%,
                    rgba(155, 198, 201, .22),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 50% 100%,
                    rgba(196, 82, 57, .08),
                    transparent 25%
                ),
                var(--paper);

            color: var(--ink);
            font-family: var(--sans);

            overflow-x: hidden;
        }

        /* =====================================================
           PAPER TEXTURE
        ===================================================== */

        body::before {
            content: "";

            position: fixed;
            inset: 0;

            pointer-events: none;
            z-index: -2;

            opacity: .035;

            background-image:
                repeating-linear-gradient(
                    0deg,
                    #000 0,
                    #000 1px,
                    transparent 1px,
                    transparent 5px
                );
        }

        body::after {
            content: "";

            position: fixed;
            width: 380px;
            height: 380px;

            right: -160px;
            top: 15%;

            border: 2px solid var(--ink);
            border-radius: 50%;

            opacity: .035;

            pointer-events: none;
            z-index: -1;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        /* =====================================================
           MAIN CONTAINER
        ===================================================== */

        .container {
            width: min(1460px, calc(100% - 48px));

            margin: auto;
        }

        /* =====================================================
           TOP MINI BRAND
        ===================================================== */

        .topline {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding-top: 28px;

            font-family: var(--mono);
            font-size: 8px;
            letter-spacing: .08em;
            text-transform: uppercase;

            color: var(--muted);
        }

        .topline-left {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .top-dot {
            width: 8px;
            height: 8px;

            background: var(--clay);

            border: 1.5px solid var(--ink);
            border-radius: 50%;
        }

        .topline-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topline-right::before {
            content: "";

            width: 28px;
            height: 1px;

            background: var(--ink);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .intro {
            min-height: 520px;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                410px;

            align-items: center;

            gap: 80px;

            padding: 80px 10px 75px;

            position: relative;
        }

        .intro-copy {
            position: relative;
            z-index: 3;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 8px 11px;

            border: 2px solid var(--ink);
            border-radius: 8px;

            background: var(--white);

            box-shadow: 4px 4px 0 var(--ink);

            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .eyebrow span {
            display: block;

            width: 7px;
            height: 7px;

            background: var(--clay);

            border: 1px solid var(--ink);
            border-radius: 50%;
        }

        .intro h1 {
            max-width: 920px;

            margin-top: 28px;

            font-family: var(--serif);
            font-size: clamp(80px, 10vw, 145px);

            font-weight: 400;

            line-height: .70;
            letter-spacing: -.065em;
        }

        .intro h1 em {
            color: var(--clay);
            font-style: italic;
        }

        .intro-text {
            max-width: 535px;

            margin-top: 35px;

            font-size: 12px;
            line-height: 1.85;

            color: var(--muted);
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 28px;
        }

        .hero-chip {
            padding: 8px 10px;

            border: 1.5px solid var(--ink);
            border-radius: 7px;

            background: var(--white);

            font-family: var(--mono);
            font-size: 7px;

            text-transform: uppercase;
        }

        .hero-chip.dark {
            background: var(--ink);
            color: var(--white);
        }

        /* =====================================================
           HERO RECORD CARD
        ===================================================== */

        .hero-record {
            position: relative;

            width: 100%;
            min-height: 360px;

            padding: 25px;

            background: var(--yellow);

            border: 3px solid var(--ink);
            border-radius: 30px;

            box-shadow: 13px 13px 0 var(--ink);

            transform: rotate(2.5deg);

            overflow: hidden;

            z-index: 2;
        }

        .hero-record::before {
            content: "";

            position: absolute;

            width: 160px;
            height: 160px;

            right: -70px;
            bottom: -65px;

            border: 3px solid var(--ink);
            border-radius: 50%;

            background: var(--clay);

            opacity: .75;
        }

        .hero-record::after {
            content: "01";

            position: absolute;

            right: 18px;
            top: 70px;

            font-family: var(--serif);
            font-size: 125px;

            line-height: .7;

            opacity: .08;

            transform: rotate(-8deg);
        }

        .record-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            position: relative;
            z-index: 2;
        }

        .record-label {
            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
        }

        .record-symbol {
            width: 40px;
            height: 40px;

            display: grid;
            place-items: center;

            background: var(--white);

            border: 2px solid var(--ink);
            border-radius: 10px;

            font-size: 18px;

            box-shadow: 3px 3px 0 var(--ink);
        }

        .record-number {
            margin-top: 72px;

            font-family: var(--serif);
            font-size: 118px;

            line-height: .65;
            letter-spacing: -.06em;

            position: relative;
            z-index: 2;
        }

        .record-title {
            margin-top: 20px;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .02em;

            position: relative;
            z-index: 2;
        }

        .record-bottom {
            position: absolute;

            left: 25px;
            right: 25px;
            bottom: 24px;

            display: flex;
            justify-content: space-between;
            align-items: end;

            z-index: 4;
        }

        .record-bottom span {
            font-family: var(--mono);
            font-size: 7px;

            text-transform: uppercase;
        }

        .record-arrow {
            width: 42px;
            height: 42px;

            display: grid;
            place-items: center;

            background: var(--ink);
            color: var(--white);

            border-radius: 50%;

            font-size: 17px;
        }

        /* =====================================================
           STATS
        ===================================================== */

        .stats {
            display: grid;

            grid-template-columns:
                1.35fr
                1fr
                1fr
                1fr;

            gap: 14px;

            margin-bottom: 105px;
        }

        .stat {
            min-height: 145px;

            padding: 20px;

            border: 2.5px solid var(--ink);
            border-radius: 20px;

            position: relative;

            overflow: hidden;

            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .stat:hover {
            transform: translate(-3px, -5px) rotate(-1deg);
            box-shadow: 9px 9px 0 var(--ink);
        }

        .stat::after {
            content: "";

            position: absolute;

            width: 75px;
            height: 75px;

            right: -35px;
            bottom: -35px;

            border: 2px solid currentColor;
            border-radius: 50%;

            opacity: .12;
        }

        .stat:nth-child(1) {
            background: var(--ink);
            color: var(--white);

            box-shadow: 7px 7px 0 var(--clay);
        }

        .stat:nth-child(2) {
            background: var(--blue);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .stat:nth-child(3) {
            background: var(--green);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .stat:nth-child(4) {
            background: var(--white);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .stat-label {
            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
        }

        .stat-value {
            margin-top: 26px;

            font-family: var(--serif);
            font-size: 62px;

            line-height: .72;

            letter-spacing: -.04em;
        }

        .stat-small {
            position: absolute;

            right: 18px;
            bottom: 17px;

            font-family: var(--mono);
            font-size: 7px;

            opacity: .55;
        }

        /* =====================================================
           DATABASE HEADER
        ===================================================== */

        .database-head {
            display: flex;
            align-items: end;
            justify-content: space-between;

            gap: 30px;

            margin-bottom: 30px;
        }

        .database-title .kicker {
            font-family: var(--mono);
            font-size: 8px;

            text-transform: uppercase;
            letter-spacing: .1em;

            color: var(--muted);
        }

        .database-title h2 {
            margin-top: 8px;

            font-family: var(--serif);
            font-size: clamp(52px, 5vw, 72px);

            font-weight: 400;

            line-height: .78;
            letter-spacing: -.05em;
        }

        .database-title p {
            margin-top: 17px;

            font-size: 10px;
            color: var(--muted);
        }

        .database-side {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .result-count {
            font-family: var(--mono);
            font-size: 8px;

            color: var(--muted);

            white-space: nowrap;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 13px 15px;

            background: var(--clay);
            color: white;

            border: 2px solid var(--ink);
            border-radius: 11px;

            box-shadow: 4px 4px 0 var(--ink);

            font-size: 9px;
            font-weight: 800;

            transition: .2s ease;
        }

        .add-button:hover {
            background: var(--yellow);
            color: var(--ink);

            transform: translate(-2px, -2px);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .add-button span {
            font-size: 15px;
            line-height: .5;
        }

        /* =====================================================
           TOOLBAR
        ===================================================== */

        .toolbar {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 38px;
        }

        .search {
            flex: 1;

            display: flex;
            align-items: center;
            gap: 11px;

            padding: 14px 16px;

            background: var(--white);

            border: 2px solid var(--ink);
            border-radius: 13px;

            box-shadow: 5px 5px 0 var(--ink);

            transition: .2s ease;
        }

        .search:focus-within {
            transform: translate(-2px, -2px);
            box-shadow: 7px 7px 0 var(--clay);
        }

        .search svg {
            width: 16px;
            height: 16px;

            flex-shrink: 0;
        }

        .search input {
            width: 100%;

            border: 0;
            outline: 0;

            background: transparent;

            color: var(--ink);

            font-size: 10px;
        }

        .search input::placeholder {
            color: #aaa49a;
        }

        .filters {
            display: flex;
            gap: 7px;

            flex-wrap: wrap;
        }

        .filter-button {
            padding: 12px 13px;

            border: 2px solid var(--ink);
            border-radius: 10px;

            background: transparent;
            color: var(--ink);

            cursor: pointer;

            font-size: 8px;
            font-weight: 800;

            transition: .2s ease;
        }

        .filter-button:hover {
            transform: translateY(-2px);
        }

        .filter-button.active {
            background: var(--ink);
            color: var(--white);

            box-shadow: 4px 4px 0 var(--clay);
        }

        /* =====================================================
           GRID
        ===================================================== */

        .student-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 20px;

            padding-bottom: 110px;
        }

        /* =====================================================
           STUDENT CARD
        ===================================================== */

        .student-card {
            min-height: 365px;

            padding: 22px;

            border: 3px solid var(--ink);
            border-radius: 27px;

            position: relative;
            overflow: hidden;

            display: flex;
            flex-direction: column;

            box-shadow: 8px 8px 0 var(--ink);

            transition:
                transform .25s cubic-bezier(.2,.8,.2,1),
                box-shadow .25s ease;

            animation: cardIn .5s ease both;
        }

        .student-card:nth-child(3n + 1) {
            background: var(--white);
        }

        .student-card:nth-child(3n + 2) {
            background: var(--blue);
        }

        .student-card:nth-child(3n + 3) {
            background: var(--paper-dark);
        }

        .student-card:hover {
            transform: translate(-5px, -8px) rotate(-1deg);
            box-shadow: 14px 14px 0 var(--clay);
        }

        .card-decoration {
            position: absolute;

            right: -52px;
            top: -52px;

            width: 145px;
            height: 145px;

            border-radius: 50%;

            background: var(--yellow);

            border: 3px solid var(--ink);

            opacity: .85;

            transition: .3s ease;
        }

        .student-card:hover .card-decoration {
            transform: scale(1.08) rotate(12deg);
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            position: relative;
            z-index: 3;
        }

        .card-number {
            padding: 7px 9px;

            background: var(--ink);
            color: var(--white);

            border-radius: 7px;

            font-family: var(--mono);
            font-size: 8px;
        }

        .card-avatar {
            width: 73px;
            height: 73px;

            display: grid;
            place-items: center;

            background: var(--white);

            border: 3px solid var(--ink);
            border-radius: 50%;

            font-family: var(--serif);
            font-size: 36px;

            box-shadow: 4px 4px 0 var(--ink);
        }

        .card-content {
            margin-top: 28px;

            position: relative;
            z-index: 3;
        }

        .card-name {
            max-width: 270px;

            font-family: var(--serif);
            font-size: 37px;

            font-weight: 400;

            line-height: .84;
            letter-spacing: -.035em;
        }

        .card-nim {
            margin-top: 10px;

            font-family: var(--mono);
            font-size: 8px;

            color: #625e57;
        }

        .card-info {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 8px;

            margin-top: 26px;
        }

        .info-box {
            min-height: 58px;

            padding: 10px;

            background: rgba(255,255,255,.55);

            border: 1.5px solid var(--ink);
            border-radius: 11px;

            backdrop-filter: blur(2px);
        }

        .info-label {
            font-family: var(--mono);
            font-size: 6px;

            text-transform: uppercase;

            opacity: .55;
        }

        .info-value {
            margin-top: 6px;

            font-size: 9px;
            font-weight: 800;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-footer {
            margin-top: auto;
            padding-top: 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            position: relative;
            z-index: 4;
        }

        .card-status {
            display: flex;
            align-items: center;
            gap: 6px;

            font-family: var(--mono);
            font-size: 6.5px;

            letter-spacing: .04em;
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #69a858;

            border: 1px solid var(--ink);
        }

        .card-actions {
            display: flex;
            gap: 5px;
        }

        .action-button {
            width: 34px;
            height: 34px;

            display: grid;
            place-items: center;

            background: var(--white);
            color: var(--ink);

            border: 2px solid var(--ink);
            border-radius: 9px;

            cursor: pointer;

            transition: .18s ease;
        }

        .action-button:hover {
            background: var(--ink);
            color: white;

            transform: translateY(-3px);
        }

        .action-button.delete:hover {
            background: var(--clay);
            border-color: var(--clay);
        }

        .action-button svg {
            width: 13px;
            height: 13px;
        }

        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {
            grid-column: 1 / -1;

            min-height: 390px;

            display: grid;
            place-items: center;

            padding: 45px;

            background: var(--white);

            border: 3px solid var(--ink);
            border-radius: 28px;

            box-shadow: 10px 10px 0 var(--ink);

            text-align: center;
        }

        .empty-icon {
            width: 78px;
            height: 78px;

            display: grid;
            place-items: center;

            margin: auto;

            background: var(--yellow);

            border: 3px solid var(--ink);
            border-radius: 19px;

            font-family: var(--serif);
            font-size: 42px;

            box-shadow: 5px 5px 0 var(--ink);
        }

        .empty-state h3 {
            margin-top: 22px;

            font-family: var(--serif);
            font-size: 43px;

            font-weight: 400;
        }

        .empty-state p {
            max-width: 400px;

            margin: 10px auto 23px;

            font-size: 10px;
            line-height: 1.75;

            color: var(--muted);
        }

        .empty-button {
            display: inline-flex;

            padding: 13px 17px;

            background: var(--ink);
            color: white;

            border-radius: 10px;

            box-shadow: 4px 4px 0 var(--clay);

            font-size: 9px;
            font-weight: 800;

            transition: .2s ease;
        }

        .empty-button:hover {
            transform: translate(-2px, -2px);
        }

        /* =====================================================
           NO RESULT
        ===================================================== */

        .no-result {
            display: none;

            grid-column: 1 / -1;

            padding: 85px 20px;

            text-align: center;

            border: 2px dashed var(--ink);
            border-radius: 23px;

            background: rgba(255,255,255,.35);
        }

        .no-result strong {
            font-family: var(--serif);
            font-size: 42px;

            font-weight: 400;
        }

        .no-result p {
            margin-top: 7px;

            font-size: 10px;

            color: var(--muted);
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            border-top: 3px solid var(--ink);

            padding: 27px 0 40px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-brand {
            font-family: var(--serif);
            font-size: 28px;
        }

        .footer-copy {
            font-family: var(--mono);
            font-size: 7px;

            color: var(--muted);
            text-transform: uppercase;
        }

        /* =====================================================
           TOAST
        ===================================================== */

        .toast {
            position: fixed;

            right: 25px;
            bottom: 25px;

            z-index: 100;

            display: flex;
            align-items: center;
            gap: 10px;

            max-width: 380px;

            padding: 15px 18px;

            background: var(--ink);
            color: var(--white);

            border: 2px solid var(--white);
            border-radius: 13px;

            box-shadow: 7px 7px 0 var(--clay);

            font-size: 10px;
            font-weight: 700;

            opacity: 0;
            transform: translateY(20px);

            pointer-events: none;

            transition: .3s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast-dot {
            width: 8px;
            height: 8px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #91c77e;
        }

        /* =====================================================
           DELETE MODAL
        ===================================================== */

        .modal-overlay {
            position: fixed;
            inset: 0;

            z-index: 200;

            display: none;
            place-items: center;

            padding: 20px;

            background: rgba(23,23,22,.64);

            backdrop-filter: blur(8px);
        }

        .modal-overlay.show {
            display: grid;
        }

        .modal {
            width: min(440px, 100%);

            padding: 29px;

            background: var(--paper);

            border: 3px solid var(--ink);
            border-radius: 24px;

            box-shadow: 11px 11px 0 var(--clay);

            animation: modalIn .25s ease;
        }

        .modal-kicker {
            font-family: var(--mono);
            font-size: 8px;

            color: var(--clay);

            text-transform: uppercase;
        }

        .modal h3 {
            margin-top: 9px;

            font-family: var(--serif);
            font-size: 45px;

            font-weight: 400;
            line-height: .82;
        }

        .modal p {
            margin-top: 14px;

            font-size: 10px;
            line-height: 1.7;

            color: var(--muted);
        }

        .modal-name {
            margin-top: 19px;

            padding: 14px;

            background: var(--yellow);

            border: 2px solid var(--ink);
            border-radius: 11px;

            font-size: 11px;
            font-weight: 800;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;

            margin-top: 24px;
        }

        .modal-button {
            padding: 11px 15px;

            border: 2px solid var(--ink);
            border-radius: 9px;

            cursor: pointer;

            font-size: 9px;
            font-weight: 800;
        }

        .modal-cancel {
            background: var(--white);
        }

        .modal-delete {
            background: var(--clay);
            color: white;

            border-color: var(--clay);
        }

        /* =====================================================
           ANIMATION
        ===================================================== */

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(15px) scale(.96);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =====================================================
           RESPONSIVE 1100
        ===================================================== */

        @media (max-width: 1100px) {

            .intro {
                grid-template-columns:
                    minmax(0, 1fr)
                    330px;

                gap: 45px;
            }

            .intro h1 {
                font-size: clamp(75px, 9vw, 110px);
            }

            .student-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .stats {
                grid-template-columns:
                    1fr 1fr;
            }

            .stat:nth-child(1) {
                grid-column: span 2;
            }
        }

        /* =====================================================
           RESPONSIVE 800
        ===================================================== */

        @media (max-width: 800px) {

            .container {
                width: calc(100% - 28px);
            }

            .topline {
                padding-top: 18px;
            }

            .intro {
                display: block;

                padding: 70px 4px 60px;
            }

            .intro h1 {
                font-size: clamp(70px, 17vw, 105px);
            }

            .intro-text {
                max-width: 600px;
            }

            .hero-record {
                width: min(380px, calc(100% - 18px));

                margin: 65px auto 15px;

                transform: rotate(1.7deg);
            }

            .stats {
                margin-bottom: 75px;
            }

            .database-head {
                display: block;
            }

            .database-side {
                margin-top: 25px;

                justify-content: space-between;
            }

            .toolbar {
                display: block;
            }

            .filters {
                margin-top: 14px;

                overflow-x: auto;

                flex-wrap: nowrap;

                padding: 2px 3px 7px;
            }

            .filter-button {
                flex-shrink: 0;
            }
        }

        /* =====================================================
           RESPONSIVE 600
        ===================================================== */

        @media (max-width: 600px) {

            .container {
                width: calc(100% - 22px);
            }

            .topline-right {
                display: none;
            }

            .intro {
                padding-top: 58px;
            }

            .intro h1 {
                font-size: 70px;

                line-height: .72;
            }

            .intro-text {
                font-size: 11px;
            }

            .hero-meta {
                flex-wrap: wrap;
            }

            .hero-record {
                min-height: 330px;

                padding: 21px;
            }

            .record-number {
                font-size: 100px;

                margin-top: 65px;
            }

            .stats {
                grid-template-columns: 1fr 1fr;

                gap: 9px;
            }

            .stat:nth-child(1) {
                grid-column: span 2;
            }

            .stat {
                min-height: 120px;

                padding: 16px;
            }

            .stat-value {
                font-size: 48px;
            }

            .database-title h2 {
                font-size: 53px;
            }

            .database-side {
                align-items: stretch;

                flex-direction: column;
            }

            .add-button {
                justify-content: center;
            }

            .student-grid {
                grid-template-columns: 1fr;

                gap: 16px;
            }

            .student-card {
                min-height: 350px;
            }

            .card-name {
                font-size: 34px;
            }

            .toast {
                left: 13px;
                right: 13px;
                bottom: 13px;
            }

            footer {
                display: block;
            }

            .footer-copy {
                margin-top: 9px;
            }
        }

        /* =====================================================
           RESPONSIVE 400
        ===================================================== */

        @media (max-width: 400px) {

            .intro h1 {
                font-size: 61px;
            }

            .hero-record {
                width: calc(100% - 12px);
            }

            .record-number {
                font-size: 88px;
            }

            .stat-value {
                font-size: 42px;
            }

            .database-title h2 {
                font-size: 47px;
            }

            .student-card {
                padding: 18px;
            }

            .card-avatar {
                width: 65px;
                height: 65px;

                font-size: 32px;
            }

            .card-info {
                gap: 6px;
            }

            .info-box {
                padding: 9px;
            }

            .info-value {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>

    <main class="container">

        

        <div class="topline">

            <div class="topline-left">
                <span class="top-dot"></span>
                StudentHub / Student Database
            </div>

            <div class="topline-right">
                Fakultas Teknik · 2026
            </div>

        </div>


        

        <section class="intro">

            <div class="intro-copy">

                <div class="eyebrow">
                    <span></span>
                    Student records / database
                </div>

                <h1>
                    Semua<br>
                    <em>mahasiswa.</em>
                </h1>

                <p class="intro-text">
                    Satu ruang untuk melihat, mencari, mengelola,
                    dan memperbarui seluruh data mahasiswa.
                    Dibuat sederhana supaya data tetap rapi,
                    cepat ditemukan, dan nyaman digunakan.
                </p>

                <div class="hero-meta">

                    <div class="hero-chip dark">
                        <?php echo e($mahasiswas->count()); ?> Records
                    </div>

                    <div class="hero-chip">
                        Live Database
                    </div>

                    <div class="hero-chip">
                        2026
                    </div>

                </div>

            </div>


            

            <div class="hero-record">

                <div class="record-top">

                    <div class="record-label">
                        StudentHub / Records
                    </div>

                    <div class="record-symbol">
                        ✦
                    </div>

                </div>

                <div class="record-number">
                    <?php echo e(str_pad(
                        $mahasiswas->count(),
                        2,
                        '0',
                        STR_PAD_LEFT
                    )); ?>

                </div>

                <div class="record-title">
                    Total mahasiswa<br>
                    terdaftar
                </div>

                <div class="record-bottom">

                    <span>
                        Database active
                    </span>

                    <div class="record-arrow">
                        ↓
                    </div>

                </div>

            </div>

        </section>


        

        <section class="stats">

            <div class="stat">

                <div class="stat-label">
                    Total mahasiswa
                </div>

                <div class="stat-value">
                    <?php echo e($mahasiswas->count()); ?>

                </div>

                <div class="stat-small">
                    RECORDS
                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    Kelas
                </div>

                <div class="stat-value">
                    <?php echo e($mahasiswas->unique('kelas')->count()); ?>

                </div>

                <div class="stat-small">
                    GROUPS
                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    Jurusan
                </div>

                <div class="stat-value">
                    <?php echo e($mahasiswas->unique('jurusan')->count()); ?>

                </div>

                <div class="stat-small">
                    FIELDS
                </div>

            </div>


            <div class="stat">

                <div class="stat-label">
                    Status
                </div>

                <div class="stat-value">
                    ✓
                </div>

                <div class="stat-small">
                    ACTIVE
                </div>

            </div>

        </section>


        

        <section id="database">

            <div class="database-head">

                <div class="database-title">

                    <div class="kicker">
                        01 / Student records
                    </div>

                    <h2>
                        Data mahasiswa.
                    </h2>

                    <p>
                        Pilih mahasiswa untuk melihat detail lengkap.
                    </p>

                </div>


                <div class="database-side">

                    <div class="result-count">
                        <?php echo e($mahasiswas->count()); ?> RECORDS FOUND
                    </div>

                    <a
                        href="<?php echo e(route('mahasiswa.create')); ?>"
                        class="add-button"
                    >
                        <span>+</span>
                        Tambah mahasiswa
                    </a>

                </div>

            </div>


            

            <div class="toolbar">

                <div class="search">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        />

                        <path d="m20 20-4-4"/>

                    </svg>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama, NIM, kelas, atau jurusan..."
                        autocomplete="off"
                    >

                </div>


                <div class="filters">

                    <button
                        type="button"
                        class="filter-button active"
                        data-filter="all"
                    >
                        Semua
                    </button>

                    <?php $__currentLoopData = $mahasiswas
                            ->pluck('kelas')
                            ->unique()
                            ->filter()
                            ->sort(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <button
                            type="button"
                            class="filter-button"
                            data-filter="<?php echo e(strtolower($kelas)); ?>"
                        >
                            <?php echo e($kelas); ?>

                        </button>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>


            

            <section
                class="student-grid"
                id="studentGrid"
            >

                <?php $__empty_1 = true; $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <article
                        class="student-card"

                        data-name="<?php echo e(strtolower($mahasiswa->nama)); ?>"

                        data-nim="<?php echo e(strtolower($mahasiswa->nim)); ?>"

                        data-kelas="<?php echo e(strtolower($mahasiswa->kelas)); ?>"

                        data-jurusan="<?php echo e(strtolower($mahasiswa->jurusan)); ?>"

                        style="
                            animation-delay:
                            <?php echo e(min($index * 0.05, .5)); ?>s;
                        "
                    >

                        <div class="card-decoration"></div>


                        

                        <div class="card-header">

                            <div class="card-number">
                                #<?php echo e(str_pad(
                                    $index + 1,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                )); ?>

                            </div>

                            <div class="card-avatar">
                                <?php echo e(strtoupper(
                                    substr($mahasiswa->nama, 0, 1)
                                )); ?>

                            </div>

                        </div>


                        

                        <div class="card-content">

                            <div class="card-name">
                                <?php echo e($mahasiswa->nama); ?>

                            </div>

                            <div class="card-nim">
                                NIM · <?php echo e($mahasiswa->nim); ?>

                            </div>


                            <div class="card-info">

                                <div class="info-box">

                                    <div class="info-label">
                                        Kelas
                                    </div>

                                    <div class="info-value">
                                        <?php echo e($mahasiswa->kelas ?: '—'); ?>

                                    </div>

                                </div>


                                <div class="info-box">

                                    <div class="info-label">
                                        Semester
                                    </div>

                                    <div class="info-value">
                                        <?php echo e($mahasiswa->semester
                                            ? 'Semester '.$mahasiswa->semester
                                            : '—'); ?>

                                    </div>

                                </div>


                                <div class="info-box">

                                    <div class="info-label">
                                        Jurusan
                                    </div>

                                    <div class="info-value">
                                        <?php echo e($mahasiswa->jurusan ?: '—'); ?>

                                    </div>

                                </div>


                                <div class="info-box">

                                    <div class="info-label">
                                        Email
                                    </div>

                                    <div class="info-value">
                                        <?php echo e($mahasiswa->email ?: '—'); ?>

                                    </div>

                                </div>

                            </div>

                        </div>


                        

                        <div class="card-footer">

                            <div class="card-status">

                                <span class="status-dot"></span>

                                DATA AKTIF

                            </div>


                            <div class="card-actions">

                                

                                <a
                                    href="<?php echo e(route(
                                        'mahasiswa.show',
                                        $mahasiswa
                                    )); ?>"

                                    class="action-button"

                                    title="Lihat detail"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path
                                            d="M2.5 12s3.5-6 9.5-6
                                            9.5 6 9.5 6-3.5 6-9.5
                                            6-9.5-6-9.5-6Z"
                                        />

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="2.5"
                                        />

                                    </svg>

                                </a>


                                

                                <a
                                    href="<?php echo e(route(
                                        'mahasiswa.edit',
                                        $mahasiswa
                                    )); ?>"

                                    class="action-button"

                                    title="Edit"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path d="M12 20h9"/>

                                        <path
                                            d="M16.5 3.5a2.1 2.1
                                            0 0 1 3 3L8 18l-4 1
                                            1-4Z"
                                        />

                                    </svg>

                                </a>


                                

                                <button
                                    type="button"

                                    class="action-button delete"

                                    title="Hapus"

                                    onclick="openDeleteModal(
                                        '<?php echo e($mahasiswa->id); ?>',
                                        <?php echo \Illuminate\Support\Js::from($mahasiswa->nama)->toHtml() ?>
                                    )"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path d="M4 7h16"/>

                                        <path d="M10 11v6"/>

                                        <path d="M14 11v6"/>

                                        <path
                                            d="M6 7l1 13h10l1-13"
                                        />

                                        <path
                                            d="M9 7V4h6v3"
                                        />

                                    </svg>

                                </button>

                            </div>

                        </div>

                    </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="empty-state">

                        <div>

                            <div class="empty-icon">
                                +
                            </div>

                            <h3>
                                Belum ada mahasiswa.
                            </h3>

                            <p>
                                Database kamu masih kosong.
                                Tambahkan mahasiswa pertama
                                untuk mulai mengisi StudentHub.
                            </p>

                            <a
                                href="<?php echo e(route('mahasiswa.create')); ?>"
                                class="empty-button"
                            >
                                + Tambah mahasiswa
                            </a>

                        </div>

                    </div>

                <?php endif; ?>


                <div
                    class="no-result"
                    id="noResult"
                >

                    <strong>
                        Tidak ditemukan.
                    </strong>

                    <p>
                        Coba gunakan kata kunci atau filter kelas lainnya.
                    </p>

                </div>

            </section>

        </section>


        

        <footer>

            <div class="footer-brand">
                StudentHub.
            </div>

            <div class="footer-copy">
                Student Database System · 2026
            </div>

        </footer>

    </main>


    

    <?php if(session('success')): ?>

        <div
            class="toast show"
            id="successToast"
        >

            <span class="toast-dot"></span>

            <span>
                <?php echo e(session('success')); ?>

            </span>

        </div>

    <?php endif; ?>


    

    <div
        class="modal-overlay"
        id="deleteModal"
    >

        <div class="modal">

            <div class="modal-kicker">
                Confirmation / Delete
            </div>

            <h3>
                Hapus mahasiswa?
            </h3>

            <p>
                Data mahasiswa yang dihapus tidak dapat dikembalikan.
                Pastikan data yang dipilih memang ingin dihapus.
            </p>

            <div
                class="modal-name"
                id="deleteStudentName"
            >
                -
            </div>


            <div class="modal-actions">

                <button
                    type="button"
                    class="modal-button modal-cancel"
                    onclick="closeDeleteModal()"
                >
                    Batal
                </button>


                <form
                    id="deleteForm"
                    method="POST"
                >

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        type="submit"
                        class="modal-button modal-delete"
                    >
                        Hapus data
                    </button>

                </form>

            </div>

        </div>

    </div>


    <script>

        /* =====================================================
           SEARCH
        ===================================================== */

        const searchInput =
            document.getElementById('searchInput');

        const studentCards =
            document.querySelectorAll('.student-card');

        const noResult =
            document.getElementById('noResult');

        const filterButtons =
            document.querySelectorAll('.filter-button');


        let activeFilter = 'all';


        function filterStudents() {

            const keyword =
                searchInput
                    ? searchInput.value
                        .toLowerCase()
                        .trim()
                    : '';


            let visibleCount = 0;


            studentCards.forEach(card => {

                const name =
                    card.dataset.name || '';

                const nim =
                    card.dataset.nim || '';

                const kelas =
                    card.dataset.kelas || '';

                const jurusan =
                    card.dataset.jurusan || '';


                const matchesSearch =
                    name.includes(keyword) ||
                    nim.includes(keyword) ||
                    kelas.includes(keyword) ||
                    jurusan.includes(keyword);


                const matchesFilter =
                    activeFilter === 'all' ||
                    kelas === activeFilter;


                if (
                    matchesSearch &&
                    matchesFilter
                ) {

                    card.style.display = 'flex';

                    visibleCount++;

                } else {

                    card.style.display = 'none';

                }

            });


            if (noResult) {

                noResult.style.display =
                    visibleCount === 0 &&
                    studentCards.length > 0
                        ? 'block'
                        : 'none';

            }

        }


        if (searchInput) {

            searchInput.addEventListener(
                'input',
                filterStudents
            );

        }


        /* =====================================================
           FILTER
        ===================================================== */

        filterButtons.forEach(button => {

            button.addEventListener(
                'click',
                () => {

                    filterButtons.forEach(item => {

                        item.classList.remove(
                            'active'
                        );

                    });


                    button.classList.add('active');


                    activeFilter =
                        button.dataset.filter;


                    filterStudents();

                }
            );

        });


        /* =====================================================
           DELETE MODAL
        ===================================================== */

        const deleteModal =
            document.getElementById(
                'deleteModal'
            );

        const deleteForm =
            document.getElementById(
                'deleteForm'
            );

        const deleteStudentName =
            document.getElementById(
                'deleteStudentName'
            );


        function openDeleteModal(
            id,
            name
        ) {

            deleteForm.action =
                "<?php echo e(url('/mahasiswa')); ?>/" +
                id;


            deleteStudentName.textContent =
                name;


            deleteModal.classList.add(
                'show'
            );


            document.body.style.overflow =
                'hidden';

        }


        function closeDeleteModal() {

            deleteModal.classList.remove(
                'show'
            );


            document.body.style.overflow =
                '';

        }


        deleteModal.addEventListener(
            'click',
            function(event) {

                if (
                    event.target ===
                    deleteModal
                ) {

                    closeDeleteModal();

                }

            }
        );


        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key === 'Escape'
                ) {

                    closeDeleteModal();

                }

            }
        );


        /* =====================================================
           TOAST
        ===================================================== */

        const successToast =
            document.getElementById(
                'successToast'
            );


        if (successToast) {

            setTimeout(
                () => {

                    successToast.classList.remove(
                        'show'
                    );

                },
                3500
            );

        }


        /* =====================================================
           INITIAL FILTER
        ===================================================== */

        filterStudents();

    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-3\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>