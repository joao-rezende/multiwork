<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi.Work</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="<?= BASE_URL . "/assets/bootstrap-5.3.3/css/bootstrap.min.css" ?>" rel="stylesheet">
    <link href="<?= BASE_URL . "/assets/css/main.css" ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Orçamento</h2>
            </div>

            <form id="form-orcamento" action="<?= SITE_URL . "/orcamento/imprimir" ?>" method="POST">
                <div class="row g-5">
                    <div class="col-md-12">
                        <h4 class="mb-3">Dados do Orçamento</h4>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="validade" class="form-label">Validade</label>
                                <input type="date" class="form-control" id="validade" name="validade" placeholder="Validade">
                            </div>

                            <div class="col-sm-6">
                                <label for="cliente" class="form-label">Cliente</label>
                                <input type="text" class="form-control" id="cliente" placeholder="Nome do Cliente" name="cliente" required>
                                <div class="invalid-feedback">
                                    Cliente é obrigatório
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="email-cliente" class="form-label">E-mail do Cliente</label>
                                <input type="text" class="form-control" id="email-cliente" name="email_cliente" placeholder="E-mail do Cliente" value="">
                            </div>

                            <div class="col-12">
                                <label for="endereco-cliente" class="form-label">Endereço do Cliente</label>
                                <input type="text" class="form-control" id="endereco-cliente" name="endereco_cliente" placeholder="Endereço do Cliente">
                            </div>

                            <div class="col-12">
                                <label for="objetivo" class="form-label">Objetivo</label>
                                <textarea id="objetivo" class="form-control" name="objetivo" placeholder="Escreva uma breve descrição dos serviços que serão realizados"></textarea>
                            </div>

                            <div id="observacoes" class="col-12">
                                <label for="observacao-1" class="form-label">Observações</label>
                                <div class="input-group">
                                    <input id="observacao-1" type="text" class="form-control" name="observacoes[]" placeholder="Observação" aria-label="Observação" aria-describedby="btn-adicionar-observacao">
                                    <button class="btn btn-outline-success" type="button" id="btn-adicionar-observacao">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span>Serviços</span>
                            <button class="btn btn-outline-success" type="button" id="btn-adicionar-servico">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </h4>
                        <ul id="servicos" class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <input type="text" class="form-control" id="servico-1" name="servicos[]" placeholder="Descrição do Serviço" value="">
                            </li>
                        </ul>

                        <hr class="my-4">

                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span>Totais</span>
                        </h4>

                        <div class="row g-3">
                            <div class="col-6">
                                <label for="prazo-execucao" class="form-label">Prazo de Execução</label>
                                <input type="text" class="form-control" id="prazo-execucao" name="prazo_execucao" placeholder="Prazo de Execução">
                            </div>

                            <div class="col-6">
                                <label for="unidade-medidao-prazo-execucao" class="form-label">Unidade Medida Prazo Execução</label>
                                <input type="text" class="form-control" id="unidade-medidao-prazo-execucao" name="unidade_medida_prazo_execucao" placeholder="Dias Úteis, Meses, Anos">
                            </div>

                            <div class="col-6">
                                <label for="total-orcamento" class="form-label">Total</label>
                                <input type="number" class="form-control" id="total-orcamento" name="total" placeholder="Total do Orçamento">
                            </div>

                            <div class="col-6">
                                <label for="desconto" class="form-label">Desconto</label>
                                <input type="number" class="form-control" id="desconto" name="desconto" placeholder="Desconto">
                            </div>

                            <div class="col-12">
                                <label for="pagamento" class="form-label">Pagamento</label>
                                <textarea id="pagamento" class="form-control" name="pagamento" placeholder="Informe os detalhes da forma de pagamento"></textarea>
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg mt-4" type="submit">Gerar Orçamento</button>
                    </div>
                </div>
            </form>
        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&copy; 2024 MultiWork</p>
        </footer>
    </div>

    <script src="<?= BASE_URL . "/assets/bootstrap-5.3.3/js/bootstrap.min.js" ?>"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script src="<?= BASE_URL . "/assets/js/pages/orcamento.js" ?>"></script>
</body>

</html>