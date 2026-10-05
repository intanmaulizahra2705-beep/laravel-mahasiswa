<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit {{ $mahasiswa->nama }} • StudentHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        /* =========================================================
           STUDENTHUB — EDIT MAHASISWA
           Editorial Neubrutalism
        ========================================================= */

        :root {
            --ink: #171512;
            --ink-2: #24211d;

            --paper: #fffdf8;
            --cream: #f3eee5;
            --cream-2: #ebe5da;

            --clay: #c45b3f;
            --clay-dark: #963c27;
            --clay-soft: #f1d8d0;

            --yellow: #f3d15b;
            --yellow-soft: #fff2bd;

            --mint: #a9ddc3;
            --mint-soft: #e4f6eb;

            --blue-soft: #e3f1f5;

            --red: #dc6257;
            --red-soft: #f8d9d4;

            --muted: #817a70;
            --line: #d9d2c7;

            --shadow-sm: 4px 4px 0 var(--ink);
            --shadow: 7px 7px 0 var(--ink);
            --shadow-lg: 10px 10px 0 var(--ink);

            --radius: 20px;
            --radius-lg: 28px;

            --ease: cubic-bezier(.2,.8,.2,1);
        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 4% 5%,
                    rgba(196,91,63,.08),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 96% 12%,
                    rgba(243,209,91,.13),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 90% 92%,
                    rgba(169,221,195,.12),
                    transparent 24%
                ),
                var(--cream);

            color: var(--ink);

            font-family: "DM Sans", sans-serif;

            overflow-x: hidden;

            -webkit-font-smoothing: antialiased;
        }

        button,
        input,
        select {
            font: inherit;
        }

        button {
            border: 0;
        }


        /* =========================================================
           BACKGROUND
        ========================================================= */

        .background-shapes {
            position: fixed;
            inset: 0;

            overflow: hidden;

            pointer-events: none;

            z-index: -1;
        }

        .shape {
            position: absolute;

            border: 3px solid var(--ink);

            box-shadow: var(--shadow-sm);

            opacity: .75;
        }

        .shape-one {
            width: 85px;
            height: 85px;

            top: 8%;
            left: 2%;

            background: var(--yellow);

            border-radius: 45% 55% 52% 48%;

            transform: rotate(14deg);

            animation: floatOne 7s ease-in-out infinite;
        }

        .shape-two {
            width: 72px;
            height: 72px;

            top: 45%;
            right: 2%;

            background: var(--clay);

            border-radius: 50%;

            animation: floatTwo 8s ease-in-out infinite;
        }

        .shape-three {
            width: 95px;
            height: 58px;

            bottom: 7%;
            left: 5%;

            background: var(--mint);

            border-radius: 50%;

            transform: rotate(-15deg);

            animation: floatOne 8s ease-in-out infinite reverse;
        }

        .spark {
            position: absolute;

            color: var(--clay);

            font-size: 38px;

            font-weight: 900;

            animation: sparkle 5s ease-in-out infinite;
        }

        .spark-one {
            top: 18%;
            right: 8%;
        }

        .spark-two {
            bottom: 16%;
            right: 8%;

            color: var(--yellow);

            animation-delay: -2s;
        }

        @keyframes floatOne {
            0%,100% {
                transform: translateY(0) rotate(14deg);
            }

            50% {
                transform: translateY(-15px) rotate(21deg);
            }
        }

        @keyframes floatTwo {
            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-18px);
            }
        }

        @keyframes sparkle {
            0%,100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-10px) rotate(12deg);
            }
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .page {
            width: min(1450px, calc(100% - 48px));

            margin: auto;

            padding: 30px 0 70px;

            display: grid;

            grid-template-columns:
                390px
                minmax(0, 1fr);

            gap: 34px;

            align-items: start;
        }


        /* =========================================================
           LEFT PANEL
        ========================================================= */

        .profile-panel {
            position: sticky;
            top: 24px;

            min-height: 700px;

            padding: 25px;

            background: var(--ink);

            color: var(--paper);

            border: 3px solid var(--ink);

            border-radius: 30px;

            box-shadow: var(--shadow-lg);

            overflow: hidden;

            animation: panelEnter .7s var(--ease) both;
        }

        @keyframes panelEnter {
            from {
                opacity: 0;
                transform: translateX(-30px) rotate(-1deg);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .profile-panel::before {
            content: "";

            position: absolute;

            width: 190px;
            height: 190px;

            top: -100px;
            right: -90px;

            background: var(--clay);

            border: 3px solid var(--ink);

            border-radius: 50%;
        }

        .profile-panel::after {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            left: -75px;
            bottom: 90px;

            background: var(--yellow);

            border: 3px solid var(--ink);

            border-radius: 40%;

            transform: rotate(20deg);
        }

        .panel-content {
            position: relative;

            z-index: 2;
        }


        /* =========================================================
           BACK
        ========================================================= */

        .back-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 10px 13px;

            background: var(--paper);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 13px;

            box-shadow: var(--shadow-sm);

            text-decoration: none;

            font-size: 11px;

            font-weight: 900;

            transition: .25s var(--ease);
        }

        .back-button:hover {
            background: var(--clay-soft);

            transform: translate(-3px,-3px);

            box-shadow: 7px 7px 0 var(--ink);
        }

        .back-button:active {
            transform: translate(2px,2px);

            box-shadow: 2px 2px 0 var(--ink);
        }


        /* =========================================================
           LABEL
        ========================================================= */

        .mini-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-top: 43px;

            padding: 7px 11px;

            background: var(--yellow);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 999px;

            box-shadow: var(--shadow-sm);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .mini-label::before {
            content: "✦";
        }


        /* =========================================================
           TITLE
        ========================================================= */

        .profile-title {
            margin-top: 22px;

            color: var(--paper);

            font-family: "Space Grotesk", sans-serif;

            font-size: clamp(52px, 5vw, 70px);

            font-weight: 800;

            line-height: .87;

            letter-spacing: -.075em;
        }

        .profile-title span {
            display: block;

            color: var(--clay);

            text-shadow:
                3px 3px 0 var(--paper),
                6px 6px 0 var(--ink);

            transform: rotate(-2deg);

            transform-origin: left;
        }

        .profile-description {
            max-width: 315px;

            margin-top: 23px;

            color: rgba(255,253,248,.63);

            font-size: 12px;

            line-height: 1.75;

            font-weight: 500;
        }


        /* =========================================================
           PREVIEW CARD
        ========================================================= */

        .student-card {
            position: relative;

            margin-top: 30px;

            padding: 19px;

            background: var(--paper);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 22px;

            box-shadow: var(--shadow);

            transition: .3s var(--ease);
        }

        .student-card:hover {
            transform: translate(-3px,-3px);

            box-shadow: 10px 10px 0 var(--clay);
        }


        /* =========================================================
           STUDENT HEADER
        ========================================================= */

        .student-head {
            display: flex;

            align-items: center;

            gap: 14px;

            padding-bottom: 18px;

            border-bottom: 3px dashed var(--ink);
        }

        .avatar {
            width: 68px;
            height: 68px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            background: var(--clay);

            color: var(--paper);

            border: 3px solid var(--ink);

            border-radius: 19px;

            box-shadow: var(--shadow-sm);

            font-family: "Space Grotesk", sans-serif;

            font-size: 29px;

            font-weight: 800;

            overflow: hidden;

            transition: .3s var(--ease);
        }

        .avatar:hover {
            transform: rotate(-6deg) scale(1.05);
        }

        .avatar::after {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    120deg,
                    transparent 20%,
                    rgba(255,255,255,.7),
                    transparent 80%
                );

            transform: translateX(-130%);
        }

        .avatar.flash::after {
            animation: shine .7s ease;
        }

        @keyframes shine {
            to {
                transform: translateX(130%);
            }
        }

        .student-name {
            max-width: 230px;

            color: var(--ink);

            font-family: "Space Grotesk", sans-serif;

            font-size: 20px;

            font-weight: 800;

            line-height: 1.05;

            word-break: break-word;
        }

        .student-nim {
            margin-top: 6px;

            color: var(--muted);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .12em;
        }


        /* =========================================================
           INFO
        ========================================================= */

        .student-info {
            display: grid;

            gap: 8px;

            margin-top: 15px;
        }

        .info-item {
            display: grid;

            grid-template-columns: 78px minmax(0,1fr);

            gap: 10px;

            align-items: center;

            min-width: 0;

            padding: 9px 11px;

            border: 2px solid var(--ink);

            border-radius: 12px;

            transition: .2s var(--ease);
        }

        .info-item:nth-child(1) {
            background: var(--yellow-soft);
        }

        .info-item:nth-child(2) {
            background: var(--blue-soft);
        }

        .info-item:nth-child(3) {
            background: var(--mint-soft);
        }

        .info-item:nth-child(4) {
            background: var(--clay-soft);
        }

        .info-item:nth-child(5) {
            background: #f5e5d2;
        }

        .info-item:hover {
            transform: translateX(4px);

            box-shadow: 3px 3px 0 var(--ink);
        }

        .info-label {
            font-size: 8px;

            font-weight: 900;

            letter-spacing: .1em;

            text-transform: uppercase;
        }

        .info-value {
            min-width: 0;

            overflow: hidden;

            text-align: right;

            white-space: nowrap;

            text-overflow: ellipsis;

            font-size: 10px;

            font-weight: 800;
        }

        .info-value.changed {
            color: var(--clay-dark);
        }


        /* =========================================================
           PROGRESS
        ========================================================= */

        .progress-box {
            margin-top: 18px;

            padding: 15px;

            background: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 17px;

            box-shadow: 5px 5px 0 var(--clay);

            color: white;
        }

        .progress-head {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 11px;
        }

        .progress-title {
            font-size: 9px;

            font-weight: 900;

            letter-spacing: .1em;

            text-transform: uppercase;
        }

        .progress-number {
            display: flex;

            align-items: baseline;

            gap: 3px;
        }

        .progress-number strong {
            font-family: "Space Grotesk";

            font-size: 23px;
        }

        .progress-number span {
            opacity: .5;

            font-size: 9px;
        }

        .progress-track {
            display: grid;

            grid-template-columns: repeat(7,1fr);

            gap: 4px;
        }

        .progress-dot {
            height: 7px;

            background: rgba(255,255,255,.12);

            border: 1px solid rgba(255,255,255,.16);

            border-radius: 999px;

            transition: .35s var(--ease);
        }

        .progress-dot.active {
            background: var(--clay);

            border-color: var(--clay);
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            min-width: 0;

            animation: contentEnter .7s var(--ease) .08s both;
        }

        @keyframes contentEnter {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .content-top {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 27px;
        }

        .eyebrow {
            display: flex;

            align-items: center;

            gap: 8px;

            color: var(--clay-dark);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .14em;

            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";

            width: 25px;
            height: 5px;

            background: var(--clay);

            border: 2px solid var(--ink);

            border-radius: 99px;
        }

        .main-title {
            margin-top: 9px;

            font-family: "Space Grotesk", sans-serif;

            font-size: clamp(37px, 4vw, 57px);

            font-weight: 800;

            line-height: .95;

            letter-spacing: -.065em;
        }

        .highlight {
            position: relative;

            display: inline-block;

            z-index: 1;
        }

        .highlight::after {
            content: "";

            position: absolute;

            left: -4px;
            right: -4px;

            bottom: 0;

            height: 12px;

            background: var(--yellow);

            border: 2px solid var(--ink);

            z-index: -1;

            transform: rotate(-1deg);
        }

        .subtitle {
            max-width: 650px;

            margin-top: 12px;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.7;
        }


        /* =========================================================
           RESET
        ========================================================= */

        .reset-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 10px 14px;

            background: var(--paper);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 13px;

            box-shadow: var(--shadow-sm);

            cursor: pointer;

            font-size: 10px;

            font-weight: 900;

            opacity: 0;

            pointer-events: none;

            transform: translateY(7px);

            transition: .3s var(--ease);
        }

        .reset-button.active {
            opacity: 1;

            pointer-events: auto;

            transform: none;
        }

        .reset-button:hover {
            background: var(--clay-soft);

            transform: translate(-3px,-3px);

            box-shadow: 7px 7px 0 var(--ink);
        }

        .reset-icon {
            font-size: 16px;

            transition: .45s var(--ease);
        }

        .reset-button:hover .reset-icon {
            transform: rotate(-180deg);
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error-box {
            display: flex;

            gap: 13px;

            margin-bottom: 25px;

            padding: 16px;

            background: var(--red-soft);

            border: 3px solid var(--ink);

            border-radius: 18px;

            box-shadow: var(--shadow);

            animation: errorIn .5s var(--ease) both;
        }

        @keyframes errorIn {
            from {
                opacity: 0;
                transform: translateX(-15px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .error-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            background: var(--red);

            color: white;

            border: 3px solid var(--ink);

            border-radius: 12px;

            box-shadow: var(--shadow-sm);

            font-weight: 900;
        }

        .error-content strong {
            display: block;

            margin-bottom: 4px;

            font-size: 12px;

            font-weight: 900;
        }

        .error-content ul {
            padding-left: 16px;

            font-size: 11px;

            line-height: 1.7;
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            position: relative;

            padding: 31px;

            background: rgba(255,253,248,.94);

            border: 3px solid var(--ink);

            border-radius: var(--radius-lg);

            box-shadow: var(--shadow-lg);

            backdrop-filter: blur(8px);
        }


        /* =========================================================
           FIELDSET
        ========================================================= */

        fieldset {
            border: 0;

            margin: 0 0 37px;
        }

        fieldset:last-of-type {
            margin-bottom: 20px;
        }

        legend {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            padding-bottom: 14px;

            margin-bottom: 23px;

            border-bottom: 3px dashed rgba(23,21,18,.18);
        }

        .section-number {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            background: var(--clay);

            color: white;

            border: 3px solid var(--ink);

            border-radius: 12px;

            box-shadow: var(--shadow-sm);

            font-size: 10px;

            font-weight: 900;
        }

        fieldset:nth-of-type(2) .section-number {
            background: var(--yellow);

            color: var(--ink);
        }

        fieldset:nth-of-type(3) .section-number {
            background: var(--mint);

            color: var(--ink);
        }

        .section-title {
            font-size: 12px;

            font-weight: 900;

            letter-spacing: .1em;

            text-transform: uppercase;
        }

        .section-description {
            margin-left: auto;

            color: var(--muted);

            font-size: 9px;

            font-weight: 600;
        }

        .fields {
            display: grid;

            grid-template-columns:
                repeat(2,minmax(0,1fr));

            gap: 22px;
        }

        .field-group.full {
            grid-column: 1 / -1;
        }


        /* =========================================================
           INPUT
        ========================================================= */

        .field-label {
            display: flex;

            align-items: center;

            gap: 6px;

            margin-bottom: 8px;

            color: var(--ink);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .11em;

            text-transform: uppercase;
        }

        .field-label::before {
            content: "✦";

            color: var(--clay);

            font-size: 7px;
        }

        .field-wrapper {
            position: relative;
        }

        .field input,
        .field select {
            width: 100%;

            height: 57px;

            padding: 0 17px;

            background: var(--paper);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 15px;

            outline: none;

            font-size: 13px;

            font-weight: 700;

            box-shadow: 5px 5px 0 rgba(23,21,18,.12);

            transition:
                transform .22s var(--ease),
                box-shadow .22s var(--ease),
                background .22s var(--ease);
        }

        .field input:hover,
        .field select:hover {
            transform: translate(-2px,-2px);

            box-shadow: 7px 7px 0 rgba(23,21,18,.17);
        }

        .field input:focus,
        .field select:focus {
            transform: translate(-2px,-2px);

            background: #fffef9;

            border-color: var(--ink);

            box-shadow: 7px 7px 0 var(--ink);

            outline: none;
        }

        /* NO ORANGE FOCUS LINE */

        .field::after,
        .field:focus-within::after {
            display: none !important;

            content: none !important;
        }

        /* NO COLORED FOCUS BORDER */

        .field-group:nth-child(4n+1) input:focus,
        .field-group:nth-child(4n+2) input:focus {
            border-color: var(--ink);
        }


        /* =========================================================
           SELECT
        ========================================================= */

        .field select {
            appearance: none;

            cursor: pointer;

            padding-right: 45px;

            background-image:
                linear-gradient(
                    45deg,
                    transparent 50%,
                    var(--ink) 50%
                ),
                linear-gradient(
                    135deg,
                    var(--ink) 50%,
                    transparent 50%
                );

            background-position:
                calc(100% - 20px) 24px,
                calc(100% - 14px) 24px;

            background-size:
                6px 6px,
                6px 6px;

            background-repeat: no-repeat;
        }


        /* =========================================================
           CHANGED FIELD
        ========================================================= */

        .field-group.changed input,
        .field-group.changed select {
            background: var(--mint-soft);

            border-color: var(--ink);

            box-shadow: 6px 6px 0 var(--ink);
        }

        .field-status {
            position: absolute;

            top: 50%;
            right: 13px;

            width: 26px;
            height: 26px;

            display: grid;

            place-items: center;

            background: var(--mint);

            color: var(--ink);

            border: 3px solid var(--ink);

            border-radius: 50%;

            box-shadow: 2px 2px 0 var(--ink);

            font-size: 11px;

            font-weight: 900;

            opacity: 0;

            transform:
                translateY(-50%)
                scale(.5)
                rotate(-25deg);

            pointer-events: none;

            transition: .3s var(--ease);
        }

        .field-group.changed .field-status {
            opacity: 1;

            transform:
                translateY(-50%)
                scale(1)
                rotate(0);
        }

        .field-help {
            margin-top: 7px;

            color: var(--muted);

            font-size: 9px;

            line-height: 1.5;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .form-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding-top: 25px;

            border-top: 3px dashed rgba(23,21,18,.18);
        }

        .cancel {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 11px 13px;

            color: var(--ink);

            text-decoration: none;

            border: 2px solid transparent;

            border-radius: 12px;

            font-size: 11px;

            font-weight: 900;

            transition: .25s var(--ease);
        }

        .cancel:hover {
            background: var(--clay-soft);

            border-color: var(--ink);

            transform: translateX(-3px);
        }


        /* =========================================================
           SAVE BUTTON
        ========================================================= */

        .save-button {
            position: relative;

            min-width: 235px;

            height: 59px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            padding: 0 22px;

            overflow: hidden;

            background: var(--ink);

            color: white;

            border: 3px solid var(--ink);

            border-radius: 15px;

            box-shadow: 7px 7px 0 var(--clay);

            cursor: pointer;

            font-size: 11px;

            font-weight: 900;

            transition: .3s var(--ease);
        }

        .save-button::before {
            content: "";

            position: absolute;

            width: 35px;
            height: 140px;

            left: -70px;
            top: -40px;

            background: rgba(255,255,255,.2);

            transform: rotate(25deg);

            transition: .7s ease;
        }

        .save-button:hover {
            background: var(--clay);

            color: white;

            transform: translate(-3px,-3px);

            box-shadow: 10px 10px 0 var(--ink);
        }

        .save-button:hover::before {
            left: 110%;
        }

        .save-button:active {
            transform: translate(3px,3px);

            box-shadow: 3px 3px 0 var(--ink);
        }

        .save-button span {
            position: relative;

            z-index: 2;
        }

        .save-arrow {
            font-size: 20px;

            transition: .3s var(--ease);
        }

        .save-button:hover .save-arrow {
            transform: translateX(5px);
        }

        .spinner {
            width: 17px;
            height: 17px;

            display: none;

            border: 3px solid rgba(255,255,255,.3);

            border-top-color: white;

            border-radius: 50%;

            animation: spin .7s linear infinite;
        }

        .save-button.loading {
            pointer-events: none;

            background: var(--ink);
        }

        .save-button.loading .spinner {
            display: block;
        }

        .save-button.loading .save-arrow {
            display: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }


        /* =========================================================
           TOAST
        ========================================================= */

        .toast {
            position: fixed;

            right: 24px;
            top: 24px;

            z-index: 1000;

            width: min(390px,calc(100vw - 30px));

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 14px;

            background: var(--mint);

            border: 3px solid var(--ink);

            border-radius: 17px;

            box-shadow: 8px 8px 0 var(--ink);

            animation: toastIn .55s var(--ease) both;
        }

        @keyframes toastIn {
            from {
                opacity: 0;

                transform:
                    translateX(30px)
                    rotate(2deg);
            }

            to {
                opacity: 1;

                transform: none;
            }
        }

        .toast.hide {
            animation: toastOut .4s var(--ease) forwards;
        }

        @keyframes toastOut {
            to {
                opacity: 0;

                transform:
                    translateX(30px)
                    rotate(2deg);
            }
        }

        .toast-icon {
            width: 39px;
            height: 39px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            background: white;

            border: 3px solid var(--ink);

            border-radius: 11px;

            box-shadow: var(--shadow-sm);

            font-weight: 900;
        }

        .toast-text {
            flex: 1;
        }

        .toast-title {
            font-size: 12px;

            font-weight: 900;
        }

        .toast-message {
            margin-top: 3px;

            font-size: 9px;

            font-weight: 600;

            opacity: .65;
        }

        .toast-close {
            width: 28px;
            height: 28px;

            display: grid;

            place-items: center;

            background: white;

            color: var(--ink);

            border: 2px solid var(--ink);

            border-radius: 8px;

            cursor: pointer;

            font-size: 15px;

            font-weight: 900;

            transition: .2s ease;
        }

        .toast-close:hover {
            background: var(--clay);

            color: white;

            transform: rotate(8deg);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .page {
                grid-template-columns:
                    340px
                    minmax(0,1fr);

                gap: 27px;
            }

            .form-card {
                padding: 25px;
            }

        }


        @media (max-width: 900px) {

            .page {
                width: min(720px,calc(100% - 30px));

                grid-template-columns: 1fr;

                gap: 28px;
            }

            .profile-panel {
                position: relative;

                top: auto;

                min-height: auto;
            }

            .profile-title {
                font-size: clamp(55px,12vw,75px);
            }

        }


        @media (max-width: 650px) {

            .page {
                width: calc(100% - 18px);

                padding-top: 10px;

                padding-bottom: 40px;
            }

            .profile-panel {
                padding: 19px;

                border-radius: 23px;

                box-shadow: 7px 7px 0 var(--ink);
            }

            .profile-title {
                font-size: 51px;
            }

            .student-card {
                padding: 16px;
            }

            .avatar {
                width: 59px;
                height: 59px;

                font-size: 25px;
            }

            .student-name {
                font-size: 18px;
            }

            .content-top {
                flex-direction: column;

                align-items: flex-start;
            }

            .form-card {
                padding: 18px;

                border-radius: 22px;

                box-shadow: 6px 6px 0 var(--ink);
            }

            .fields {
                grid-template-columns: 1fr;

                gap: 18px;
            }

            .field-group.full {
                grid-column: auto;
            }

            .section-description {
                display: none;
            }

            .form-footer {
                flex-direction: column;

                align-items: stretch;
            }

            .save-button {
                width: 100%;

                min-width: 0;
            }

            .cancel {
                justify-content: center;
            }

            .shape-one {
                left: -35px;
            }

            .shape-two {
                right: -35px;
            }

            .spark {
                display: none;
            }

        }


        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;

                animation-iteration-count: 1 !important;

                transition-duration: .01ms !important;

                scroll-behavior: auto !important;
            }

        }

    </style>
</head>

<body>


<!-- =========================================================
     BACKGROUND
========================================================= -->

<div class="background-shapes" aria-hidden="true">

    <div class="shape shape-one"></div>
    <div class="shape shape-two"></div>
    <div class="shape shape-three"></div>

    <div class="spark spark-one">✦</div>
    <div class="spark spark-two">✦</div>

</div>


<!-- =========================================================
     PAGE
========================================================= -->

<div class="page">


    <!-- =====================================================
         PROFILE / PREVIEW
    ====================================================== -->

    <aside class="profile-panel">

        <div class="panel-content">


            <a
                href="{{ route('mahasiswa.index') }}"
                class="back-button"
            >
                ← Kembali ke mahasiswa
            </a>


            <div class="mini-label">
                Student editor
            </div>


            <h1 class="profile-title">
                Edit
                <span>mahasiswa.</span>
            </h1>


            <p class="profile-description">
                Perbarui informasi mahasiswa dengan mudah.
                Setiap perubahan akan langsung terlihat
                pada preview di bawah.
            </p>


            <!-- PREVIEW -->

            <div class="student-card">


                <div class="student-head">


                    <div
                        class="avatar"
                        id="pvAvatar"
                    >
                        {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                    </div>


                    <div>

                        <div
                            class="student-name"
                            id="pvNama"
                        >
                            {{ $mahasiswa->nama }}
                        </div>


                        <div
                            class="student-nim"
                            id="pvNim"
                        >
                            {{ $mahasiswa->nim }}
                        </div>

                    </div>


                </div>


                <div class="student-info">


                    <div class="info-item">

                        <span class="info-label">
                            Kelas
                        </span>

                        <span
                            class="info-value"
                            id="pvKelas"
                        >
                            {{ $mahasiswa->kelas }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Semester
                        </span>

                        <span
                            class="info-value"
                            id="pvSemester"
                        >
                            Semester {{ $mahasiswa->semester }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Jurusan
                        </span>

                        <span
                            class="info-value"
                            id="pvJurusan"
                        >
                            {{ $mahasiswa->jurusan }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Email
                        </span>

                        <span
                            class="info-value"
                            id="pvEmail"
                        >
                            {{ $mahasiswa->email ?: '-' }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            No. HP
                        </span>

                        <span
                            class="info-value"
                            id="pvHp"
                        >
                            {{ $mahasiswa->no_hp ?: '-' }}
                        </span>

                    </div>


                </div>


                <!-- PROGRESS -->

                <div class="progress-box">


                    <div class="progress-head">

                        <span class="progress-title">
                            Perubahan data
                        </span>


                        <div class="progress-number">

                            <strong id="pgNum">
                                0
                            </strong>

                            <span>
                                / 7
                            </span>

                        </div>

                    </div>


                    <div class="progress-track">

                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>
                        <span class="progress-dot"></span>

                    </div>


                </div>


            </div>


        </div>

    </aside>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="content">


        <div class="content-top">


            <div>

                <div class="eyebrow">
                    Student Management
                </div>


                <h2 class="main-title">
                    Edit data
                    <span class="highlight">
                        mahasiswa
                    </span>
                </h2>


                <p class="subtitle">
                    Periksa kembali informasi mahasiswa,
                    lakukan perubahan yang diperlukan,
                    lalu simpan untuk memperbarui data.
                </p>

            </div>


            <button
                type="button"
                class="reset-button"
                id="resetBtn"
            >

                <span class="reset-icon">
                    ↺
                </span>

                Kembalikan

            </button>


        </div>


        <!-- =================================================
             ERROR
        ================================================== -->

        @if ($errors->any())

            <div class="error-box">

                <div class="error-icon">
                    !
                </div>


                <div class="error-content">

                    <strong>
                        Ada data yang perlu diperbaiki
                    </strong>


                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        <!-- =================================================
             FORM
        ================================================== -->

        <div class="form-card">


            <form
                action="{{ route('mahasiswa.update', $mahasiswa) }}"
                method="POST"
                id="editForm"
            >

                @csrf

                @method('PUT')


                <!-- =========================================
                     IDENTITAS
                ========================================== -->

                <fieldset>

                    <legend>

                        <span class="section-number">
                            01
                        </span>

                        <span class="section-title">
                            Identitas
                        </span>

                        <span class="section-description">
                            Data dasar mahasiswa
                        </span>

                    </legend>


                    <div class="fields">


                        <!-- NIM -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="nim"
                                >
                                    NIM
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="text"
                                        id="nim"
                                        name="nim"
                                        value="{{ old('nim', $mahasiswa->nim) }}"
                                        data-original="{{ $mahasiswa->nim }}"
                                        maxlength="20"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Nomor induk mahasiswa.
                            </div>

                        </div>


                        <!-- NAMA -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="nama"
                                >
                                    Nama lengkap
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        value="{{ old('nama', $mahasiswa->nama) }}"
                                        data-original="{{ $mahasiswa->nama }}"
                                        maxlength="255"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Gunakan nama lengkap mahasiswa.
                            </div>

                        </div>


                    </div>

                </fieldset>


                <!-- =========================================
                     AKADEMIK
                ========================================== -->

                <fieldset>

                    <legend>

                        <span class="section-number">
                            02
                        </span>

                        <span class="section-title">
                            Akademik
                        </span>

                        <span class="section-description">
                            Data perkuliahan
                        </span>

                    </legend>


                    <div class="fields">


                        <!-- KELAS -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="kelas"
                                >
                                    Kelas
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="text"
                                        id="kelas"
                                        name="kelas"
                                        value="{{ old('kelas', $mahasiswa->kelas) }}"
                                        data-original="{{ $mahasiswa->kelas }}"
                                        maxlength="20"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Contoh: TI-06.
                            </div>

                        </div>


                        <!-- SEMESTER -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="semester"
                                >
                                    Semester
                                </label>


                                <div class="field-wrapper">

                                    <select
                                        id="semester"
                                        name="semester"
                                        data-original="{{ $mahasiswa->semester }}"
                                        required
                                    >

                                        @for ($i = 1; $i <= 14; $i++)

                                            <option
                                                value="{{ $i }}"
                                                {{ old('semester', $mahasiswa->semester) == $i ? 'selected' : '' }}
                                            >
                                                Semester {{ $i }}
                                            </option>

                                        @endfor

                                    </select>


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Semester aktif mahasiswa.
                            </div>

                        </div>


                        <!-- JURUSAN -->

                        <div class="field-group full">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="jurusan"
                                >
                                    Jurusan
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="text"
                                        id="jurusan"
                                        name="jurusan"
                                        value="{{ old('jurusan', $mahasiswa->jurusan) }}"
                                        data-original="{{ $mahasiswa->jurusan }}"
                                        maxlength="255"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Program studi atau jurusan mahasiswa.
                            </div>

                        </div>


                    </div>

                </fieldset>


                <!-- =========================================
                     KONTAK
                ========================================== -->

                <fieldset>

                    <legend>

                        <span class="section-number">
                            03
                        </span>

                        <span class="section-title">
                            Kontak
                        </span>

                        <span class="section-description">
                            Informasi komunikasi
                        </span>

                    </legend>


                    <div class="fields">


                        <!-- EMAIL -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="email"
                                >
                                    Email
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $mahasiswa->email) }}"
                                        data-original="{{ $mahasiswa->email }}"
                                        maxlength="255"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Gunakan email yang masih aktif.
                            </div>

                        </div>


                        <!-- NO HP -->

                        <div class="field-group">

                            <div class="field">

                                <label
                                    class="field-label"
                                    for="no_hp"
                                >
                                    Nomor HP
                                </label>


                                <div class="field-wrapper">

                                    <input
                                        type="text"
                                        id="no_hp"
                                        name="no_hp"
                                        value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                                        data-original="{{ $mahasiswa->no_hp }}"
                                        maxlength="20"
                                        required
                                    >


                                    <span class="field-status">
                                        ✓
                                    </span>

                                </div>

                            </div>


                            <div class="field-help">
                                Nomor yang dapat dihubungi.
                            </div>

                        </div>


                    </div>

                </fieldset>


                <!-- =========================================
                     FOOTER
                ========================================== -->

                <div class="form-footer">


                    <a
                        href="{{ route('mahasiswa.show', $mahasiswa) }}"
                        class="cancel"
                    >
                        ← Batal
                    </a>


                    <button
                        type="submit"
                        class="save-button"
                        id="saveBtn"
                    >

                        <span
                            class="spinner"
                            id="spinner"
                        ></span>


                        <span id="buttonText">
                            Simpan perubahan
                        </span>


                        <span
                            class="save-arrow"
                            id="buttonArrow"
                        >
                            →
                        </span>

                    </button>


                </div>


            </form>


        </div>


    </main>

</div>


<!-- =========================================================
     SUCCESS TOAST
========================================================= -->

@if (session('success'))

    <div
        class="toast"
        id="toast"
    >

        <div class="toast-icon">
            ✓
        </div>


        <div class="toast-text">

            <div class="toast-title">
                Yeay! Perubahan berhasil
            </div>

            <div class="toast-message">
                Data mahasiswa berhasil diperbarui.
            </div>

        </div>


        <button
            type="button"
            class="toast-close"
            onclick="closeToast()"
        >
            ×
        </button>

    </div>

@endif


<script>

    /* =========================================================
       FIELD CONFIG
    ========================================================= */

    const ids = [
        'nim',
        'nama',
        'kelas',
        'semester',
        'jurusan',
        'email',
        'no_hp'
    ];


    const previewMap = {

        nim: {
            element: 'pvNim'
        },

        nama: {
            element: 'pvNama'
        },

        kelas: {
            element: 'pvKelas'
        },

        semester: {
            element: 'pvSemester',

            format: value => {
                return value
                    ? 'Semester ' + value
                    : '-';
            }
        },

        jurusan: {
            element: 'pvJurusan'
        },

        email: {
            element: 'pvEmail'
        },

        no_hp: {
            element: 'pvHp'
        }

    };


    const avatar =
        document.getElementById('pvAvatar');

    const progressNumber =
        document.getElementById('pgNum');

    const resetButton =
        document.getElementById('resetBtn');

    const progressDots =
        document.querySelectorAll('.progress-dot');


    let previousAvatar =
        avatar
            ? avatar.textContent.trim()
            : '';

    let previousCount = -1;


    /* =========================================================
       TEXT ANIMATION
    ========================================================= */

    function animateText(element, value) {

        if (!element) {
            return;
        }

        if (
            element.textContent.trim() ===
            value
        ) {
            return;
        }

        element.style.opacity = '0';

        element.style.transform =
            'translateY(5px)';

        element.style.filter =
            'blur(4px)';


        setTimeout(() => {

            element.textContent =
                value || '-';

            element.style.opacity =
                '1';

            element.style.transform =
                'translateY(0)';

            element.style.filter =
                'blur(0)';

        }, 80);

    }


    /* =========================================================
       REFRESH FIELD
    ========================================================= */

    function refreshField(id) {

        const input =
            document.getElementById(id);

        const config =
            previewMap[id];


        if (!input || !config) {
            return;
        }


        const value =
            input.value.trim();

        const original =
            input.dataset.original ?? '';


        const changed =
            input.value !== original;


        const formatted =
            config.format
                ? config.format(value)
                : value;


        const preview =
            document.getElementById(
                config.element
            );


        animateText(
            preview,
            formatted
        );


        if (preview) {

            preview.classList.toggle(
                'changed',
                changed
            );

        }


        const group =
            input.closest('.field-group');


        if (group) {

            group.classList.toggle(
                'changed',
                changed
            );

        }


        /* AVATAR */

        if (id === 'nama' && avatar) {

            const initial =
                value
                    ? value.charAt(0).toUpperCase()
                    : '?';


            if (
                initial !==
                previousAvatar
            ) {

                avatar.textContent =
                    initial;


                avatar.classList.remove(
                    'flash'
                );


                void avatar.offsetWidth;


                avatar.classList.add(
                    'flash'
                );


                previousAvatar =
                    initial;

            }

        }


        updateProgress();

    }


    /* =========================================================
       PROGRESS
    ========================================================= */

    function updateProgress() {

        let changed = 0;


        ids.forEach(id => {

            const input =
                document.getElementById(id);


            if (!input) {
                return;
            }


            if (
                input.value !==
                input.dataset.original
            ) {

                changed++;

            }

        });


        if (
            changed ===
            previousCount
        ) {
            return;
        }


        previousCount =
            changed;


        if (progressNumber) {

            progressNumber.textContent =
                changed;

        }


        progressDots.forEach(
            (dot, index) => {

                dot.classList.toggle(
                    'active',
                    index < changed
                );

            }
        );


        if (resetButton) {

            resetButton.classList.toggle(
                'active',
                changed > 0
            );

        }

    }


    /* =========================================================
       INITIALIZE
    ========================================================= */

    ids.forEach(id => {

        const input =
            document.getElementById(id);


        if (!input) {
            return;
        }


        input.addEventListener(
            'input',
            () => refreshField(id)
        );


        input.addEventListener(
            'change',
            () => refreshField(id)
        );


        refreshField(id);

    });


    /* =========================================================
       RESET
    ========================================================= */

    if (resetButton) {

        resetButton.addEventListener(
            'click',
            function () {

                ids.forEach(id => {

                    const input =
                        document.getElementById(id);


                    if (!input) {
                        return;
                    }


                    input.value =
                        input.dataset.original;


                    refreshField(id);

                });

            }
        );

    }


    /* =========================================================
       SUBMIT
    ========================================================= */

    const form =
        document.getElementById('editForm');

    const saveButton =
        document.getElementById('saveBtn');

    const buttonText =
        document.getElementById('buttonText');

    const buttonArrow =
        document.getElementById('buttonArrow');


    if (form) {

        form.addEventListener(
            'submit',
            function () {

                if (
                    !form.checkValidity()
                ) {
                    return;
                }


                if (saveButton) {

                    saveButton.classList.add(
                        'loading'
                    );

                }


                if (buttonText) {

                    buttonText.textContent =
                        'Menyimpan...';

                }


                if (buttonArrow) {

                    buttonArrow.style.display =
                        'none';

                }

            }
        );

    }


    /* =========================================================
       TOAST
    ========================================================= */

    function closeToast() {

        const toast =
            document.getElementById('toast');


        if (!toast) {
            return;
        }


        toast.classList.add('hide');


        setTimeout(() => {

            toast.remove();

        }, 450);

    }


    const toast =
        document.getElementById('toast');


    if (toast) {

        setTimeout(() => {

            closeToast();

        }, 4500);

    }

</script>

</body>
</html>