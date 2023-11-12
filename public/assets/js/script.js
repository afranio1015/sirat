function transformarMaiuscula(ustr) {
    let str = ustr.value; //obtém o valor do campo
        ustr.value = str.toUpperCase(); //converte as strings e retorna ao campo
}

function transformarMinuscula(lstr){
    let str = lstr.value;
    lstr.value = str.toLowerCase();
}    

document.querySelectorAll('.quantidade').forEach(function (element){
    element.addEventListener('input', calcularTotalPontos);
});

document.querySelectorAll('.tarefa_id').forEach(function(element){
    element.addEventListener('change', calcularTotalPontos);
});

function calcularTotalPontos(event) {
    const quantidadeInput = event.target.parentElement.querySelector('.quantidade');
    const tarefa_id = parseFloat(event.target.parentElement.querySelector('.tarefa_id').value);
    const totalPontosInput = event.target.parentElement.querySelector('.totalPontos');

    obterPontosDaTarefa(tarefa_id, quantidadeInput, totalPontosInput);
   
}

function obterPontosDaTarefa(tarefa_id, quantidadeInput, totalPontosInput) {
    const quantidade = parseFloat(quantidadeInput.value);


    // Requisição AJAX para obter os pontos da tarefa selecionada do servidor
    $.ajax({
        url: '/obter-pontos-tarefa/' + tarefa_id,
        method: 'GET',
        data: { quantidade: quantidade },
        success: function (response) {
            if (response.totalPontos) {
                // Atualizar o campo totalPontos específico com os pontos obtidos
                totalPontosInput.value = response.totalPontos;
            } else {
                // Tratar erros, se necessário
            }
        },
        error: function (xhr, status, error) {
            // Tratar erros, se necessário
        }
    });
}
calcularTotalPontos();