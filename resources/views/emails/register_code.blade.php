<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    <form method="POST" action="{{route('customers.register.store')}}">
    @csrf
    <label>Code de vérification :</label>
    <input type="text" name="code" required>
    <button type="submit">Valider</button>
</form>
</body>
</html>
