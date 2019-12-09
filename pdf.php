<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'thsarabun' => [
            'R' => 'THNiramitAS.ttf',
            //'I' => 'THSarabunNew Italic.ttf',
            //'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'thsarabun'
]);

$mpdf->SetDocTemplate('form.pdf',false);

// Do not add page until doc template set, as it is inserted at the start of each page
$mpdf->AddPage();
$mpdf->WriteHTML("<br><br><br><div style='text-align:right;font-size:18px;width:88%'> ผบ.8471 </div><div style='text-align:right;font-size:18px;'> ๖๒ </div>");


$mpdf->AddPage();

// Subsequent pages from logoheader.pdf will be inserted on all subsequent pages
$mpdf->Output();

?>