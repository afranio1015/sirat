<x-layout page="Editar Registro"> 
    
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
    <fieldset><legend>Editar Registro de Atividades</legend>
    <form method="POST" action="{{route('record.edit_action')}}">
        @csrf  
        <input type="hidden" name="id" value="{{$records->id}}" />
        <x-form.select_input
            name="working_hour_id"
            label="Expediente"
            placeholder=""> 
                @foreach ($working_hours as $wr )
                <option value="{{$wr->id}}">{{$wr->currentDate}}</option>                 
                @endforeach 
        </x-form.select_input>

        <x-form.text_input
            name="object"
            label="Objeto"
            placeholder="Informe o objeto (CPF/CNPJ, CDA, outros)" 
            value="{{$records->object}}"           
        />
        <x-form.text_input
            name="interested"
            label="Interessado"
            placeholder="Informe o interessado" 
            value="{{$records->interested}}"           
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
            value="{{$records->quantity}}"            
        />  
        <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
    </form>
    </fieldset>    
 </section> 
</x-layout>