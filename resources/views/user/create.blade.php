<x-layout page="Usuários"> 
    
    <x-slot:btn>
              
    </x-slot:btn>   

<section class="register">
    @if($errors->any()) 
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                <li>{{$error}} </li>                   
                @endforeach
            </ul>      
        @endif
    <fieldset><legend>Cadastro de Usuários</legend>
    <form method="POST" action="{{route('user.create_action')}}">
        @csrf            
        <x-form.text_input
        name="name"
        id="name"
        label="Nome do usuário"
        placeholder="Nome do usuário"                 
        />
        <x-form.text_input
        name="registration"
        label="Matrícula"
        placeholder="Digite a matrícula do usuário"            
        />
        <x-form.text_input
        name="login" 
        id="login"                        
        label="Login do Usuário"
        placeholder="Digite o login do usuário  (primeiro . último nome)"
        oninput="transformarMinuscula(this)" 
        
        />
       {{-- <div class="inputArea"> <input type="text" label="Login do Usuario" oninput="transformarMinuscula(this)"/></div> --}}

        <x-form.select_input  
            name="type_user" 
            label="Tipo de Usuário" 
            placeholder="">
             <option value="1">Administrador</option>
             <option value="2">Operador</option>
             <option value="3">Visitante</option>
            </x-form.select_input> 
        <x-form.text_input 
            type="password"
            name="password" 
            label="Cadastre uma senha"
            placeholder="Informe a senha"
            />
            <x-form.text_input 
            type="password"
            name="password_confirmation" 
            label="Confirme a senha"
            placeholder="Confirmar a senha"
            />        
        <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
    </form>
    </fieldset>
</section> 
<div class='list-area'>
@if (count($users) > 0)
    <table >
        <caption>
            <h4>Lista de Usuários</h4>
        </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Usuário</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        @foreach ($users->all() as $user)
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->login}}</td>                                   
                    <td><a href="{{route('user.edit', ['id' => $user->id])}}">
                        <img src="/assets/images/icon-edit.png" />
                    </a></td>
                    <td><a href="{{route('user.delete', ['id' => $user->id])}}">
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