
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  

    <title>Registro de atividades</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />   
</head>
<body>
   {{-- <script>
        //funcao para adicionar campos ao formulario        
        
        var controleCampo = 1;
        function adicionarCampo(){
            controleCampo++;

            document.querySelector('.form-register').insertAdjacentHTML('beforeend','<div class="form-group" id="campo' + controleCampo + '"> <input type="hidden" name="user_id[]" value="{{$AuthUser->id}}" id="user_id" style="width: 90px"/> <input type="datetime-local" name="current_date[]" id="current_date" /> <input type="text" name="object[]" id="object" placeholder="Objeto (CPF/CNPJ/CDA/outros)" oninput="transformarMaiuscula(this)" size="15px"/> <input type="text" name="interested[]" id="interested" placeholder="Informe o interessado" oninput="transformarMaiuscula(this)" size="30px"/> <select name="task_id[]" class="tarefa_id" placeholder="Escolha a atividade" style="width:180px;" onchange="obterPontosDaTarefa(this)" > <option >Escolha a atividade</option>@foreach ($tasks as $task )<option value="{{$task->id}}" id="atividade"> {{$task->description}} </option> @endforeach </select> <input type="number" name="quantity[]" value="" class="quantidade" placeholder="Quant." style="size:4px" /> <input type="hidden" name="total_points[]" class="totalPontos" size="4px" /> <button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>' ); }
        function removerCampo(idCampo){
            //console.log("Campo remover: " + idCampo);
            document.getElementById('campo' + idCampo).remove();
        }  
                            
    </script> --}}
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
                <section class="register">  
                    {{-- @if ($errors->any()) 
                        <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>                                                            
                                        @endforeach
                                    </ul>
                        </div> 
                    @endif  --}}
                    
                        
                    <fieldset><legend>Registro de Atividades</legend>
                        <h5> Usuário logado: {{$AuthUser->login}} - Em: @php echo date("d-m-Y H:i"); @endphp </h5> 
                    <form method="POST" action="{{route('record.create_action')}}">
                        @csrf 
                        <div class="form-register">
                            <div class="form-group">
                                <input type="hidden" name="user_id[]" value="{{$AuthUser->id}}" id="user_id" style="width: 90px"/>
                                <input type="date" value="@php $hoje = date("Y-m-d"); echo $hoje; @endphp" name="current_date[]" id="current_date" />                                
                                <input type="text" name="object[]" id="object" placeholder="Objeto (CPF/CNPJ/CDA/outros)" oninput="transformarMaiuscula(this)" size="15px"/> 
                                <input type="text" name="interested[]" id="interested" placeholder="Informe o interessado" oninput="transformarMaiuscula(this)" size="30px"/>      
                                <select name="task_id[]" class="tarefa_id" placeholder="Escolha a atividade" style="width:180px;" onchange="obterPontosDaTarefa(this)" >
                                     <option >Escolha a atividade</option>                                     
                                    @foreach ($tasks as $task ) 
                                        <option value="{{$task->id}}" id="atividade"> {{$task->description}} </option>                                     
                                    @endforeach
                                </select> 
                                <input type="number" name="quantity[]" value="" class="quantidade" placeholder="Quant." style="width:60px" />
                                <input type="hidden" name="total_points[]" class="totalPontos" size="4px" /> 
                                {{-- <button type="button" onclick="adicionarCampo()"> + </button> --}}
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
                     
                @if (count($records) > 0 )
                    <table >
                        <caption>
                            <h4>Registro de Atividades</h4>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Servidor</th>
                                <th>Objeto</th>
                                <th>Interessado</th>
                                <th>Atividade</th>
                                <th>Qtd.</th>
                                <th>Pts.</th>
                                <th>Total</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>                        
                        
                        @foreach ($record_task as $rt)

                            @php $dataAtual = date('Y-m-d')   @endphp                                 
                            @if ($rt->user_id == $AuthUser->id && $rt->current_date == $dataAtual)                                
                                <tbody>
                                    <tr>
                                        <td>{{$rt->r_id}}</td>                                       
                                        <td>{{$rt->current_date}}</td>                                      
                                        <td>{{$AuthUser->login}}</td>
                                        <td>{{$rt->object}}</td>
                                        <td>{{$rt->interested}}</td> 
                                        <td>{{$rt->description}}</td>
                                        <td>{{$rt->quantity}}</td>  
                                        <td>{{$rt->point}}</td>  
                                        <td>{{$rt->total_points}}</td>                            
                                        <td><a href="{{route('record.edit', ['id' => $rt->r_id])}}">
                                            <img src="/assets/images/icon-edit.png" />
                                        </a></td>
                                        <td><a href="{{route('record.delete', ['id' => $rt['r_id']])}}">
                                            <img src="/assets/images/icon-delete.png" />
                                        </a></td>                                        
                                    </tr> 
                                                                                                                             
                                </tbody>                                 
                            @endif 
                          @php  
                          $dataTarefa = $rt->current_date;
                          $hoje = date('Y-m-d');
                          

                          @endphp                   
                        @endforeach
                        {{--\App\Models\Record::sum('total_points'); --}}
                                                
                        
                            @php
                              $totalPontos = 0; 
                              $hoje = date('Y-m-d');                              
                                foreach ($record_task as $rt){
                                    if($hoje == $rt->current_date && $rt->user_id == $AuthUser->id){
                                        $totalPontos += $rt->total_points; //\App\Models\Record::sum('total_points');
                                }
                              }
                            @endphp
                            Total de Pontos do Dia: {{ $totalPontos }}
                        
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
    <script type="text/javascript" src="{{URL::asset('/assets/js/jquery-3.7.1.min.js')}}"> </script> 
    <script type="text/javascript" src="{{URL::asset('/assets/js/script.js')}}"> </script> 
</body>
</html>