<?php

use PhpOffice\PhpWord\TemplateProcessor;

require_once('../vendor/autoload.php');
require_once '../src/config/app.php';

$id = $_GET['id'];

$templateProcessor = new TemplateProcessor('../Template/PENGAMBILAN_CONTOH_AIR_CARI.docx');

$query = mysqli_query($connection, "SELECT * FROM data WHERE id = '$id'");
$result = mysqli_fetch_assoc($query);
$tanggal = date('d F Y');
$templateProcessor->setValue('tanggal', $tanggal);
$templateProcessor->setValue('penetapan', ucwords($result['penetapan']));
$templateProcessor->setValue('tmpt_penyimpanan', strtoupper($result['tmpt_penyimpanan']));
$templateProcessor->setValue('jmlh_contoh', ($result['jmlh_contoh']));
$templateProcessor->setValue('pengawetan', ucwords($result['pengawetan']));
$templateProcessor->setValue('bts_penyimpanan', ($result['bts_penyimpanan']));
$templateProcessor->setValue('satuan', ucwords($result['satuan']));


$pathToSave = "../Template/PENGAMBILAN_CONTOH_AIR_CARI_new.docx";
$templateProcessor->saveAs($pathToSave);
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="PENGAMBILAN CONTOH AIR/AIR LIMBAH.docx"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
readfile($pathToSave);
