<?php
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../models/Dosen.php';

class DosenController {
    private $user;
    private $auth;

    public function __construct($pdo) {
        $this->user = new Dosen($pdo);
        $this->auth = new Auth($pdo);
    }

    private function checkAuth() {
        if (!$this->auth->check()) {
            header('Location: /project/login');
            exit;
        }
    }

    public function index() {
        $this->checkAuth();
        $users = $this->user->all();
        require_once 'views/dosens/index.php';
    }

    public function create() {
        $this->checkAuth();
        require_once 'views/dosens/create.php';
    }

    public function store() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/dosen/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            require_once 'views/dosens/create.php';
            return;
        }

        $data = [
            'nip' => htmlspecialchars($_POST['nip'] ?? '', ENT_QUOTES, 'UTF-8'),
            'nama' => htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES, 'UTF-8'),
            'alamat'=> htmlspecialchars($_POST['alamat'] ?? '', ENT_QUOTES, 'UTF-8'),
        ];

        $errors = [];
        $dosen = $this->user->find($data['nip']);
        if ($dosen) {
            $errors[] = "NIP sudah terdaftar.";
        }
        if (!is_string($data['nama'])) {
            $errors[] = "Nama harus berupa teks.";
        }
        if (empty($data['nama']) || !preg_match('/^[a-zA-Z\s\']+$/', $data['nama'])) {
            $errors[] = "Nama hanya boleh berisi huruf, spasi, atau apostrof.";
        }

        if (!empty($errors)) {
            $old = $data;
            require_once 'views/dosens/create.php';
            return;
        }

        if ($this->user->create($data)) {
            header('Location: /project/dosen/index');
        } else {
            $errors[] = "Gagal menyimpan data.";
            $old = $data;
            require_once 'views/dosens/create.php';
        }
    }

    public function edit($nip) {
        $this->checkAuth();
        $user = $this->user->find($nip);
        if ($user) {
            require_once 'views/dosens/edit.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }

    public function update($nip) {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
            header('Location: /project/dosen/index');
            exit;
        }

        if (!$this->auth->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $errors[] = "CSRF token tidak valid.";
            $user = $this->user->find($nip);
            require_once 'views/dosens/edit.php';
            return;
        }

        $data = [
            'nama' => htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES, 'UTF-8'),
            'alamat' => htmlspecialchars($_POST['alamat'] ?? '', ENT_QUOTES, 'UTF-8'),
        ];

        $errors = [];

        if (!is_string($data['nama'])) {
            $errors[] = "Nama harus berupa teks.";
        }
        if (empty($data['nama']) || !preg_match('/^[a-zA-Z\s\']+$/', $data['nama'])) {
            $errors[] = "Nama hanya boleh berisi huruf, spasi, atau apostrof.";
        }

        if (!empty($errors)) {
            $old = $data;
            $user = $this->user->find($nip);
            require_once 'views/dosens/edit.php';
            return;
        }

        if ($this->user->update($nip, $data)) {
            header('Location: /project/dosen/index');
        } else {
            $errors[] = "Gagal memperbarui data.";
            $old = $data;
            $user = $this->user->find($nip);
            require_once 'views/dosens/edit.php';
        }
    }

    public function delete($nip) {
        $this->checkAuth();
        if ($this->user->delete($nip)) {
            header('Location: /project/dosen/index');
        } else {
            echo "Gagal menghapus data.";
        }
    }

    public function show($nip) {
        $this->checkAuth();
        $user = $this->user->find($nip);
        if ($user) {
            require_once 'views/dosens/show.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }
}
