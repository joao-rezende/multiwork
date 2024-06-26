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

        $css = file_get_contents(DIR_RAIZ . "/assets/css/pdfs/orcamento.css");
        $html = view("pdfs/orcamento", $_POST, TRUE);

        $mpdf = new \Mpdf\Mpdf([
            "margin_top" => 10,
            "margin_left" => 10,
            "margin_right" => 10
        ]);

        $mpdf->SetTitle("orcamento.pdf");
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->SetWatermarkImage(DIR_RAIZ . "/assets/imgs/marca da agua.png", 0.6);
        $mpdf->showWatermarkImage = true;
        $mpdf->Output("orcamento.pdf", \Mpdf\Output\Destination::INLINE);
    }
}
