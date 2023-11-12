antonio.gustavo (agsa94)
Testes
1. Na tabela records
1.1 acrescentar um campo totalpontos - () - 
1.2 Acrescentar um campo date na tabela records - OK (current_date)

	'current_date',
        'logged_user'
        'object',
        'interested',        
        'task_id',
        'quantity',
        'total_points'

2. Na view de Registro de atividades
2.1 Mostrar apenas as atividades do dia indicado no campo current_date
2.2 Mostrar total geral de pontos do dia - OK
2.3 Mostrar apenas as atividades do usuário logado - Ok
2.4 Formatar data do expediente para padrão brasileiro 

3. Excluir a tabela working_hours - Ok

4. Registrar as faltas como atividade (abono, férias, atestado...) -> cadastrar esses eventos na tabela tasks
=========================
# Na view records: Calcular total de pontos da atividade

# Já existe uma tabela atividade com atributo ponto

1 - No campo "Atividade", selecionar a atividade - id-atividade;
2 - No campo "Quantidade", informar a quantidade da atividade - quantidade-atividade;

--------------
3 - Pegar a quantidade - (quantidadeAtividade)
4 - Pegar os pontos da tabela atividade pelo id informado no formulário (pontosAtividade) *
--------------
5 - Calcular o total de pontos da atividade - (totalPontos)
5.1 - pontosAtividade * quantidadeAtividade

--------------
6 - Inserir o total de pontos no campo "Total de Pontos"