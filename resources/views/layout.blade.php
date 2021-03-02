<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/category">Categories</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/post">Posts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/tag">Tags</a>
    </li>
</ul>
<div class="container">
@yield('content')
</div>





</body>
</html>
