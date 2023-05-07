<x-layout page="Editar Categoria">    
    
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
               
        <fieldset><legend>Editar Categoria</legend>
        <form method="POST" action="{{route('cat.edit_action')}}">            
            @csrf
            <input type="hidden" name="id" value="{{$cat->id}}" />
            <x-form.text_input
            name="description"
            id="desc"
            label="Categoria da atividade"
            placeholder="Digite a categoria"                         
            value="{{$cat->description}}" 
            onkeyup="transformarMaiuscula()"         
            />            
            <x-form.form_button resetTxt="Resetar" submitTxt="Editar Categoria" />
        </form> 
    </fieldset>         
     </section>     

</x-layout>