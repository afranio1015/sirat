<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <script>
    //funcao para adicionar campos ao formulario
    var controleCampo = 1;
    function adicionarCampo(){
    controleCampo++;

        document.getElementById('form').insertAdjacentHTML('beforeend','<div class="form-group" id="campo' + controleCampo + '"> <select name="working_hour_id[]" id="working_hour_id" placeholder="Escolha o dia" > <option>Escolha o Expediente</option> @foreach($working_hours as $wh ) <option value="{{$wh->id}}">{{$wh->currentDate}} </option> @endforeach</select> <input type="text" name="object[]" id="object" placeholder="Objeto (CPF/CNPJ/CDA/outros)" oninput="transformarMaiuscula(this)"/> <input type="text" name="interested[]" id="interested" placeholder="Informe o interessado" oninput="transformarMaiuscula(this)" size="40px"/> <select name="task_id[]" id="task_id" placeholder="Escolha a atividade"><option>Escolha a atividade</option> @foreach ($tasks as $task )<option value="{{$task->id}}">{{$task->description}}</option>@endforeach </select> <input type="text" name="quantity[]" id="quantity" placeholder="Quant." size="5px"/> <button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>' );
    }
    function removerCampo(idCampo){
        //console.log("Campo remover: " + idCampo);
        document.getElementById('campo' + idCampo).remove();
    }       
    </script> 

    <title>Registro de atividades</title>
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
                <a href="{{route('working_hour.create')}}" class="btn-menu btn-nav"><img src="/assets/images/expediente.png" alt="Criar Expediente"/>Expediente</a>
                <a href="{{route('record.create')}}" class="btn-menu btn-nav"><img src="/assets/images/register.png" alt="Registrar Atividades" />Registrar</a>
                {{$btn ?? null}}                 
                <a href="{{route('logout')}}" class="btn-menu btn-nav"><img src="/assets/images/power.png" alt="Sair"/><br/>Sair</a>
            </nav>

            <main>
                
                
                <section class="register">  
                    @if ($errors->any()) 
                        <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)

                                        <li>{{  $error }}</li>
                                                            
                                        @endforeach
                                    </ul>
                        </div> 
                    @endif                   
                      
                       {{-- @if($value = session('key'))
                            {{$value = session('key')}}
                            {{session()->forget('key')}}
                        @endif  --}}                   
                        
                    <fieldset><legend>Registro de Atividades</legend>
                        <h5> Usuário logado: {{$AuthUser->login}}</h5>
                    <form method="POST" action="{{route('record.create_action')}}">
                        @csrf 
                        <div id="form">
                            <div class="form-group">
                                <select name="working_hour_id[]" id="working_hour_id" placeholder="Escolha o dia" >
                                    <option>Escolha o Expediente</option>
                                    @foreach ($working_hours as $wh )
                                        <option value="{{$wh->id}}">{{$wh->currentDate}}</option>                 
                                    @endforeach 
                                </select> 
                                <input type="text" name="object[]" id="object" placeholder="Objeto (CPF/CNPJ/CDA/outros)" oninput="transformarMaiuscula(this)"/> 
                                <input type="text" name="interested[]" id="interested" placeholder="Informe o interessado" oninput="transformarMaiuscula(this)" size="40px"/>      
                                <select name="task_id[]" id="task_id" placeholder="Escolha a atividade">
                                    <option>Escolha a atividade</option>
                                    @foreach ($tasks as $task )
                                        <option value="{{$task->id}}">{{$task->description}}</option>                 
                                    @endforeach 
                                </select>        
                                <input type="text" name="quantity[]" id="quantity" placeholder="Quant." size="5px"/>
                                <button type="button" onclick="adicionarCampo()"> + </button>
                            </div> 
                        </div>
                        <div class="form-group">
                            <input type="reset" value="Resetar" />
                            <input type="submit" value="Cadastrar" name="CadUsuario" />
                        </div>
                    </form>
                    </fieldset>
                </section>
                <div class='list-area'>
                @if (count($record_task_workingHour) > 0 )
                    <table >
                        <caption>
                            <h4>Registro de Atividades</h4>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Expediente</th>
                                <th>Objeto</th>
                                <th>Interessado</th>
                                <th>Atividade</th>
                                <th>Quantidade</th>
                                <th>Pontos</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        @foreach ($record_task_workingHour->all() as $rtw)
                        @if ($rtw->user_id == $AuthUser->id)                            
                        
                            <tbody>
                                <tr>
                                    <td>{{$rtw->id}}</td>
                                    <td>{{$rtw->currentDate}}</td>
                                    <td>{{$rtw->object}}</td>
                                    <td>{{$rtw->interested}}</td> 
                                    <td>{{$rtw->description}}</td>
                                    <td>{{$rtw->quantity}}</td>  
                                    <td>{{$rtw->point}}</td>                              
                                    <td><a href="{{route('record.edit', ['id' => $rtw->id])}}">
                                        <img src="/assets/images/icon-edit.png" />
                                    </a></td>
                                    <td><a href="{{route('record.delete', ['id' => $rtw['id']])}}">
                                        <img src="/assets/images/icon-delete.png" />
                                    </a></td>
                                </tr>
                            </tbody> 
                            @endif                    
                        @endforeach
                    </table>
                @else
                    *************************************  
                    *   Não há itens a serem listados!  *
                    *************************************  
                    
                @endif
                
                </div>           
            </main>
        </div>
    </div> 
    <script type="text/javascript" src="{{URL::asset('/assets/js/script.js')}}"> </script> 
</body>
</html>
      

