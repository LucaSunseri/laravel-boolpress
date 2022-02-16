<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>{{ $new_contact->name }} {{ $new_contact->surname }}</h3>
    <p>Mail: {{ $new_contact->email }}</p>
    <p>{{ $new_contact->message }}</p>
    <p>Grazie</p>
</body>

</html>
