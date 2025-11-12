<?php
if (isset($_POST['submit'])) {
    require_once('tcpdf/tcpdf.php');

    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $data = $_POST['date'];
    $observacoes = $_POST['observacoes'];

    // Caminho para o modelo PDF do atestado
    $modeloAtestado = 'PDF/pg_0001.html';

    // Criar uma nova instância do TCPDF
    $pdf = new TCPDF();

    // Definir algumas configurações do PDF
    $pdf->SetCreator('Seu Nome');
    $pdf->SetAuthor('Seu Nome');
    $pdf->SetTitle('Atestado Médico');
    $pdf->SetMargins(15, 15, 15);

    // Adicionar uma nova página
    $pdf->AddPage();

    // Definir o caminho para o modelo HTML
    $modeloHTML = 'PDF/pg_0001.html';

    // Ler o conteúdo do modelo HTML
    $html = file_get_contents($modeloHTML);

    // Substituir os marcadores de posição no modelo com os dados do formulário
    $html = str_replace('##DATA##', $data, $html);
    $html = str_replace('##NOME##', $nome, $html);
    $html = str_replace('##DESCRICAO##', $observacoes, $html);

    // Converter o HTML para PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Nome do arquivo PDF gerado (pode ser personalizado conforme sua necessidade)
    $nomeArquivo = 'Atestado_Medico.pdf';

    // Saída do PDF (disposição: download, visualização, salvamento no servidor etc.)
    $pdf->Output($nomeArquivo, 'D');
}
?>