<?php

class Rahasia {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function mahasiswaData(){
        $statement = $this->pdo->query("SELECT * FROM mahasiswa");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dosenData(){
        $statement = $this->pdo->query("SELECT * FROM dosen");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function matakuliahData(){
        $statement = $this->pdo->query("SELECT * FROM mata_kuliah");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function kuliahData(){
        $statement = $this->pdo->query("
            SELECT
                kuliah.id AS id,
                mahasiswa.nim AS nim_mahasiswa,
                mahasiswa.nama AS nama_mahasiswa, 
                mahasiswa.alamat AS alamat_mahasiswa,
                mata_kuliah.kode_matkul AS kode_mata_kuliah,
                mata_kuliah.nama_matkul AS nama_mata_kuliah,
                mata_kuliah.sks AS sks,
                mata_kuliah.semester AS semester,
                dosen.nip AS nip_dosen, 
                dosen.nama AS nama_dosen, 
                dosen.alamat AS alamat_dosen, 
                nilai
            FROM kuliah
            INNER JOIN mahasiswa ON mahasiswa.nim = kuliah.fk_nim
            INNER JOIN mata_kuliah ON mata_kuliah.kode_matkul = kuliah.fk_kode_matkul
            INNER JOIN dosen ON dosen.nip = kuliah.fk_nip;
        ");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}