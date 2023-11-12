<x-layout page="Categoria"> 
    
    <section class="register"> 
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)                            
                   <li> {{ $error }}</li>                   
                @endforeach
            </ul> 
        </div>     
    @endif              
        
        <fieldset><legend>Cadastro de Categoria</legend>            
            <form method="POST" action="{{route('cat.create_action')}}">
                @csrf
                <x-form.text_input            
                name="description"
                label="Categoria da atividade"
                placeholder="Digite a categoria"
                />            
                <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
            </form>
        </fieldset> 
       
    </section>
        
        <div class='list-area'>
            @if (count($list) > 0)
                    <table >
                        <caption>
                            <h4>Lista de Categorias</h4>
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>                            
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        @foreach ($list->all() as $item)
                            <tbody>
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->description}}</td>                                
                                    <td><a href="{{route('cat.edit', ['id' => $item->id])}}">
                                        <img src="/assets/images/icon-edit.png" />
                                    </a></td>
                                    <td><a href="{{route('cat.delete', ['id' => $item['id']])}}">
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