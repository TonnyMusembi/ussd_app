<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
    <table class="table-auto" style="width: 100%;">
      <thead>
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
</div>
<div class="container mt-5" style="max-width: 500px">
 <form action="{{ route('file.upload')}}" method="" enctype="multipart/form-data">
    <button class="btn btn-success"> Next</button>
 </form>
</div>
</body>
</html>
<script>
    const days = ['mon','tue','wed','thu']
    console.log(days[0])
    // if (error){
    //     res.json({
    //         message:'error'
    //     })
    // }
</script>
