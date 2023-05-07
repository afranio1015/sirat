<x-layout page="Atividades"> 
    
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
        
        <fieldset><legend>Cadastro de Atividades</legend>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf       
            <input type="hidden" name="id" value="{{$task->id}}" />     
            <x-form.text_input
            name="description"
            label="Atividade"
            placeholder="Digite a atividade" 
            value="{{$task->description}}"           
            />
            <x-form.text_input
            name="point"
            label="Pontos"
            placeholder="Digite os pontos da atividade"
            value="{{$task->point}}"            
            />  
            <x-form.select_input
            name="category_id"
            label="Tipo de Atividade"
            placeholder=""> 
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->description}}</option>                 
                @endforeach 
            </x-form.select_input>

            <x-form.select_input
            name="department_id"
            label="Unidade"
            placeholder=""> 
                @foreach ($departments as $depart )
                <option value="{{$depart->id}}">{{$depart->name}}</option>                 
                @endforeach 
            </x-form.select_input> 
            <x-form.form_button resetTxt="Resetar" submitTxt="Editar" />
        </form>
        </fieldset>    
     </section> 
</x-layout>