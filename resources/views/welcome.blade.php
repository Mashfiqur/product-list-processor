<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List Processor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid row mt-5">
        <h3 class="text-center">Product List Processor</h3>
        <form action="{{ route('parse_file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mx-auto">
                <div class="col-6 offset-3">
                    <label for="inputFile">File:</label>
                    <input type="file" id="inputFile" name="file" required class="form-control">
                    <br>
                    <label for="inputName">Unique File Name:</label>
                    <input type="text" id="inputName" name="unique_file_name" required class="form-control">
                    <small>*Please put a file name without extension</small>
                    <br>
                    <button type="submit" class="btn btn-primary mt-1">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>