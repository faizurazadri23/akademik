<?php

include 'class_koneksi.php';

class Crud extends Koneksi{


    function __construct()
    {
        parent::__construct();
    }

    //fungsi untuk menampilkan data
    public function readData($table, $id_table, $id_Value){
        $q = "SELECT * FROM $table";

        if($id_table!=null){
            $q.=" WHERE $id_table='" .$id_Value."'"; 
        }

        $result = $this->conn->query($q);

        if(!$result){
            echo "Gagal menampilkan data";
        }

        $rows = array();

        while($row=$result->fetch_assoc()){
            $rows[] = $row;
        }

        return $rows;
    }

    public function createData($table, $data){
        $fiealds = implode(', ', array_keys($data));

        $escaped_values = array_map(mysqli_real_escape_string(), array_values($data));

        foreach ($escaped_values as $idx => $data) $escaped_values[$idx]= "'" . $data."'";

        $values = implode(', ', $escaped_values);

        $q = "INSERT INTO $table ($fiealds) VALUES ($values)";
        
        $hasil = $this->conn->query($q);

        if($hasil){
            return "Sukses";
        }else{
            return "Gagal";
        }
    }

    public function updateData($table, $data, $id, $id_Value){
        
        $q = "UPDATE $table SET ";
        $q.=implode(',', $data);
        $q.=" WHERE $id='".$id_Value. "'";

        $result = $this->conn->query($q);

        if($result){
            return "Sukses";
        }else{
            return "Gagal";
        }

    }

    public function deleteData($table, $id, $id_Value){

        $q = "DELETE FROM $table WHERE $id='" .$id_Value. "'";

        $result = $this->conn->query($q);

        if($result){
            return "Sukses";
        }else{
            return "Gagal";
        }
    }
}

?>