<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">


<div class='notifications top-right'></div>
<script>


  @if(Session::has('success'))
     $('.top-right').notify({
        message: { text: "{{ Session::get('success') }}" }
      }).show();
     @php
       Session::forget('success');
     @endphp
  @endif
  @if(Session::has('info'))
      $('.top-right').notify({
        message: { text: "{{ Session::get('info') }}" },
        type:'info'
      }).show();
      @php
        Session::forget('info');
      @endphp
  @endif
  @if(Session::has('warning'))
  		$('.top-right').notify({
        message: { text: "{{ Session::get('warning') }}" },
        type:'warning'
      }).show();
      @php
        Session::forget('warning');
      @endphp
  @endif


  @if(Session::has('error'))
  		$('.top-right').notify({
        message: { text: "{{ Session::get('error') }}" },
        type:'danger'
      }).show();
      @php
        Session::forget('error');
      @endphp
  @endif


</script>

</body>
</html>
