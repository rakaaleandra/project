<?php
class Dosen {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $statement = $this->pdo->query("SELECT * FROM dosen");
        return $statement->fetchAll();
    }

    public function find($nip) {
        $statement = $this->pdo->prepare("SELECT * FROM dosen WHERE nip = ?");
        $statement->execute([$nip]);
        return $statement->fetch();
    }

    public function create($data) {
        $statement = $this->pdo->prepare("INSERT INTO dosen (nama, nip, alamat) VALUES (?, ?, ?)");
        return $statement->execute([
            $data['nama'],
            $data['nip'],
            $data['alamat']
        ]);
    }

    public function update($nip, $data) {
        $statement = $this->pdo->prepare("UPDATE dosen SET nama = ?, alamat = ? WHERE nip = ?");
        return $statement->execute([
            $data['nama'],
            $data['alamat'],
            $nip
        ]);
    }

    public function delete($nip) {
        $statement = $this->pdo->prepare("DELETE FROM dosen WHERE nip = ?");
        return $statement->execute([$nip]);
    }
}