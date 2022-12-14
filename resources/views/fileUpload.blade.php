<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 500px">
        <div class="alert alert-primary mb-4 text-center">
           <h2 class="display-6">File Upload</h2>
        </div>
        <form id="fileUploadForm" method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <input name="file" type="file" class="form-control">
            </div>
            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
             <div class="d-grid mt-4">
                <input type="submit" value="Submit" class=" btn btn-success">
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <form action="" enctype="multipart/form-data" method="" action="{{ route('file.upload')}}">
            @csrf
            <div>
           <button class="btn btn-success"><a href="{{('user-pagination')}}"></a> Users</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        console.log('File has uploaded');
                    }
                });
            });
        });

    // const j = [1,2,3,4,4,5,5,6]
    for (let j = 1; ; j += 2) {
  console.log(j);
  if (j > 10) {
    break;
  }
}
const hour  = 14;
if (hour >= 6 && hour <12){
    console.log('good morning');
}
else if (hour >= 12 && hour <18 ){
    console.log('afternoon');

}
else
console.log('good evening');


var array = [0];
for (i =0 ; i<5 ; i++){
    console.log(i);
    array.push(i);
}

    </script>
</body>
</html
