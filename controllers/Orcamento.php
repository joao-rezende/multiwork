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
        // var_dump($_POST);
        // exit();
        $css = file_get_contents(DIR_RAIZ . "/assets/css/pdfs/orcamento.css");
        $html = view("pdfs/orcamento", $_POST, TRUE);

        // echo $html;
        // die();

        $mpdf = new \Mpdf\Mpdf([
            "margin_top" => 10,
            "margin_left" => 10,
            "margin_right" => 10
        ]);

        $mpdf->SetTitle("orcamento.pdf");
        $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output("orcamento.pdf", \Mpdf\Output\Destination::INLINE);
    }
}
