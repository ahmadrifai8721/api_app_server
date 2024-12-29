<?php

class Connection
{
    public $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect('localhost', 'root', 'mimin', 'test_api');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }
    public function query(String $query)
    {
        return mysqli_query($this->connection, $query);
    }

    public function insertDataSiswa(String $npm, String $nama, String $alamat)
    {

        $query =
            $this->query("INSERT INTO mahasiswa (nama, npm, alamat) VALUES ('$nama', '$npm', '$alamat')");
        if ($query) {
            # code...
            echo json_encode([
                "status" => 200,
                "result" => $query
            ]);
        } else {
            echo json_encode([
                "status" => 400,
                "result" => "Data Gagal Di Input"
            ]);
        }
    }

    public function getData()
    {
        $query = $this->query("SELECT * FROM mahasiswa");
        if ($query) {
            # code...
            if (mysqli_num_rows($query) > 0) {
                # code...
                echo json_encode([
                    "status" => 200,
                    "result" => mysqli_fetch_all($query, MYSQLI_ASSOC)
                ], JSON_PRETTY_PRINT);
            } else {

                echo json_encode([
                    "status" => 200,
                    "result" => "Belum Ada data"
                ]);
            }
        } else {
            echo "ee2";
            echo json_encode([
                "status" => 400,
                "result" => "Data Gagal Di Input"
            ]);
        }
    }

    public function updateData(String $id, String $npm, String $nama, String $alamat)
    {
        $query = $this->query("UPDATE mahasiswa SET nama = '$nama', npm = '$npm', alamat = '$alamat' WHERE id = '$id'");
        if ($query) {
            # code...

            echo json_encode([
                "status" => 200,
                "result" => "DAta Berhasil di Update"
            ], JSON_PRETTY_PRINT);
        } else {
            echo "ee2";
            echo json_encode([
                "status" => 400,
                "result" => "Data Gagal Di Input"
            ]);
        }
    }
}
