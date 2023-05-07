<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pagename ?? 'Sirat'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>
    <div class="container">
        <div class="sidebar">
           <div class="logo"> <img src="/assets/images/logoPGDF.png" /></div>
        </div>
        <div class="content">
            <nav>
               
            </nav>

            <main>
                {{$slot}}                                    
            </main>

        </div>

    </div>    
</body>
</html>