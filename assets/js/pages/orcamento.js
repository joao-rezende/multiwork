document.getElementById("btn-adicionar-observacao").addEventListener("click", function () {
    const divObservacoes = document.getElementById("observacoes");
    const divInputGroup = document.createElement("div");
    const input = document.createElement("input");
    const botao = document.createElement("button");
    const icone = document.createElement("i");

    divInputGroup.className = "input-group mt-2";
    input.className = "form-control";
    input.type = "text";
    input.name = "observacoes[]";
    input.placeholder = "Observação";
    botao.className = "btn btn-outline-danger"
    botao.type = "button";
    botao.id = "btn-remover-observacao";
    icone.className = "bi bi-x-lg";

    botao.addEventListener("click", removerObservacao);

    botao.append(icone);
    divInputGroup.append(input);
    divInputGroup.append(botao);
    divObservacoes.append(divInputGroup);
});

function removerObservacao(evento) {
    let divInputGroup = evento.target.parentNode;

    if (divInputGroup.className.indexOf("input-group") == -1) {
        divInputGroup = divInputGroup.parentNode;
    }

    divInputGroup.remove();1

}
document.getElementById("btn-adicionar-servico").addEventListener("click", function () {
    const ulServicos = document.getElementById("servicos");
    const divInputGroup = document.createElement("div");
    const liServico = document.createElement("div");
    const input = document.createElement("input");
    const botao = document.createElement("button");
    const icone = document.createElement("i");
 
    divInputGroup.className = "input-group";
    liServico.className = "list-group-item d-flex justify-content-between lh-sm";
    input.className = "form-control";
    input.type = "text";
    input.name = "servicos[]";
    input.placeholder = "Descrição do Serviço";
    botao.className = "btn btn-outline-danger"
    botao.type = "button";
    botao.id = "btn-remover-observacao";
    icone.className = "bi bi-x-lg";

    botao.addEventListener("click", removerServico);

    botao.append(icone);
    divInputGroup.append(input);
    divInputGroup.append(botao);
    liServico.append(divInputGroup);
    ulServicos.append(liServico);
});

function removerServico(evento) {
    let itemGroup = evento.target.parentNode.parentNode;

    if (itemGroup.className.indexOf("list-group-item") == -1) {
        itemGroup = itemGroup.parentNode;
    }

    itemGroup.remove();
}