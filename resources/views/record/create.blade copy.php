<x-layout page="Registrar Atividades"> 
    
    <x-slot:btn>
                        
    </x-slot:btn>   

<section class="register">
    @if($errors->any()) 
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                <li>{{$error}}                    
                @endforeach
            </ul>      
        @endif
        
    <fieldset><legend>Registro de Atividades</legend>
    <form method="POST" action="{{route('record.create_action')}}">
        @csrf 
        <select name="working_hour_id[]" id="working_hour_id">
            
            @foreach ($working_hours as $wh )
                <option value="{{$wh->id}}">{{$wh->currentDate}}</option>                 
                @endforeach 
        </select> 
        <x-form.select_input
            name="working_hour_id"
            label="Expediente"
            placeholder=""> 
                @foreach ($working_hours as $wh )
                <option value="{{$wh->id}}">{{$wh->currentDate}}</option>                 
                @endforeach 
        </x-form.select_input>

        <x-form.text_input
            name="object"
            label="Objeto"
            placeholder="Informe o objeto (CPF/CNPJ, CDA, outros)"            
        />
        <x-form.text_input
            name="interested"
            label="Interessado"
            placeholder="Informe o interessado"            
        />  
        <x-form.select_input
            name="task_id"
            label="Atividade"
            placeholder=""> 
                @foreach ($tasks as $task )
                <option value="{{$task->id}}">{{$task->description}}</option>                 
                @endforeach 
        </x-form.select_input> 
        <x-form.text_input
            name="quantity"
            label="Quantidade"
            placeholder="Quantidade"            
        />  
        <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
    </form>
    </fieldset>
</section>
<div class='list-area'>
@if (count($record_task_workingHour) > 0 && {{}})
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
        @endforeach
    </table>
@else
    Não há itens a serem listados!
    
@endif

</div>           
  
</x-layout>