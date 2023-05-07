<x-layout page="Expediente"> 
    
    <x-slot:btn>
                               
    </x-slot:btn>   

<section class="register">
    
    <fieldset><legend>Iniciar Expediente</legend>
        <form method="POST" action="{{route('working_hour.create_action')}}">
            @csrf
            <x-form.text_input 
                type="datetime-local" 
                name="currentDate" 
                label="Data"
                />
                <x-form.select_input
                name="user_id"
                label="Usuário"
                placeholder=""> 
                    @foreach ($users as $user)
                    <option value="{{$user->id}}"> {{$user->name}} </option>                 
                    @endforeach 
                </x-form.select_input> 
                <x-form.select_input
                name="event"
                label="Afastamento"
                placeholder=""> 
                <option value="NÃO">NÃO SE APLICA</option>                
                    <option value="FÉRIAS">FÉRIAS</option>
                    <option value="ABONO">ABONO DE PONTO</option> 
                    <option value="ATESTADO">ATESTADO MÉDICO</option> 
                    <option value="SEM MOTIVO">SEM MOTIVO</option>
                </x-form.select_input> 
            
            <x-form.form_button resetTxt="Resetar" submitTxt="Salvar" />
        </form> 
    </fieldset> 
</section>
@can('isAdmin')    
    <div class='list-area'>
        @if (count($user_workingHour) > 0)
            <table >
                <caption>
                    <h4>Expedientes</h4>
                </caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Usuário</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                @foreach ($user_workingHour as $uwh)                
                    <tbody>
                        <tr>
                            <td>{{$uwh->id}}</td>
                            <td>{{$uwh->currentDate}}</td>
                            <td>{{$uwh->login}}</td>
                            <td><a href="{{route('working_hour.delete', ['id' => $uwh['id']])}}">
                                <img src="/assets/images/icon-delete.png" />
                            </a></td>
                        </tr>                        
                    </tbody>                    
                @endforeach
                
            </table>
        @else
            Não há itens a serem listados!
            
        @endif    @endcan    
     </div>             
 </section>  
</x-layout>