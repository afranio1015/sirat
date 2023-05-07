<x-layout page="Unidade"> 
    
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
        
        <fieldset><legend>Cadastro de Unidades</legend>
        <form method="POST" action="{{route('dpto.create_action')}}">
            @csrf
            <x-form.text_input
            name="name"
            label="Nome da Unidade"
            placeholder="Digite o nome da unidade"            
            />
            <x-form.text_input
            name="acronym"
            label="Sigla da Unidade"
            placeholder="Digite a sigla da unidade"            
            />
            <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
        </form>
        </fieldset>
    </section> 
        <div class='list-area'>
            @if (count($list) > 0)
                <table >
                    <caption>
                        <h4>Lista de Unidades</h4>
                    </caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    @foreach ($list->all() as $item)
                        <tbody>
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->acronym}}</td>
                                <td><a href="{{route('dpto.edit', ['id' => $item['id']])}}">
                                    <img src="/assets/images/icon-edit.png" />
                                </a></td>
                                <td><a href="{{route('dpto.delete', ['id' => $item['id']])}}">
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