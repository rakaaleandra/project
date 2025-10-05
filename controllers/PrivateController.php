<?php

require_once __DIR__ . '/../models/Private.php';

class PrivateController{
    private $private;

    public function __construct($pdo) {
        $this->private = new Rahasia($pdo);
    }

    public function mahasiswa() {
        $data = $this->private->mahasiswaData();
        // Header untuk XML
        header("Content-Type: text/xml; charset=utf-8");

        // Buat objek XML
        $xml = new SimpleXMLElement('<mahasiswas/>');

        // Loop data
        foreach ($data as $row) {
            $mahasiswa = $xml->addChild('mahasiswa');
            $mahasiswa->addChild('nim', $row['nim']);
            $mahasiswa->addChild('nama', htmlspecialchars($row['nama']));
            $mahasiswa->addChild('alamat', htmlspecialchars($row['alamat']));
        }

        // Tampilkan XML
        echo $xml->asXML();
    }

    public function dosen(){
        $data = $this->private->dosenData();
        // Header untuk XML
        header("Content-Type: text/xml; charset=utf-8");

        // Buat objek XML
        $xml = new SimpleXMLElement('<dosens/>');

        // Loop data
        foreach ($data as $row) {
            $dosen = $xml->addChild('dosen');
            $dosen->addChild('nip', $row['nip']);
            $dosen->addChild('nama', htmlspecialchars($row['nama']));
            $dosen->addChild('alamat', htmlspecialchars($row['alamat']));
        }

        // Tampilkan XML
        echo $xml->asXML();
    }

    public function matakuliah(){
        $data = $this->private->matakuliahData();
        // Header untuk XML
        header("Content-Type: text/xml; charset=utf-8");

        // Buat objek XML
        $xml = new SimpleXMLElement('<matakuliahs/>');

        // Loop data
        foreach ($data as $row) {
            $matakuliah = $xml->addChild('mata_kuliah');
            $matakuliah->addChild('kode_mata_kuliah', $row['kode_matkul']);
            $matakuliah->addChild('nama_mata_kuliah', htmlspecialchars($row['nama_matkul']));
            $matakuliah->addChild('sks', $row['sks']);
            $matakuliah->addChild('semester', $row['semester']);
        }

        // Tampilkan XML
        echo $xml->asXML();
    }

    public function kuliah(){
        $data = $this->private->kuliahData();
        // Header untuk XML
        header("Content-Type: text/xml; charset=utf-8");

        // Buat objek XML
        $xml = new SimpleXMLElement('<kuliahs/>');

        // Loop data
        foreach ($data as $row) {
            $kuliah = $xml->addChild('kuliah');
            $kuliah->addChild('id', $row['id']);

            $mahasiswa = $kuliah->addChild('mahasiswa');
            $mahasiswa->addChild('nim', $row['nim_mahasiswa']);
            $mahasiswa->addChild('nama', htmlspecialchars($row['nama_mahasiswa']));
            $mahasiswa->addChild('alamat', htmlspecialchars($row['alamat_mahasiswa']));

            $dosen = $kuliah->addChild('dosen');
            $dosen->addChild('nip', $row['nip_dosen']);
            $dosen->addChild('nama', htmlspecialchars($row['nama_dosen']));
            $dosen->addChild('alamat', htmlspecialchars($row['alamat_dosen']));

            $mataKuliah = $kuliah->addChild('mata_kuliah');
            $mataKuliah->addChild('kode_mata_kuliah', htmlspecialchars($row['kode_mata_kuliah']));
            $mataKuliah->addChild('nama_mata_kuliah', htmlspecialchars($row['nama_mata_kuliah']));
            $mataKuliah->addChild('sks', $row['sks']);
            $mataKuliah->addChild('semester', $row['semester']);

            $kuliah->addChild('nilai', $row['nilai']);
        }

        // Tampilkan XML
        echo $xml->asXML();
    }

    public function all(){
        $dataMahasiswa = $this->private->mahasiswaData();
        $dataDosen = $this->private->dosenData();
        $dataMatakuliah = $this->private->matakuliahData();
        $dataKuliah = $this->private->kuliahData();

        // Header untuk XML
        header("Content-Type: text/xml; charset=utf-8");

        // Buat objek XML
        $xml = new SimpleXMLElement('<allData/>');

        $xmlMahasiswa = $xml->addChild('mahasiswas');
        $xmlDosen = $xml->addChild('dosens');
        $xmlMatakuliah = $xml->addChild('matakuliahs');
        $xmlKuliah = $xml->addChild('kuliahs');

        // Loop data
        foreach ($dataMahasiswa as $row) {
            $mahasiswa = $xmlMahasiswa->addChild('mahasiswa');
            $mahasiswa->addChild('nim', $row['nim']);
            $mahasiswa->addChild('nama', htmlspecialchars($row['nama']));
            $mahasiswa->addChild('alamat', htmlspecialchars($row['alamat']));
        }

        foreach ($dataDosen as $row) {
            $dosen = $xmlDosen->addChild('dosen');
            $dosen->addChild('nip', $row['nip']);
            $dosen->addChild('nama', htmlspecialchars($row['nama']));
            $dosen->addChild('alamat', htmlspecialchars($row['alamat']));
        }

        foreach ($dataMatakuliah as $row) {
            $matakuliah = $xmlMatakuliah->addChild('mata_kuliah');
            $matakuliah->addChild('kode_mata_kuliah', $row['kode_matkul']);
            $matakuliah->addChild('nama_mata_kuliah', htmlspecialchars($row['nama_matkul']));
            $matakuliah->addChild('sks', $row['sks']);
            $matakuliah->addChild('semester', $row['semester']);
        }

        foreach ($dataKuliah as $row) {
            $kuliah = $xmlKuliah->addChild('kuliah');
            $kuliah->addChild('id', $row['id']);

            $mahasiswa = $kuliah->addChild('mahasiswa');
            $mahasiswa->addChild('nim', $row['nim_mahasiswa']);
            $mahasiswa->addChild('nama', htmlspecialchars($row['nama_mahasiswa']));
            $mahasiswa->addChild('alamat', htmlspecialchars($row['alamat_mahasiswa']));

            $dosen = $kuliah->addChild('dosen');
            $dosen->addChild('nip', $row['nip_dosen']);
            $dosen->addChild('nama', htmlspecialchars($row['nama_dosen']));
            $dosen->addChild('alamat', htmlspecialchars($row['alamat_dosen']));

            $mataKuliah = $kuliah->addChild('mata_kuliah');
            $mataKuliah->addChild('kode_mata_kuliah', htmlspecialchars($row['kode_mata_kuliah']));
            $mataKuliah->addChild('nama_mata_kuliah', htmlspecialchars($row['nama_mata_kuliah']));
            $mataKuliah->addChild('sks', $row['sks']);
            $mataKuliah->addChild('semester', $row['semester']);

            $kuliah->addChild('nilai', $row['nilai']);
        }

        // Tampilkan XML
        echo $xml->asXML();
    }
}