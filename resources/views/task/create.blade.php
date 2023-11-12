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
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf            
            <x-form.text_input
            required
            id="description"
            name="description"
            pattern="[a-zA-Z][a-zA-Z0-9-_\.]{1,20}"
            label="Atividade"
            placeholder="Digite a atividade"            
            />
            {{-- <small class="error"> A Atividade deve ser no mínimo 2 e máximo 30 caracteres</small> --}}
            <x-form.text_input
            name="point"
            label="Pontos"
            placeholder="Digite os pontos da atividade"            
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
            <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
        </form>
        </fieldset>
    </section> 
<div class='list-area'>
    @if (count($tasks) > 0)
        <table >
            <caption>
                <h4>Lista de Atividades</h4>
            </caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            @foreach ($tasks->all() as $task)
                <tbody>
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->description}}</td>                                
                        <td><a href="{{route('task.edit', ['id' => $task->id])}}">
                            <img src="/assets/images/icon-edit.png" />
                        </a></td>
                        <td><a href="{{route('task.delete', ['id' => $task['id']])}}">
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