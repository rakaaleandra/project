<?php
class MataKuliah{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $statement = $this->pdo->query("SELECT * FROM mata_kuliah");
        return $statement->fetchAll();
    }

    public function find($kode_matkul) {
        $statement = $this->pdo->prepare("SELECT * FROM mata_kuliah WHERE kode_matkul = ?");
        $statement->execute([$kode_matkul]);
        return $statement->fetch();
    }

    public function create($data) {
        $statement = $this->pdo->prepare("INSERT INTO mata_kuliah (nama_matkul, kode_matkul, sks, semester) VALUES (?, ?, ?, ?)");
        return $statement->execute([
            $data['nama_matkul'],
            $data['kode_matkul'],
            $data['sks'],
            $data['semester']
        ]);
    }

    public function update($kode_matkul, $data) {
        $statement = $this->pdo->prepare("UPDATE mata_kuliah SET nama_matkul = ?, sks = ?, semester = ? WHERE kode_matkul = ?");
        return $statement->execute([
            $data['nama_matkul'],
            $data['sks'],
            $data['semester'],
            $kode_matkul
        ]);
    }

    public function delete($kode_matkul) {
        $statement = $this->pdo->prepare("DELETE FROM mata_kuliah WHERE kode_matkul = ?");
        return $statement->execute([$kode_matkul]);
    }
}