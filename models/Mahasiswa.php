<?php
class Mahasiswa {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $statement = $this->pdo->query("SELECT * FROM mahasiswa");
        return $statement->fetchAll();
    }

    public function find($nim) {
        $statement = $this->pdo->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
        $statement->execute([$nim]);
        return $statement->fetch();
    }

    public function create($data) {
        $statement = $this->pdo->prepare("INSERT INTO mahasiswa (nama, nim, alamat) VALUES (?, ?, ?)");
        return $statement->execute([
            $data['nama'],
            $data['nim'],
            $data['alamat']
        ]);
    }

    public function update($nim, $data) {
        $statement = $this->pdo->prepare("UPDATE mahasiswa SET nama = ?, alamat = ? WHERE nim = ?");
        return $statement->execute([
            $data['nama'],
            // $data['nim'],
            $data['alamat'],
            $nim
        ]);
    }

    public function delete($nim) {
        $statement = $this->pdo->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        return $statement->execute([$nim]);
    }
}
