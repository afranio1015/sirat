<x-layout page="Home">
    <x-slot:btnsb>
        <a href="#" class="btn-menu btn-nav">Relatórios</a>
        <a href="#" class="btn-menu btn-nav">Atividades</a>
    </x-slot:btnsb>
        
        <x-slot:btn>
            {{-- Passando o id do usuário logado para acessar a edição de usuários --}}
            <a href="{{route('user.edit', ['id' => $AuthUser->id])}}" class="btn-menu btn-nav"><img src="/assets/images/senha.png" alt="Mudar Senha" /><br/>Senha</a>             
        </x-slot:btn>              
    
    <section class="register">
        <span class="primary label"> Seja Bem-vindo(a): {{$AuthUser->name}}</span>              
     </section>
     <br> <div>@php $hoje = time()+(7*24*60*60) @endphp </div> 
     {{$hoje}}
</x-layout>