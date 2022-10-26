<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Validate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 500px">
        <form action="{{ route('validate.exists') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="title" value="{{ old('title') }}">

                @if($errors->has('title'))
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="d-grid mt-3">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <div class="container mt-5" style="max-width: 500px">
        <div class=" card-body">
            <div class="card-header">Data</div>
            <form action="">
                @csrf
                <div class="form-group">

                </div>
                <div class="d-grid mt-3">
                 <button class="btn btn-primary">Pull</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
<script>
 const arr = [ 1, 2, 3 ];

for (let i = 0; i <= arr.length; i++) {
  console.log(arr[i]);
}
const url = 'http://ussd.test/api/tests'
fetch(url).then((resp) => {
    return resp.json()
})
.then(data => console.log(data))
.catch((error) => {
    console.log(error)
})
</script>
