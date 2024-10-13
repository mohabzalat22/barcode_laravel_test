<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="container p-5">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="row">
            @foreach ($students as $s)     
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$s->name}}</h5>
                        <img src="{{asset('barcodes/'.$s->barcode)}}" style="width: 100%;height:30px;" class="my-3">
                        <p class="card-text">{{explode('.', $s->barcode)[0]}}</p>
                    </div>
                </div>
            @endforeach
            
        </div>
        {{ $students->links() }}
    </div>
</body>
</html>