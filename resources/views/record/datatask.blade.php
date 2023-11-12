<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados da Atividade</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>
    
    <div class="data-tasks">
       <form action="" id="dados" name='formdados'>
       @csrf
        @foreach ($tasks as $task)
       ID...:<input type="number" id="id-task" value="{{$task->id}}" style="width: 35px" />
       Pontos ...:<input type="number" id="task-point" value="{{$task->point}}" style="width: 35px" /><br>
       @endforeach
       </form>       
       
    </div>  
    <div id="div">...</div>      
   
    <script type="text/javascript" src="{{URL::asset('/assets/js/jquery-3.7.1.min.js')}}"> </script>
    <script type="text/javascript" src="{{URL::asset('/assets/js/script.js')}}"> </script>     
</body>
</html>