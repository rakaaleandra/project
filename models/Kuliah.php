<?php
class Kuliah {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $statement = $this->pdo->query("SELECT * FROM kuliah");
        return $statement->fetchAll();
    }

    public function find($id) {
        $statement = $this->pdo->prepare("SELECT * FROM kuliah WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function create($data) {
        $statement = $this->pdo->prepare("INSERT INTO kuliah (fk_nim, fk_nip, fk_kode_matkul, nilai) VALUES (?, ?, ?, ?)");
        return $statement->execute([
            $data['fk_nim'],
            $data['fk_nip'],
            $data['fk_kode_matkul'],
            $data['nilai']
        ]);
    }

    public function update($id, $data) {
        $statement = $this->pdo->prepare("UPDATE kuliah SET fk_nim = ?, fk_nip = ?, fk_kode_matkul = ?, nilai = ? WHERE id = ?");
        return $statement->execute([
            $data['fk_nim'],
            $data['fk_nip'],
            $data['fk_kode_matkul'],
            $data['nilai'],
            $id
        ]);
    }

    public function delete($id) {
        $statement = $this->pdo->prepare("DELETE FROM kuliah WHERE id = ?");
        return $statement->execute([$id]);
    }
}