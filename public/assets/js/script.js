
function transformarMaiuscula(ustr) {
    let str = ustr.value; //obtém o valor do campo
        ustr.value = str.toUpperCase(); //converte as strings e retorna ao campo
}

function transformarMinuscula(lstr){
    let str = lstr.value;
    lstr.value = str.toLowerCase();
}

//funcao para adicionar campos ao formulario
// var controleCampo = 1;

// function adicionarCampo(){
//     controleCampo++;

//     document.getElementById('form').insertAdjacentHTML('beforeend','<div class="form-group" id="campo' + controleCampo + '"> <select name="working_hour_id[]" id="working_hour_id" placeholder="Escolha o dia" > <option>Escolha o Expediente</option> @foreach($working_hours as $wh ) <option value="{{$wh->id}}">{{$wh->currentDate}} </option> @endforeach</select> <input type="text" name="object[]" id="object" placeholder="Objeto (CPF/CNPJ/CDA/outros)" oninput="transformarMaiuscula(this)"/> <input type="text" name="interested[]" id="interested" placeholder="Informe o interessado" oninput="transformarMaiuscula(this)" size="40px"/> <select name="task_id[]" id="task_id" placeholder="Escolha a atividade"><option>Escolha a atividade</option> @foreach ($tasks as $task )<option value="{{$task->id}}">{{$task->description}}</option>@endforeach </select> <input type="text" name="quantity[]" id="quantity" placeholder="Quant." size="5px"/> <button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>' );
// }
// function removerCampo(idCampo){
//     //console.log("Campo remover: " + idCampo);
//     document.getElementById('campo' + idCampo).remove();
// }
        