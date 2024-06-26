<!DOCTYPE html>
<html lang="pt-BR">

<body>
    <table id="cabecalho">
        <tr>
            <td id="logo">
                <img src="<?= DIR_RAIZ . "/assets/imgs/logo_multiwork.jpg" ?>" width="300" />
            </td>
            <td id="titulo" class="texto-direita">
                <h2>Orçamento</h2>

                <table id="whatsapp">
                    <tr>
                        <td>
                            <img src="<?= DIR_RAIZ . "/assets/imgs/whatsapp.svg" ?>" width="20" height="20" />
                        </td>
                        <td class="numero-telefone">
                            <h4>(11) 97887-0233</h4>
                        </td>
                    </tr>
                </table>
                <h4>CNPJ: 11.381.545/0001-01</h4>
            </td>
        </tr>
    </table>

    <table id="dados-gerais" class="lagura-100">
        <tbody>
            <tr>
                <td>
                    <span class="negrito">Data:</span> <?= date("d/m/Y"); ?>
                </td>
                <td class="texto-direita">
                    <span class="negrito">Validade:</span> <?= !empty($validade) ? date("d/m/Y", strtotime($validade)) : "-"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="negrito">Proposta para:</span>
                    <?= !empty($cliente) ? $cliente : "-"; ?>
                    (<?= !empty($email_cliente) ? $email_cliente : "-"; ?>)
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="negrito">Endreço:</span>
                    <?= !empty($endereco_cliente) ? $endereco_cliente : "-"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="negrito">Objetivo:</span>
                    <?= !empty($objetivo) ? $objetivo : "-"; ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table id="servicos" class="lagura-100">
        <thead>
            <tr>
                <th>Descrição do Serviço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico) : ?>
                <tr>
                    <td><?= $servico; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!empty($observacoes)) : ?>
        <div id="observacoes">
            <h4>Atenção</h4>
            <?php foreach ($observacoes as $observacao) : ?>
                <p><?= $observacao; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <table id="totais" class="lagura-100">
        <tr>
            <td>
                <small class="negrito">Prazo para Execução:</small>
                <?= !empty($prazo_execucao) ? $prazo_execucao : "-"; ?> <?= $unidade_medida_prazo_execucao; ?>
            </td>
            <td id="dados-total-orcamento">
                <h4>
                    <small>Total:</small>
                    <span id="<?= !empty($desconto) ? "total-sem-desconto" : "total-orcamento"; ?>">R$ <?= isset($total) && !empty($total) ? number_format($total, 2, ",", ".") : "-"; ?></span>
                </h4>

                <?php if (!empty($pagamento)) : ?>
                    <?php foreach (explode("\n", $pagamento) as $dados_pagamento) : ?>
                        <p id="menor">
                            <?= $dados_pagamento; ?>
                        </p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
        </tr>

        <?php if (!empty($desconto)) : ?>
            <tr>
                <td class="alinhar-abaixo"><small class="negrito">Desconto:</small> R$ <?= number_format($desconto, 2, ",", "."); ?></td>
                <td class="texto-direita alinhar-abaixo">
                    <h4>
                        <small>Total:</small>
                        <span id="total-orcamento">R$ <?= number_format($total - $desconto, 2, ",", "."); ?></span>
                    </h4>
                </td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>