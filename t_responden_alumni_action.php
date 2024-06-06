<?php
session_start();
include_once('model/t_responden_alumni_model.php');
include_once('model/m_survey_model.php');
include_once('model/koneksi.php');

$survey = new Survey($db);
$idSur = $survey->getSurveyId();
$nama;

$act = $_GET['act'];

if($act == 'simpan'){
    $data = [
        'survey_id' => $idSur,
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_lulus' => $_POST['tahun_lulus']
    ];

    $nama = $_POST['responden_nama'];
    $_SESSION['nama'] = $nama;
    $insert = new t_responden_alumni($db);
    $insert->insertData($data);

    header('Location: form_soal.php?pages=alumni');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_alumni($db);
    $hapus->deleteData($id);

    header('location: t_responden_alumni.php?status=sukses&message=Data berhasil dihapus');
}
?>