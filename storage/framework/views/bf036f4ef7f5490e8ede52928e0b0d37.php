<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa — StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =====================================================
           ROOT
        ====================================================== */

        :root {
            --bg: #f3f0e9;
            --paper: #fffdf8;
            --paper-2: #ebe7de;

            --ink: #171717;
            --muted: #77736c;

            --orange: #ff6b35;
            --yellow: #ffd84d;
            --blue: #9ed8ff;
            --green: #b8e986;

            --line: #171717;

            --serif: "Instrument Serif", Georgia, serif;
            --sans: "DM Sans", system-ui, sans-serif;
            --mono: "DM Mono", monospace;

            --shadow: 8px 8px 0 var(--ink);
            --shadow-small: 4px 4px 0 var(--ink);

            --ease: cubic-bezier(.2, .75, .2, 1);
        }


        /* =====================================================
           RESET
        ====================================================== */

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
                    circle at 7% 10%,
                    rgba(255, 107, 53, .10),
                    transparent 24%
                ),
                radial-gradient(
                    circle at 92% 82%,
                    rgba(158, 216, 255, .13),
                    transparent 27%
                ),
                var(--bg);

            color: var(--ink);

            font-family: var(--sans);

            -webkit-font-smoothing: antialiased;

            overflow-x: hidden;
        }

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

        ::selection {
            background: var(--orange);
            color: white;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }


        /* =====================================================
           PAGE
        ====================================================== */

        .page {
            position: relative;
            z-index: 1;

            width: min(
                1240px,
                calc(100% - 40px)
            );

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

            animation:
                fadeDown .7s
                var(--ease)
                both;
        }

        .brand {
            display: flex;

            align-items: center;

            gap: 11px;
        }

        .brand-mark {
            width: 37px;
            height: 37px;

            display: grid;

            place-items: center;

            border: 2px solid var(--ink);

            border-radius: 11px;

            background: var(--yellow);

            box-shadow:
                var(--shadow-small);

            font:
                400 23px
                var(--serif);

            transition:
                .3s var(--ease);
        }

        .brand:hover .brand-mark {
            transform:
                translate(-2px, -2px)
                rotate(-4deg);

            box-shadow:
                6px 6px 0 var(--ink);
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

            border:
                1.5px solid
                transparent;

            border-radius: 999px;

            font-size: 11px;

            font-weight: 700;

            transition:
                .25s ease;
        }

        .nav-link:hover {
            border-color:
                var(--ink);

            background:
                var(--paper);
        }

        .nav-status {
            display: flex;

            align-items: center;

            gap: 8px;

            padding: 9px 13px;

            border:
                2px solid
                var(--ink);

            border-radius: 999px;

            background:
                var(--green);

            font:
                500 9px
                var(--mono);

            box-shadow:
                3px 3px 0
                var(--ink);
        }

        .status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background:
                #28752d;
        }


        /* =====================================================
           BREADCRUMB
        ====================================================== */

        .breadcrumb {
            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 19px;

            color: var(--muted);

            font:
                500 9px
                var(--mono);

            text-transform: uppercase;

            letter-spacing: .08em;

            animation:
                reveal .7s
                .08s
                var(--ease)
                both;
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
            position: relative;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                300px;

            min-height: 310px;

            overflow: hidden;

            border:
                3px solid
                var(--ink);

            border-radius: 27px;

            background:
                var(--paper);

            box-shadow:
                10px 10px 0
                var(--ink);

            animation:
                reveal .8s
                .14s
                var(--ease)
                both;
        }

        .hero-main {
            position: relative;

            display: flex;

            flex-direction: column;

            justify-content: center;

            padding: 43px;
        }

        .hero-main::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            left: -90px;
            bottom: -90px;

            border-radius: 50%;

            background:
                var(--blue);

            border:
                3px solid
                var(--ink);
        }

        .hero-main::after {
            content: "NEW";

            position: absolute;

            right: 37px;
            top: 34px;

            display: grid;

            place-items: center;

            width: 62px;
            height: 62px;

            border:
                2px solid
                var(--ink);

            border-radius: 50%;

            background:
                var(--yellow);

            box-shadow:
                4px 4px 0
                var(--ink);

            font:
                700 9px
                var(--mono);

            transform:
                rotate(9deg);
        }

        .hero-label {
            position: relative;
            z-index: 1;

            width: fit-content;

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 17px;

            padding:
                7px 11px;

            border:
                2px solid
                var(--ink);

            border-radius: 999px;

            background:
                var(--yellow);

            box-shadow:
                3px 3px 0
                var(--ink);

            font:
                500 9px
                var(--mono);

            text-transform: uppercase;

            letter-spacing: .08em;
        }

        .hero-label::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background:
                var(--ink);
        }

        .hero-title {
            position: relative;
            z-index: 1;

            font-size:
                clamp(
                    50px,
                    6vw,
                    75px
                );

            line-height: .88;

            letter-spacing:
                -.065em;

            font-weight: 800;
        }

        .hero-title em {
            font-family:
                var(--serif);

            font-weight: 400;

            font-style: italic;

            color:
                var(--orange);

            letter-spacing:
                -.02em;
        }

        .hero-description {
            position: relative;
            z-index: 1;

            max-width: 560px;

            margin-top: 21px;

            color:
                var(--muted);

            font-size: 12px;

            line-height: 1.7;
        }


        /* =====================================================
           HERO SIDE
        ====================================================== */

        .hero-side {
            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 27px;

            border-left:
                3px solid
                var(--ink);

            background:
                var(--orange);

            overflow: hidden;
        }

        .hero-side::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: -130px;
            top: -130px;

            border-radius: 50%;

            border:
                3px solid
                var(--ink);
        }

        .hero-side::after {
            content: "";

            position: absolute;

            width: 130px;
            height: 130px;

            left: -65px;
            bottom: -65px;

            border-radius: 50%;

            background:
                var(--yellow);

            border:
                3px solid
                var(--ink);
        }

        .preview-card {
            position: relative;
            z-index: 2;

            width: 100%;

            padding: 21px;

            border:
                3px solid
                var(--ink);

            border-radius: 20px;

            background:
                var(--paper);

            box-shadow:
                7px 7px 0
                var(--ink);

            transform:
                rotate(1.5deg);

            transition:
                .35s var(--ease);
        }

        .preview-card:hover {
            transform:
                rotate(0)
                translate(-3px, -3px);

            box-shadow:
                10px 10px 0
                var(--ink);
        }

        .preview-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;
        }

        .preview-label {
            color:
                var(--muted);

            font:
                500 8px
                var(--mono);

            text-transform:
                uppercase;

            letter-spacing:
                .09em;
        }

        .preview-number {
            color:
                rgba(23,23,23,.25);

            font:
                400 39px
                var(--serif);

            line-height: .7;
        }

        .preview-avatar {
            width: 67px;
            height: 67px;

            display: grid;

            place-items: center;

            margin-bottom: 16px;

            border:
                3px solid
                var(--ink);

            border-radius: 16px;

            background:
                var(--yellow);

            box-shadow:
                4px 4px 0
                var(--ink);

            font:
                400 36px
                var(--serif);

            transition:
                .3s ease;
        }

        .preview-name {
            font:
                400 25px
                var(--serif);

            line-height: 1;

            word-break: break-word;
        }

        .preview-nim {
            margin-top: 8px;

            color:
                var(--muted);

            font:
                500 8px
                var(--mono);
        }

        .preview-empty {
            color:
                #aaa49b;

            font-style:
                italic;
        }


        /* =====================================================
           FORM WRAPPER
        ====================================================== */

        .content {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                275px;

            align-items: start;

            gap: 22px;

            margin-top: 30px;
        }


        /* =====================================================
           FORM CARD
        ====================================================== */

        .form-card {
            padding: 31px;

            border:
                3px solid
                var(--ink);

            border-radius: 23px;

            background:
                var(--paper);

            box-shadow:
                8px 8px 0
                var(--ink);

            animation:
                reveal .8s
                .25s
                var(--ease)
                both;
        }

        .form-header {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 25px;

            padding-bottom: 24px;

            margin-bottom: 30px;

            border-bottom:
                2px solid
                var(--ink);
        }

        .form-kicker {
            margin-bottom: 8px;

            color:
                var(--orange);

            font:
                700 9px
                var(--mono);

            text-transform:
                uppercase;

            letter-spacing:
                .13em;
        }

        .form-title {
            font-size: 31px;

            line-height: 1;

            letter-spacing:
                -.05em;

            font-weight:
                800;
        }

        .form-title span {
            font:
                400 34px
                var(--serif);

            color:
                var(--orange);
        }

        .form-description {
            max-width: 250px;

            color:
                var(--muted);

            font-size: 10px;

            line-height: 1.7;

            text-align:
                right;
        }


        /* =====================================================
           ERROR
        ====================================================== */

        .error-box {
            margin-bottom: 28px;

            padding: 15px 17px;

            border:
                2px solid
                var(--ink);

            border-radius: 14px;

            background:
                #ffe0d7;

            box-shadow:
                4px 4px 0
                var(--ink);

            color:
                #713426;

            font-size: 10px;
        }

        .error-box strong {
            display: block;

            margin-bottom: 6px;

            font-size: 11px;
        }

        .error-box ul {
            padding-left: 16px;

            line-height: 1.7;
        }


        /* =====================================================
           FIELDSET
        ====================================================== */

        fieldset {
            border: 0;

            margin: 0 0 37px;
        }

        legend {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 11px;

            padding-bottom: 13px;

            margin-bottom: 24px;

            border-bottom:
                2px solid
                var(--ink);
        }

        legend span {
            width: 32px;
            height: 32px;

            display: grid;

            place-items: center;

            border:
                2px solid
                var(--ink);

            border-radius: 9px;

            background:
                var(--ink);

            color:
                var(--paper);

            font:
                400 14px
                var(--serif);
        }

        legend b {
            font-size: 9px;

            font-weight: 800;

            letter-spacing:
                .12em;

            text-transform:
                uppercase;
        }


        /* =====================================================
           FORM GRID
        ====================================================== */

        .grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 24px 28px;
        }

        .full {
            grid-column:
                1 / -1;
        }


        /* =====================================================
           FIELD
        ====================================================== */

        .field {
            position: relative;

            padding-top: 17px;
        }

        .field::after {
            content: "";
            display: none;  
            position: absolute;

            left: 0;
            right: 0;

            bottom: 23px;

            height: 3px;

            background:
                var(--orange);

            transform:
                scaleX(0);

            transform-origin:
                left;

            transition:
                transform .4s
                var(--ease);
        }

        .field:focus-within::after {
            transform:
                scaleX(1);
            
            display: none
        }

        .field input {
            width: 100%;

            height: 47px;

            padding:
                9px 30px 7px 0;

            border: 0;

            border-bottom:
                2px solid
                #c9c4bb;

            outline: none;

            background:
                transparent;

            color:
                var(--ink);

            font-size: 14px;

            font-weight: 700;

            transition:
                border-color .25s;
        }

        .field input:hover {
            border-bottom-color:
                var(--ink);
        }

        .field input:focus {
            border-bottom-color:
                var(--orange);
        }

        .field input::placeholder {
            color:
                transparent;
        }

        .field input:focus::placeholder {
            color:
                #aaa49b;
        }


        /* =====================================================
           LABEL
        ====================================================== */

        .field label {
            position: absolute;

            left: 0;

            top: 32px;

            pointer-events: none;

            color:
                var(--muted);

            font-size: 13px;

            transition:
                transform .3s
                var(--ease),
                color .25s;
        }

        .field input:focus ~ label,
        .field input:not(:placeholder-shown) ~ label {
            transform:
                translateY(-21px)
                scale(.69);

            transform-origin:
                left top;

            color:
                var(--muted);

            font-weight:
                700;

            letter-spacing:
                .07em;

            text-transform:
                uppercase;
        }

        .field input:focus ~ label {
            color:
                var(--orange);
        }


        /* =====================================================
           CHECK
        ====================================================== */

        .check {
            position: absolute;

            right: 0;

            top: 32px;

            width: 15px;
            height: 15px;

            fill: none;

            stroke:
                var(--orange);

            stroke-width:
                2;

            stroke-linecap:
                round;

            stroke-linejoin:
                round;
        }

        .check path {
            stroke-dasharray:
                20;

            stroke-dashoffset:
                20;

            transition:
                stroke-dashoffset
                .4s
                var(--ease);
        }

        .field.filled .check path {
            stroke-dashoffset:
                0;
        }


        /* =====================================================
           HELPERS
        ====================================================== */

        .helper,
        .counter {
            min-height: 16px;

            margin-top: 6px;

            color:
                var(--muted);

            font-size: 9px;
        }

        .counter {
            text-align:
                right;

            font-family:
                var(--mono);
        }


        /* =====================================================
           NUMBER
        ====================================================== */

        .field input[type="number"] {
            appearance:
                textfield;

            -moz-appearance:
                textfield;
        }

        .field input::-webkit-outer-spin-button,
        .field input::-webkit-inner-spin-button {
            -webkit-appearance:
                none;

            margin: 0;
        }


        /* =====================================================
           SIDE INFO
        ====================================================== */

        .side-column {
            display: flex;

            flex-direction: column;

            gap: 15px;

            animation:
                reveal .8s
                .35s
                var(--ease)
                both;
        }

        .side-card {
            padding: 22px;

            border:
                2px solid
                var(--ink);

            border-radius: 19px;

            background:
                var(--paper);

            box-shadow:
                5px 5px 0
                var(--ink);

            transition:
                .25s ease;
        }

        .side-card:hover {
            transform:
                translate(-3px, -3px);

            box-shadow:
                8px 8px 0
                var(--ink);
        }

        .side-card.yellow {
            background:
                var(--yellow);
        }

        .side-card.blue {
            background:
                var(--blue);
        }

        .side-card.green {
            background:
                var(--green);
        }

        .side-label {
            margin-bottom: 17px;

            font:
                500 8px
                var(--mono);

            text-transform:
                uppercase;

            letter-spacing:
                .09em;
        }

        .side-title {
            font:
                400 28px
                var(--serif);

            line-height:
                1;
        }

        .side-text {
            margin-top: 9px;

            color:
                rgba(23,23,23,.64);

            font-size: 10px;

            line-height: 1.65;
        }


        /* =====================================================
           PROGRESS
        ====================================================== */

        .progress-card {
            padding: 22px;

            border:
                2px solid
                var(--ink);

            border-radius: 19px;

            background:
                var(--ink);

            color:
                var(--paper);

            box-shadow:
                5px 5px 0
                var(--orange);
        }

        .progress-head {
            display: flex;

            align-items: flex-end;

            justify-content:
                space-between;

            margin-bottom:
                16px;
        }

        .progress-label {
            color:
                rgba(255,255,255,.58);

            font:
                500 8px
                var(--mono);

            text-transform:
                uppercase;

            letter-spacing:
                .08em;
        }

        .progress-number {
            font:
                400 37px
                var(--serif);

            line-height:
                .8;
        }

        .progress-bar {
            height: 7px;

            overflow:
                hidden;

            border:
                1px solid
                rgba(255,255,255,.15);

            border-radius:
                999px;

            background:
                rgba(255,255,255,.08);
        }

        .progress-bar i {
            display: block;

            width: 0;

            height: 100%;

            border-radius:
                inherit;

            background:
                var(--orange);

            transition:
                width .45s
                var(--ease);
        }

        .progress-copy {
            margin-top:
                13px;

            color:
                rgba(255,255,255,.46);

            font-size:
                9px;

            line-height:
                1.6;
        }


        /* =====================================================
           FOOTER ACTION
        ====================================================== */

        .form-footer {
            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: 20px;

            padding-top:
                25px;

            border-top:
                2px solid
                var(--ink);
        }

        .footer-note {
            display: flex;

            align-items: center;

            gap: 8px;

            color:
                var(--muted);

            font:
                500 8px
                var(--mono);

            line-height:
                1.5;
        }

        .footer-note::before {
            content:
                "✓";

            width: 20px;
            height: 20px;

            display: grid;

            place-items: center;

            flex-shrink: 0;

            border:
                2px solid
                var(--ink);

            border-radius:
                50%;

            background:
                var(--green);

            color:
                var(--ink);

            font-size:
                9px;

            font-weight:
                800;
        }

        .actions {
            display: flex;

            align-items:
                center;

            gap: 10px;
        }

        .btn {
            min-height:
                45px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap: 8px;

            padding:
                0 17px;

            border:
                2px solid
                var(--ink);

            border-radius:
                999px;

            cursor:
                pointer;

            font-size:
                10px;

            font-weight:
                800;

            transition:
                .25s var(--ease);
        }

        .btn-cancel {
            background:
                var(--paper);
        }

        .btn-cancel:hover {
            background:
                var(--blue);

            transform:
                translateY(-3px);
        }

        .btn-save {
            background:
                var(--ink);

            color:
                white;

            box-shadow:
                4px 4px 0
                var(--orange);
        }

        .btn-save:hover {
            background:
                var(--orange);

            color:
                var(--ink);

            transform:
                translateY(-3px);

            box-shadow:
                5px 5px 0
                var(--ink);
        }

        .btn-save:active {
            transform:
                translateY(0);
        }

        .btn-save.loading {
            pointer-events:
                none;

            background:
                var(--orange);

            color:
                var(--ink);
        }


        /* =====================================================
           TOAST
        ====================================================== */

        .toast {
            position:
                fixed;

            z-index:
                100;

            top:
                18px;

            right:
                18px;

            display:
                flex;

            align-items:
                center;

            gap:
                11px;

            padding:
                14px 17px;

            border:
                2px solid
                var(--ink);

            border-radius:
                15px;

            background:
                var(--paper);

            box-shadow:
                5px 5px 0
                var(--ink);

            animation:
                toastIn .5s
                var(--ease);
        }

        .toast-dot {
            width:
                8px;

            height:
                8px;

            border-radius:
                50%;

            background:
                var(--orange);
        }

        .toast strong {
            display:
                block;

            font-size:
                10px;
        }

        .toast span {
            display:
                block;

            margin-top:
                2px;

            color:
                var(--muted);

            font-size:
                9px;
        }

        @keyframes toastIn {

            from {
                opacity:
                    0;

                transform:
                    translateY(-12px);
            }

            to {
                opacity:
                    1;

                transform:
                    translateY(0);
            }

        }


        /* =====================================================
           ANIMATIONS
        ====================================================== */

        @keyframes fadeDown {

            from {
                opacity: 0;

                transform:
                    translateY(-12px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }

        @keyframes reveal {

            from {
                opacity: 0;

                transform:
                    translateY(18px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }


        /* =====================================================
           FOCUS
        ====================================================== */

        :focus-visible {
            outline:
                2px solid
                var(--orange);

            outline-offset:
                4px;
        }


        /* =====================================================
           RESPONSIVE 1100
        ====================================================== */

        @media (max-width: 1100px) {

            .hero {
                grid-template-columns:
                    minmax(0, 1fr)
                    270px;
            }

            .content {
                grid-template-columns:
                    minmax(0, 1fr);
            }

            .side-column {
                display:
                    grid;

                grid-template-columns:
                    repeat(3, 1fr);
            }

            .progress-card {
                grid-column:
                    1 / -1;
            }

        }


        /* =====================================================
           TABLET
        ====================================================== */

        @media (max-width: 760px) {

            .page {
                width:
                    min(
                        100% - 24px,
                        600px
                    );

                padding-top:
                    12px;
            }

            .navbar {
                margin-bottom:
                    27px;
            }

            .brand-name {
                display:
                    none;
            }

            .nav-link {
                display:
                    none;
            }

            .nav-status {
                display:
                    none;
            }

            .hero {
                grid-template-columns:
                    1fr;

                border-radius:
                    21px;

                box-shadow:
                    7px 7px 0
                    var(--ink);
            }

            .hero-main {
                padding:
                    31px 24px;
            }

            .hero-main::after {
                width:
                    52px;

                height:
                    52px;

                right:
                    22px;

                top:
                    22px;
            }

            .hero-title {
                font-size:
                    52px;
            }

            .hero-side {
                min-height:
                    280px;

                border-left:
                    0;

                border-top:
                    3px solid
                    var(--ink);
            }

            .content {
                margin-top:
                    24px;
            }

            .form-card {
                padding:
                    23px;

                border-radius:
                    20px;
            }

            .form-header {
                display:
                    block;
            }

            .form-description {
                max-width:
                    100%;

                margin-top:
                    11px;

                text-align:
                    left;
            }

            .grid {
                grid-template-columns:
                    1fr;
            }

            .full {
                grid-column:
                    auto;
            }

            .side-column {
                grid-template-columns:
                    1fr;
            }

            .progress-card {
                grid-column:
                    auto;
            }

            .form-footer {
                align-items:
                    stretch;

                flex-direction:
                    column;
            }

            .footer-note {
                justify-content:
                    center;
            }

            .actions {
                width:
                    100%;
            }

            .btn {
                flex:
                    1;
            }

        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 520px) {

            .page {
                width:
                    calc(100% - 18px);

                padding-bottom:
                    50px;
            }

            .hero-title {
                font-size:
                    48px;
            }

            .hero-description {
                font-size:
                    11px;
            }

            .hero-side {
                padding:
                    22px;
            }

            .form-card {
                padding:
                    19px;
            }

            .form-title {
                font-size:
                    27px;
            }

            .form-title span {
                font-size:
                    30px;
            }

            .actions {
                flex-direction:
                    column-reverse;
            }

            .btn {
                width:
                    100%;
            }

            .toast {
                left:
                    9px;

                right:
                    9px;

                top:
                    9px;
            }

        }


        /* =====================================================
           REDUCED MOTION
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation:
                    none !important;

                transition:
                    none !important;
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
            href="<?php echo e(route('mahasiswa.index')); ?>"
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
                href="<?php echo e(route('mahasiswa.index')); ?>"
                class="nav-link"
            >
                ← Kembali
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

        <a href="<?php echo e(route('mahasiswa.index')); ?>">
            Mahasiswa
        </a>

        <span>/</span>

        <strong>
            Tambah data
        </strong>

    </div>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="hero">

        <div class="hero-main">

            <div class="hero-label">
                New student record
            </div>


            <h1 class="hero-title">

                Tambah

                <br>

                <em>mahasiswa.</em>

            </h1>


            <p class="hero-description">

                Buat data mahasiswa baru
                dengan mengisi informasi
                identitas, akademik, dan
                kontak pada form di bawah.

            </p>

        </div>


        <!-- PREVIEW -->

        <div class="hero-side">

            <div class="preview-card">

                <div class="preview-top">

                    <div class="preview-label">
                        Live preview
                    </div>

                    <div class="preview-number">
                        01
                    </div>

                </div>


                <div
                    class="preview-avatar"
                    id="pvAvatar"
                >
                    ·
                </div>


                <div
                    class="preview-name preview-empty"
                    id="pvNama"
                >
                    Nama mahasiswa
                </div>


                <div
                    class="preview-nim preview-empty"
                    id="pvNim"
                >
                    NIM belum diisi
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="content">


        <!-- =================================================
             FORM
        ================================================== -->

        <main class="form-card">


            <!-- HEADER -->

            <div class="form-header">

                <div>

                    <div class="form-kicker">
                        Student record
                    </div>

                    <h2 class="form-title">

                        Informasi

                        <span>
                            mahasiswa
                        </span>

                    </h2>

                </div>


                <p class="form-description">

                    Isi data dengan benar.
                    Progress pengisian akan
                    diperbarui secara otomatis.

                </p>

            </div>


            <!-- ERROR -->

            <?php if($errors->any()): ?>

                <div class="error-box">

                    <strong>
                        Ada data yang perlu diperbaiki
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


            <!-- FORM -->

            <form
                action="<?php echo e(route('mahasiswa.store')); ?>"
                method="POST"
                id="studentForm"
            >

                <?php echo csrf_field(); ?>


                <!-- =========================================
                     IDENTITAS
                ========================================== -->

                <fieldset>

                    <legend>

                        <span>
                            01
                        </span>

                        <b>
                            Identitas
                        </b>

                    </legend>


                    <div class="grid">


                        <!-- NIM -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="text"
                                    id="nim"
                                    name="nim"
                                    value="<?php echo e(old('nim')); ?>"
                                    placeholder=" "
                                    maxlength="20"
                                    autocomplete="off"
                                    required
                                >

                                <label for="nim">
                                    NIM
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Nomor identitas mahasiswa.
                            </div>

                        </div>


                        <!-- NAMA -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="<?php echo e(old('nama')); ?>"
                                    placeholder=" "
                                    maxlength="255"
                                    autocomplete="off"
                                    required
                                >

                                <label for="nama">
                                    Nama lengkap
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="counter">

                                <span id="namaCounter">
                                    0
                                </span>

                                / 255

                            </div>

                        </div>

                    </div>

                </fieldset>


                <!-- =========================================
                     AKADEMIK
                ========================================== -->

                <fieldset>

                    <legend>

                        <span>
                            02
                        </span>

                        <b>
                            Informasi akademik
                        </b>

                    </legend>


                    <div class="grid">


                        <!-- KELAS -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="text"
                                    id="kelas"
                                    name="kelas"
                                    value="<?php echo e(old('kelas')); ?>"
                                    placeholder=" "
                                    maxlength="20"
                                    autocomplete="off"
                                    required
                                >

                                <label for="kelas">
                                    Kelas
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Contoh: TI-06
                            </div>

                        </div>


                        <!-- SEMESTER -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="number"
                                    id="semester"
                                    name="semester"
                                    value="<?php echo e(old('semester')); ?>"
                                    placeholder=" "
                                    min="1"
                                    max="14"
                                    required
                                >

                                <label for="semester">
                                    Semester
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Masukkan semester 1–14.
                            </div>

                        </div>


                        <!-- JURUSAN -->

                        <div class="form-group full">

                            <div class="field">

                                <input
                                    type="text"
                                    id="jurusan"
                                    name="jurusan"
                                    value="<?php echo e(old('jurusan')); ?>"
                                    placeholder=" "
                                    maxlength="255"
                                    autocomplete="off"
                                    required
                                >

                                <label for="jurusan">
                                    Jurusan
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Contoh: Teknik Informatika
                            </div>

                        </div>

                    </div>

                </fieldset>


                <!-- =========================================
                     KONTAK
                ========================================== -->

                <fieldset>

                    <legend>

                        <span>
                            03
                        </span>

                        <b>
                            Informasi kontak
                        </b>

                    </legend>


                    <div class="grid">


                        <!-- EMAIL -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="<?php echo e(old('email')); ?>"
                                    placeholder=" "
                                    maxlength="255"
                                    autocomplete="off"
                                    required
                                >

                                <label for="email">
                                    Email
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Contoh: nama@email.com
                            </div>

                        </div>


                        <!-- HP -->

                        <div class="form-group">

                            <div class="field">

                                <input
                                    type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    value="<?php echo e(old('no_hp')); ?>"
                                    placeholder=" "
                                    maxlength="20"
                                    autocomplete="off"
                                    required
                                >

                                <label for="no_hp">
                                    Nomor HP
                                </label>


                                <svg
                                    class="check"
                                    viewBox="0 0 16 16"
                                >

                                    <path
                                        d="M3 8.5l3.2 3.2L13 5"
                                    />

                                </svg>

                            </div>


                            <div class="helper">
                                Contoh: 081234567890
                            </div>

                        </div>

                    </div>

                </fieldset>


                <!-- =========================================
                     FOOTER
                ========================================== -->

                <div class="form-footer">

                    <div class="footer-note">

                        Data akan divalidasi
                        sebelum disimpan.

                    </div>


                    <div class="actions">

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

                            <span id="buttonText">
                                Simpan mahasiswa
                            </span>

                            <span id="buttonArrow">
                                →
                            </span>

                        </button>

                    </div>

                </div>

            </form>

        </main>


        <!-- =================================================
             SIDE INFORMATION
        ================================================== -->

        <aside class="side-column">


            <!-- PROGRESS -->

            <div class="progress-card">

                <div class="progress-head">

                    <div class="progress-label">
                        Kelengkapan
                    </div>

                    <div class="progress-number">

                        <span id="pgNum">
                            0
                        </span>

                        <small
                            style="
                                font:
                                400 14px var(--sans);
                                opacity:.45;
                            "
                        >
                            / 7
                        </small>

                    </div>

                </div>


                <div class="progress-bar">

                    <i id="pgBar"></i>

                </div>


                <p class="progress-copy">

                    Lengkapi seluruh field agar
                    data mahasiswa siap disimpan.

                </p>

            </div>


            <!-- TIPS -->

            <div class="side-card yellow">

                <div class="side-label">
                    Tip 01
                </div>

                <div class="side-title">
                    Data yang akurat.
                </div>

                <p class="side-text">

                    Pastikan NIM, nama, kelas,
                    dan jurusan sesuai dengan
                    data akademik mahasiswa.

                </p>

            </div>


            <!-- EMAIL -->

            <div class="side-card blue">

                <div class="side-label">
                    Tip 02
                </div>

                <div class="side-title">
                    Kontak aktif.
                </div>

                <p class="side-text">

                    Gunakan email dan nomor
                    HP yang masih aktif agar
                    mudah dihubungi.

                </p>

            </div>


            <!-- SYSTEM -->

            <div class="side-card green">

                <div class="side-label">
                    System
                </div>

                <div class="side-title">
                    Ready.
                </div>

                <p class="side-text">

                    Form siap digunakan.
                    Data akan diproses oleh
                    StudentHub setelah dikirim.

                </p>

            </div>

        </aside>

    </div>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer
        style="
            display:flex;
            justify-content:space-between;
            gap:20px;
            margin-top:55px;
            padding-top:20px;
            border-top:1px solid rgba(23,23,23,.2);
            color:#77736c;
            font:500 8px 'DM Mono',monospace;
            text-transform:uppercase;
            letter-spacing:.08em;
        "
    >

        <span>
            StudentHub / Student Management System
        </span>

        <span>
            New Record
        </span>

    </footer>

</div>


<!-- =====================================================
     ERROR TOAST
====================================================== -->

<?php if($errors->any()): ?>

    <div class="toast">

        <span class="toast-dot"></span>

        <div>

            <strong>
                Data belum lengkap
            </strong>

            <span>
                Periksa kembali form kamu.
            </span>

        </div>

    </div>

<?php endif; ?>


<script>

    /* =====================================================
       FIELD
    ====================================================== */

    const ids = [
        'nim',
        'nama',
        'kelas',
        'semester',
        'jurusan',
        'email',
        'no_hp'
    ];


    /* =====================================================
       PREVIEW CONFIG
    ====================================================== */

    const preview = {

        nama: {
            element: 'pvNama',
            fallback: 'Nama mahasiswa'
        },

        nim: {
            element: 'pvNim',
            fallback: 'NIM belum diisi'
        }

    };


    const pvAvatar =
        document.getElementById('pvAvatar');

    const pvNama =
        document.getElementById('pvNama');

    const pvNim =
        document.getElementById('pvNim');

    const pgNum =
        document.getElementById('pgNum');

    const pgBar =
        document.getElementById('pgBar');


    /* =====================================================
       UPDATE PREVIEW
    ====================================================== */

    function updatePreview() {

        const nama =
            document
                .getElementById('nama')
                .value
                .trim();

        const nim =
            document
                .getElementById('nim')
                .value
                .trim();


        /* NAMA */

        if (nama) {

            pvNama.textContent =
                nama;

            pvNama.classList.remove(
                'preview-empty'
            );

            pvAvatar.textContent =
                nama
                    .charAt(0)
                    .toUpperCase();

        } else {

            pvNama.textContent =
                'Nama mahasiswa';

            pvNama.classList.add(
                'preview-empty'
            );

            pvAvatar.textContent =
                '·';

        }


        /* NIM */

        if (nim) {

            pvNim.textContent =
                'NIM / ' + nim;

            pvNim.classList.remove(
                'preview-empty'
            );

        } else {

            pvNim.textContent =
                'NIM belum diisi';

            pvNim.classList.add(
                'preview-empty'
            );

        }


        /* PROGRESS */

        const count =
            ids.filter(id => {

                const input =
                    document.getElementById(id);

                return (
                    input &&
                    input.value.trim() !== ''
                );

            }).length;


        pgNum.textContent =
            count;

        pgBar.style.width =
            (
                count /
                ids.length *
                100
            ) + '%';

    }


    /* =====================================================
       FIELD STATES
    ====================================================== */

    ids.forEach(id => {

        const input =
            document.getElementById(id);


        if (!input) {
            return;
        }


        function updateField() {

            const field =
                input.closest('.field');


            field.classList.toggle(
                'filled',
                input.value.trim() !== ''
            );


            updatePreview();

        }


        input.addEventListener(
            'input',
            updateField
        );


        input.addEventListener(
            'change',
            updateField
        );


        updateField();

    });


    /* =====================================================
       NAMA COUNTER
    ====================================================== */

    const nama =
        document.getElementById('nama');

    const namaCounter =
        document.getElementById('namaCounter');


    function updateCounter() {

        namaCounter.textContent =
            nama.value.length;

    }


    nama.addEventListener(
        'input',
        updateCounter
    );


    updateCounter();


    /* =====================================================
       SUBMIT
    ====================================================== */

    const form =
        document.getElementById('studentForm');

    const saveButton =
        document.getElementById('saveButton');

    const buttonText =
        document.getElementById('buttonText');

    const buttonArrow =
        document.getElementById('buttonArrow');


    form.addEventListener(
        'submit',
        function(event) {

            if (!form.checkValidity()) {
                return;
            }


            saveButton.classList.add(
                'loading'
            );


            buttonText.textContent =
                'Menyimpan...';


            buttonArrow.style.display =
                'none';

        }
    );


    /* =====================================================
       INITIAL PREVIEW
    ====================================================== */

    updatePreview();

</script>


</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel-3\resources\views/mahasiswa/create.blade.php ENDPATH**/ ?>