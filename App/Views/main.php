<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div class="row ">   
            <div class="col-4 justify-content-center">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Authors</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/genre">Genres</a>
                        </li>
                   
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/book">Books</a>
                        </li>
                    </ul> 
                    </div>
                </div>
            </nav>
            </div>
        </div>
        
        <?= $content;?>

    </div>  

    <script src='/bootstrap-5.3.3-dist/js/bootstrap.min.js'> </script>
</body>
</html>