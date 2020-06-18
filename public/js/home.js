$(document).ready(function(){

    $("#pagina").on('keypress', function(e){
        if(e.keyCode == 13)
        {
            pagina($(this).val());
        }
    });

});

function novo_produto()
{
    window.location.href = base_url+"/produto";
}

function excluir_produto(id)
{
    let dados = {
        _token: _token,
        id: id
    };

    let response = requisicao("/produto/deletar", dados, "post", false);

    if(response)
        window.location.href = base_url+"/";
}

function pagina(pagina)
{
    let dados = {
        _token: _token,
        pagina: pagina
    };
    let response = requisicao("http://localhost:8001/api/produto?page="+pagina, dados, "get", true);

    let body = "";

    response.data.map(function(dados){
        body += "<tr>";
            body += "<td></td>";
            body += "<td>"+dados.nome+"</td>";
            body += "<td>"+dados.descricao+"</td>";
            body += "<td>R$ "+moedaSQLparaBR(dados.preco)+"</td>";
            body += "<td><button type='button' id='btn_excluir' class='btn btn-danger btn-sm' onclick='excluir_produto("+dados.id+")'>Excluir</button></td>";
        body += "</tr>";
    });

    $("#table_produtos tbody").empty();
    $("#table_produtos tbody").append(body);
}
