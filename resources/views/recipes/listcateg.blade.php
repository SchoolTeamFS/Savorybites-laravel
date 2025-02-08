<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($categories as $elt)
    <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $elt->name)]) }}">
        {{ $elt->name }}
    </a>
@endforeach

</body>
</html>