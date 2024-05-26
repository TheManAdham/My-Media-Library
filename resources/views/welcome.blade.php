<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Media Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #293785;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #eab97f;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        svg {
            width: 40px;
            height: 40px;
        }

        .navbar-links {
            margin-right: 20px;
        }

        .navbar a {
            color: #293785;
            text-decoration: none;
            font-weight: bold;
            margin-left: 20px;
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            color: #e59b74;
            margin-bottom: 10px;
            margin-top: 150px;
        }

        .header p {
            color: #ffffff;
            margin-bottom: 20px;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            background-color: #eab97f;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 45%; /* Adjust the width of the cards */
            margin: 20px;
            text-align: center;
            max-width: 600px; /* Set a maximum width for the cards */
        }

        .card h2 {
            color: #293785;
            margin-bottom: 15px;
        }

        .card p {
            color: #666666;
            margin-bottom: 20px;
        }


        @media (max-width: 768px) {
            .card {
                width: calc(50% - 40px);
            }
        }

        @media (max-width: 576px) {
            .card {
                width: calc(100% - 40px);
            }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="navbar">
        <svg id="ART" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48"><defs><linearGradient id="linear-gradient" x1="24" y1="51.75" x2="24" y2="-62.67" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#273a9b"/><stop offset=".56" stop-color="#202f65"/><stop offset="1" stop-color="#021e2f"/></linearGradient><linearGradient id="linear-gradient-2" x1="9" y1="-12.88" x2="9" y2="-27.38" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="16.5" y1="-12.88" x2="16.5" y2="-27.38" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-4" y1="-12.88" x2="24" y2="-27.38" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-5" x1="31.5" y1="-12.88" x2="31.5" y2="-27.38" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-6" x1="39" y1="-12.88" x2="39" y2="-27.38" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-7" x1="9" y1="-12.88" x2="9" y2="-27.38" gradientTransform="translate(15 -15)" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-8" x1="16.5" y1="-12.88" x2="16.5" y2="-27.38" gradientTransform="translate(7.5 -7.5)" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-10" x1="31.5" y1="-12.88" x2="31.5" y2="-27.38" gradientTransform="translate(-7.5 7.5)" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-11" x1="39" y1="-12.88" x2="39" y2="-27.38" gradientTransform="translate(-15 15)" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-12" x1="24" y1="49.62" x2="24" y2=".76" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f3c57a"/><stop offset=".49" stop-color="#f39369"/><stop offset="1" stop-color="#e94867"/></linearGradient><linearGradient id="linear-gradient-13" x1="24" y1="48.6" x2="24" y2="-2.84" xlink:href="#linear-gradient-12"/><linearGradient id="linear-gradient-14" x1="24" y1="35.38" x2="24" y2="49.05" xlink:href="#linear-gradient-12"/><style>.cls-4{fill:url(#linear-gradient-4)}</style></defs><rect x="3" y="3" width="42" height="42" rx="6.27" ry="6.27" style="fill:url(#linear-gradient)"/><path d="M9 45a.75.75 0 0 1-.75-.75V3.75A.75.75 0 0 1 9 3a.75.75 0 0 1 .75.75v40.5A.75.75 0 0 1 9 45z" style="fill:url(#linear-gradient-2)"/><path d="M16.5 45a.75.75 0 0 1-.75-.75V3.75A.75.75 0 0 1 16.5 3a.75.75 0 0 1 .75.75v40.5a.75.75 0 0 1-.75.75z" style="fill:url(#linear-gradient-3)"/><path class="cls-4" d="M24 45a.75.75 0 0 1-.75-.75V3.75A.75.75 0 0 1 24 3a.75.75 0 0 1 .75.75v40.5A.75.75 0 0 1 24 45z"/><path d="M31.5 45a.75.75 0 0 1-.75-.75V3.75A.75.75 0 0 1 31.5 3a.75.75 0 0 1 .75.75v40.5a.75.75 0 0 1-.75.75z" style="fill:url(#linear-gradient-5)"/><path d="M39 45a.75.75 0 0 1-.75-.75V3.75A.75.75 0 0 1 39 3a.75.75 0 0 1 .75.75v40.5A.75.75 0 0 1 39 45z" style="fill:url(#linear-gradient-6)"/><rect x="23.25" y="-12" width="1.5" height="42" rx=".64" ry=".64" transform="rotate(90 24 9)" style="fill:url(#linear-gradient-7)"/><rect x="23.25" y="-4.5" width="1.5" height="42" rx=".64" ry=".64" transform="rotate(90 24 16.5)" style="fill:url(#linear-gradient-8)"/><rect class="cls-4" x="23.25" y="3" width="1.5" height="42" rx=".64" ry=".64" transform="rotate(90 24 24)"/><rect x="23.25" y="10.5" width="1.5" height="42" rx=".64" ry=".64" transform="rotate(90 24 31.5)" style="fill:url(#linear-gradient-10)"/><rect x="23.25" y="18" width="1.5" height="42" rx=".64" ry=".64" transform="rotate(90 24 39)" style="fill:url(#linear-gradient-11)"/><path d="m35.43 21.9-10-10a2.08 2.08 0 0 0-2.94 0l-10 10A2.08 2.08 0 0 0 14 25.45h1.74a.72.72 0 0 1 .72.72V45h15V26.17a.72.72 0 0 1 .72-.72H34a2.08 2.08 0 0 0 1.43-3.55z" style="fill:url(#linear-gradient-12)"/><path d="M32.22 25.45v-.7h3.26a2.11 2.11 0 0 0 .52-1.5h-3.75v-4.54l-3-3h-4.5v-4.24a2.08 2.08 0 0 0-1.5 0v4.28h-4.54l-3 3v4.54H12a2.11 2.11 0 0 0 .52 1.5h3.26v.7a.72.72 0 0 1 .72.72V45a.75.75 0 0 0 .75-.75v-4.5h6v4.5a.75.75 0 0 0 1.5 0v-4.5h6v4.5a.75.75 0 0 0 .75.75V26.17a.72.72 0 0 1 .72-.72zm-9 12.8h-6v-6h6zm0-7.5h-6v-6h6zm0-7.5h-6v-6h6zm7.5 15h-6v-6h6zm0-7.5h-6v-6h6zm0-7.5h-6v-6h6z" style="fill:url(#linear-gradient-13)"/><path style="fill:url(#linear-gradient-14)" d="M16.5 42h15v3h-15z"/></svg>
        <div class="navbar-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    </div>

<div class="header">
    <h1>My Media Library</h1>
    <p>Easily upload and organize your images.</p>
</div>

<div class="content">
    <div class="card">
        <h2>Upload Images</h2>
        <p>Quickly upload your images and store them securely in your personal media library.</p>
    </div>

    <div class="card">
        <h2>View Gallery</h2>
        <p>Organize browse your uploaded images in the gallery.</p>
    </div>
</div>
</body>

</html>
