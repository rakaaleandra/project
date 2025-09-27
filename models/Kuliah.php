<?php
class Kuliah {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $sql = "SELECT 
                k.id,
                k.nilai,
                m.nim,
                m.nama AS nama_mahasiswa,
                mk.kode_matkul,
                mk.nama_matkul AS nama_mata_kuliah,
                mk.sks,
                mk.semester,
                d.nip,
                d.nama AS nama_dosen
            FROM kuliah k
            JOIN mahasiswa m ON k.fk_nim = m.nim
            JOIN mata_kuliah mk ON k.fk_kode_matkul = mk.kode_matkul
            JOIN dosen d ON k.fk_nip = d.nip";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function viewAll($id) {
        $sql = "SELECT 
                k.id,
                k.nilai,
                m.nim,
                m.nama AS nama_mahasiswa,
                mk.kode_matkul,
                mk.nama_matkul,
                mk.sks,
                mk.semester,
                d.nip,
                d.nama AS nama_dosen
            FROM kuliah k
            JOIN mahasiswa m ON k.fk_nim = m.nim
            JOIN mata_kuliah mk ON k.fk_kode_matkul = mk.kode_matkul
            JOIN dosen d ON k.fk_nip = d.nip
            WHERE k.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
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