$(document).ready(function(){
    $("#nome").focus();

    $("#preco").mask('#.##0,00', {placeholder: '0,00', reverse: true});
});

function adicionar_kit()
{
    let quantidade = $("#quantidade").val();
    let descricao = $("#descricao_kit").val();

    if(empty(quantidade) || empty(descricao))
    {
        alert("Por favor, preencher a quantidade e a descrição do KIT.");
        return false;
    }

    let html = "";

    html += "<tr>";
        html += "<td>"+quantidade+"</td>";
        html += "<td>"+descricao+"</td>";
        html += "<td><button type='button' id='btn_excluir' class='btn btn-danger btn-sm' onclick='excluir(this.parentNode.parentNode.rowIndex)'>Excluir</button></td>";
    html += "</tr>";

    $("#table_kit").append(html);
}

function drop_row(row)
{
    document.getElementById('table_kit').deleteRow(row);
}

function salvar()
{
    let nome = $("#nome").val();
    let descricao = $("#descricao").val();
    let categoria = $("#categoria").val();
    let preco = moedaBRparaSQL($("#preco").val());

    if(empty(nome) || empty(descricao) || empty(categoria) || empty(preco))
    {
        alert("Todos os campos devem ser preenchidos.");
        return false;
    }

    var kit = new Array();
    var index = 0;

    $("#table_kit tbody tr").map(function(){
        kit[index] = {
            quantidade: $(this).find('td').eq(0).text(),
            descricao: $(this).find('td').eq(1).text()
        };
        index++;
    });

    let dados = {
        _token: _token,
        nome: nome,
        descricao: descricao,
        categoria: categoria,
        preco: preco,
        kit: kit
    };

    response = requisicao("/produto", dados, "post");

    if(response)
        window.location.href = base_url+"/";
}
