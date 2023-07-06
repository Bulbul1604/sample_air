<?php

use PhpOffice\PhpWord\TemplateProcessor;

require_once('../vendor/autoload.php');
require_once '../src/config/app.php';

$templateProcessor = new TemplateProcessor('../Template/PENGAMBILAN_CONTOH_AIR.docx');

$query = mysqli_query($connection, "SELECT * FROM data");
$values = [];
while ($result = mysqli_fetch_assoc($query)) {
    $values[] = [
        'penetapan' => ucwords($result['penetapan']),
        'tmpt_penyimpanan' => ucwords($result['tmpt_penyimpanan']),
        'jmlh_contoh' => ucwords($result['jmlh_contoh']),
        'pengawetan' => ucwords($result['pengawetan']),
        'bts_penyimpanan' => ucwords($result['bts_penyimpanan']),
        'satuan' => ucwords($result['satuan']),
    ];
}
$templateProcessor->cloneRowAndSetValues('penetapan', $values);
$tanggal = date('d F Y');
$templateProcessor->setValue('tanggal', $tanggal);

$pathToSave = "../Template/PENGAMBILAN_CONTOH_AIR_new.docx";
$templateProcessor->saveAs($pathToSave);
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="PENGAMBILAN CONTOH AIR/AIR LIMBAH.docx"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
readfile($pathToSave);
