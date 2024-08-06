<?php

namespace Controllers;

class Orcamento
{
    public function index()
    {
        view("orcamento");
    }

    public function imprimir()
    {
        if (empty($_POST)) return header('Location: ' . SITE_URL . "/orcamento");

        ini_set('max_execution_time', '600');

        $css = file_get_contents(DIR_RAIZ . "/assets/css/pdfs/orcamento.css");
        $html = view("pdfs/orcamento", $_POST, TRUE);

        $mpdf = new \Mpdf\Mpdf([
            "margin_top" => 10,
            "margin_left" => 10,
            "margin_right" => 10
        ]);

        // Defina a marca d'água como uma imagem de fundo
        $mpdf->SetDefaultBodyCSS('background', "url('assets/imgs/marca_da_agua.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        $mpdf->SetTitle("orcamento.pdf");
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->SetHTMLFooter('<div style="text-align: center;"><img src="' . DIR_RAIZ . '/assets/imgs/rodape_pdf.png" /></div>');
        $mpdf->Output("orcamento.pdf", \Mpdf\Output\Destination::INLINE);
    }
}
