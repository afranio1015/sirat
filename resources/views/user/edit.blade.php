<x-layout page="Editar Usuário"> 
    
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
    <fieldset><legend>Editar Usuários</legend>
    <form method="POST" action="{{route('user.edit_action')}}">
        @csrf    
        <input type="hidden" name="id" value="{{$user->id}}" />
        <x-form.text_input
        name="name"
        label="Nome do usuário"
        placeholder="Nome do usuário" 
        value="{{$user->name}}"           
        />
        <x-form.text_input
        name="registration"
        label="Matrícula"
        placeholder="Digite a matrícula do usuário"
        value="{{$user->registration}}"            
        />  
        <x-form.text_input
        name="login"
        label="Login do Usuário (primeiro . último nome)"
        placeholder="Digite o login do usuário"
        oninput="transformarMinuscula(this)"   
        value="{{$user->login}}"          
        /> 
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
            value="{{$user->password}}" 
            />
            <x-form.text_input 
            type="password"
            name="password_confirmation" 
            label="Confirme a senha"
            placeholder="Confirmar a senha"
            value="{{$user->password}}" 
            />        
        <x-form.form_button resetTxt="Limpar" submitTxt="Salvar" />
    </form>
    </fieldset>       
 </section> 
</x-layout>