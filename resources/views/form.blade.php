<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="Post" action="{{route('forms.store')}}" enctype="multipart/form-data">
@csrf
<div><input type="file" name="image"> </div><br/>
<div><button type="submit">Upload </button></div>

</form>

</body>
</html>
