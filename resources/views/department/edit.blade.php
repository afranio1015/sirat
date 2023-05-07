<x-layout page="Editar Unidade">
        
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
                
        <fieldset><legend>Editar Unidade</legend>
        <form method="POST" action="{{route('dpto.edit_action')}}">            
            @csrf
            <input type="hidden" name="id" value="{{$dpto->id}}" />
            <x-form.text_input
            name="name"
            label="Nome da Unidade"
            placeholder="Digite o nome da unidade"  
            value="{{$dpto->name}}"          
            />
            <x-form.text_input
            name="acronym"
            label="Sigla da Unidade"
            placeholder="Digite a sigla da unidade"  
            value="{{$dpto->acronym}}"          
            />
            <x-form.form_button resetTxt="Resetar" submitTxt="Editar Unidade" />
        </form> 
    </fieldset>         
     </section>     

</x-layout>