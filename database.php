<?php
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'root');
    define ('DB_PASS', '');
    define ('DB_NAME', 'sts_arr');
    $koneksi=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));
    
    function tampildata()
    {
        global $koneksi;
        $hasil=mysqli_query($koneksi,"SELECT * from barang;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;

    }

    function Editdata($tablename,$id)
    {
        global $koneksi;
        $hasil=mysqli_query($koneksi,"select * from $tablename where id='$id'");
        return $hasil;
    }

    function delete($tablename,$id)
    {
        global $koneksi;
        $hasil=mysqli_query($koneksi,"delete from $tablename where id='$id'");
        return $hasil;
    }

    function cek_login($username,$password){
		global $koneksi; 
		$uname = $username;
		$upass = $password;		
		$hasil = mysqli_query($koneksi,"SELECT * from user where username='$uname' and password=md5('$upass')");
		$cek = mysqli_num_rows($hasil);
		if($cek > 0 ){
            $query = mysqli_fetch_array($hasil);
            $_SESSION['id'] = $query['id'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
			return true;		
        }
		else {
			return false;
		}	
	}

    function tampildatauser()
    {
        global $koneksi;
        $hasil=mysqli_query($koneksi,"SELECT * from user;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;
    }

?>
