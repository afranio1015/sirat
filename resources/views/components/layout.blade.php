<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>{{$page ?? 'Sirat'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />    
</head>
<body>
    <div class="container">
        <div class="sidebar">
           <div class="logo"> <img src="/assets/images/logoPGDF.png" /></div>
           {{$btnsb ?? null}}
        </div>
        <div class="content">
            <nav>               
               <a href="{{route('home')}}" class="btn-menu btn-nav"> <img src="/assets/images/home-run.png" alt="Home" /><br/>Home</a>   
               @can('isAdmin')<a href="{{route('department.create')}}" class="btn-menu btn-nav"><img src="/assets/images/departamentos.png" alt="Cadastrar Unidades"/><br/>Unidades</a>                 
                <a href="{{route('category.create')}}" class="btn-menu btn-nav"><img src="/assets/images/categorias.png" alt="Cadastrar Categorias" /><br/>Categorias</a>
                <a href="{{route('task.create')}}" class="btn-menu btn-nav"><img src="/assets/images/tarefas.png" alt="Cadastrar Atividades" /><br/>Atividades</a> 
                <a href="{{route('user.create')}}" class="btn-menu btn-nav"><img src="/assets/images/user.png" /><br/> Usuários</a> @endcan
                <a href="{{route('record.create')}}" class="btn-menu btn-nav"><img src="/assets/images/register.png" alt="Registrar Atividades" />Registrar</a>
                {{$btn ?? null}}                 
                <a href="{{route('logout')}}" class="btn-menu btn-nav"><img src="/assets/images/power.png" alt="Sair"/><br/>Sair</a>
            </nav>

            <main> 
                {{$slot}}                                    
            </main>

        </div>

    </div> 

    <script type="text/javascript" src="{{URL::asset('/assets/js/jquery-3.7.1.mim.js')}}"> </script>
    <script type="text/javascript" src="{{URL::asset('/assets/js/script.js')}}"> </script> 
    
</body>
</html>