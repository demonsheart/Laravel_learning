<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="POST">
        <p>name: <input type="text" name="name" value=""></p>
        <p>age: <input type="text" name="age" value=""></p>
        <p>email: <input type="email" name="email" value=""></p>
        {{ csrf_field() }}
        <input type="submit" value="submit">
    </form>
</body>
</html>