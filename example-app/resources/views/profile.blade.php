<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="profile">
        <h1>{{ Auth::user()->name }}</h1>
        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
    </div>
</body>
</html>
