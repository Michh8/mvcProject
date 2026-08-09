<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Catalogo turistico de El Salvador' }}</title>
    <style>
        :root {
            color-scheme: light;
            --ink: #17211f;
            --muted: #65716e;
            --line: #d8dfdc;
            --paper: #f7faf8;
            --surface: #ffffff;
            --accent: #0d7c66;
            --accent-dark: #075846;
            --coral: #c75f4b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.5;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            width: 100%;
        }

        .topbar {
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, .92);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav {
            align-items: center;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 1120px;
            padding: 14px 20px;
        }

        .brand {
            font-weight: 800;
            letter-spacing: 0;
        }

        .brand span {
            color: var(--accent);
        }

        .container {
            margin: 0 auto;
            max-width: 1120px;
            padding: 36px 20px 52px;
        }

        .hero {
            display: grid;
            gap: 18px;
            padding: 34px 0 28px;
        }

        .hero h1 {
            font-size: clamp(2rem, 5vw, 4.3rem);
            line-height: 1.02;
            margin: 0;
            max-width: 860px;
        }

        .hero p {
            color: var(--muted);
            font-size: 1.1rem;
            margin: 0;
            max-width: 720px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 8px;
        }

        .chip {
            border: 1px solid var(--line);
            border-radius: 999px;
            color: var(--muted);
            font-size: .92rem;
            padding: 8px 12px;
        }

        .grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            overflow: hidden;
        }

        .card img {
            aspect-ratio: 4 / 3;
            object-fit: cover;
        }

        .card-body {
            display: grid;
            gap: 12px;
            padding: 18px;
        }

        .eyebrow {
            color: var(--coral);
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        h1,
        h2,
        h3 {
            line-height: 1.15;
            margin: 0;
        }

        .meta {
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 8px 14px;
            margin: 0;
        }

        .price {
            color: var(--accent-dark);
            font-weight: 800;
        }

        .button {
            align-items: center;
            background: var(--accent);
            border: 0;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            display: inline-flex;
            font-weight: 800;
            gap: 8px;
            justify-content: center;
            min-height: 44px;
            padding: 10px 14px;
        }

        .button:hover {
            background: var(--accent-dark);
        }

        .detail {
            display: grid;
            gap: 28px;
            grid-template-columns: minmax(0, 1.15fr) minmax(280px, .85fr);
        }

        .detail-media {
            border-radius: 8px;
            margin: 18px 0;
            overflow: hidden;
        }

        .detail-media img {
            aspect-ratio: 16 / 10;
            object-fit: cover;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 20px;
        }

        .list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 14px 0 0;
            padding: 0;
        }

        .list li {
            background: #eef6f2;
            border-radius: 999px;
            list-style: none;
            padding: 7px 11px;
        }

        .form {
            display: grid;
            gap: 12px;
            margin-top: 14px;
        }

        label {
            display: grid;
            font-weight: 700;
            gap: 6px;
        }

        input,
        textarea {
            border: 1px solid var(--line);
            border-radius: 8px;
            font: inherit;
            padding: 11px 12px;
            width: 100%;
        }

        textarea {
            min-height: 118px;
            resize: vertical;
        }

        small {
            color: var(--coral);
        }

        .alert {
            border-radius: 8px;
            margin-top: 12px;
            padding: 12px 14px;
        }

        .alert.success {
            background: #e7f7ef;
            color: #145d40;
        }

        .alert.error {
            background: #fff1ed;
            color: #8f2f1d;
        }

        .footer {
            border-top: 1px solid var(--line);
            color: var(--muted);
            padding: 24px 20px;
            text-align: center;
        }

        @media (max-width: 780px) {
            .detail {
                grid-template-columns: 1fr;
            }

            .nav {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <nav class="nav" aria-label="Navegacion principal">
            <a class="brand" href="{{ route('lugares.index') }}">Turismo<span>SV</span></a>
            <a href="{{ route('lugares.index') }}">Catalogo</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        Datos cargados desde JSON mediante el modelo de Laravel.
    </footer>
</body>
</html>
