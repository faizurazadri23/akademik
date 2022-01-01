<?php

include 'class_koneksi.php';

class Crud extends Koneksi{


    function __construct()
    {
        $host = "localhost";
        $dbname = "db_akademik";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    //fungsi untuk menampilkan data
    public function readData(){
        $query = $this->db->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function createData($nim, $nama_mhs, $tgl_lahir, $email, $jenis_kelamin, $alamat){
        $data = $this->db->prepare('INSERT INTO mahasiswa (nim,nama_mhs,tgl_lahir,email,jenis_kelamin,alamat) VALUES (?, ?, ?, ?, ?, ?)');
        
        $data->bindParam(1, $nim);
        $data->bindParam(2, $nama_mhs);
        $data->bindParam(3, $tgl_lahir);
        $data->bindParam(4, $email);
        $data->bindParam(5, $jenis_kelamin);
        $data->bindParam(6, $alamat);
        

        $data->execute();
        
        if($data){
            return true;
        }else{
            return false;
        }
    }

    public function updateData($nim,$nama_mhs, $tgl_lahir, $email, $jenis_kelamin, $alamat){
        
        $query = $this->db->prepare('UPDATE mahasiswa set nama_mhs=?,tgl_lahir=?,email=?,jenis_kelamin=?,alamat=? where nim=?');
        
        
        $query->bindParam(1, $nama_mhs);
        $query->bindParam(2, $tgl_lahir);
        $query->bindParam(3, $email);
        $query->bindParam(4, $jenis_kelamin);
        $query->bindParam(5, $alamat);
        $query->bindParam(6, $nim);

        $query->execute();

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM mahasiswa where nim=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function deleteData($nim){

        $query = $this->db->prepare("DELETE FROM mahasiswa where nim=?");

        $query->bindParam(1, $nim);

        $query->execute();
        if($query){
            return true;
        }else{
            return false;
        }
    }
}

?>