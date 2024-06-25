<?php

if (!function_exists('view')) {
    function view($arquivo, $dados = [], $retornar = FALSE) {
		extract($dados);
        $caminho_view = DIR_RAIZ . "/views/$arquivo.php";
        include_once $caminho_view;

        if ($retornar)
		{
			$buffer = ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}
    }
}

if (!function_exists('erro_404')) {
    function erro_404($mensagem = "") {
        http_response_code(404);
        $dados = ["mensagem" => $mensagem ?? "A página que você está procurando não foi encontrada"];
        view("errors/404", $dados);
        die();
    }
}