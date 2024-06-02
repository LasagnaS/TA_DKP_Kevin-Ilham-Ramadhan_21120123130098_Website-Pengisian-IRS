<?php  
class userService {  
    protected $email;    
    protected $password;   
    protected $dataUser;   
    protected $getNama;
    protected $getJurusan; 
    protected $getNim;
    protected $getIpk;
    protected $data;
  
    public function __construct($email = null, $password = null){  
        $this->dataUser = [  
            (object) [  
                'email'     => "kevin@gmail.com",  
                'password'  => "asdasd",
                'nama'      => "Kevin Ilham Ramadhan",
                'jurusan'   => "Teknik Komputer S1",
                'nim'       => "21120123130098",
                'ipk'       => 3.70
            ],  
            (object) [  
                'email'     => "user@gmail.com",  
                'password'  => "123123",  
                'nama'      => "user",
                'jurusan'   => "Sistem Informasi S2",
                'nim'       => "21120123150001",
                'ipk'       => 2.57
            ]  
        ];  
       $this->email = $email;  
       $this->password = $password;  
    }  
  
    public function login() {  
        $user = $this->checkCredentials();  
        if($user) {  
            $this->getJurusan = $user->jurusan;
            $this->getNim = $user->nim;
            $this->getIpk = $user->ipk;
            $this->getNama = $user->nama;
            return true;
        } else {  
            return false;  
        }  
    }  
  
    protected function checkCredentials() {  
        foreach($this->dataUser as $key => $value) {
            if($value->email == $this->email && $value->password == $this->password) {  
                return $value;  
            }  
        }  
        return false;  
    }  
    
    public function getNama() {  
        return $this->getNama; 
    }

    public function getJurusan() {  
        return $this->getJurusan; 
    }
    
    public function getNim() {  
        return $this->getNim; 
    }

    public function getIpk() {  
        return $this->getIpk; 
    }
}

$data = [
    /*Senin*/[
        [
            "matkul" => "Kalkulus",
            "kelas" => "Kelas A",
            "jam" => "07.00 - 10.20",
            "sks" => 4,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Kimia",
            "kelas" => "Kelas A",
            "jam" => "07.00 - 09.30",
            "sks" => 3,
            "ruang" => "Ruang A.202"
        ],
        [
            "matkul" => "Elektronika Dasar",
            "kelas" => "Kelas B",
            "jam" => "07.00 - 08.40",
            "sks" => 2,
            "ruang" => "Ruang B.102"
        ],
        [
            "matkul" => "Kalkulus",
            "kelas" => "Kelas C",
            "jam" => "10.20 - 12.00",
            "sks" => 4,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Aljabar Linear",
            "kelas" => "Kelas A",
            "jam" => "10.20 - 13.40",
            "sks" => 4,
            "ruang" => "Ruang A.202"
        ],
    ],
    /*Selasa*/[
        [
            "matkul" => "Aljabar Linear",
            "kelas" => "Kelas C",
            "jam" => "07.50 - 09.30",
            "sks" => 4,
            "ruang" => "Ruang B.101"
        ],
        [
            "matkul" => "Elektronika Dasar",
            "kelas" => "Kelas A",
            "jam" => "07.00 - 08.40",
            "sks" => 2,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Kalkulus",
            "kelas" => "Kelas B",
            "jam" => "10.20 - 13.40",
            "sks" => 4,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Kimia",
            "kelas" => "Kelas B",
            "jam" => "12.00 - 14.30",
            "sks" => 3,
            "ruang" => "Ruang A.202"
        ],
        [
            "matkul" => "Fisika Dasar",
            "kelas" => "Kelas A",
            "jam" => "12.50 - 16.10",
            "sks" => 4,
            "ruang" => "Ruang B.201"
        ],
    ],
    /*Rabu*/[
        [
            "matkul" => "Fisika Dasar",
            "kelas" => "Kelas B",
            "jam" => "07.00 - 10.20",
            "sks" => 4,
            "ruang" => "Ruang B.201"
        ],
        [
            "matkul" => "Aljabar Linear",
            "kelas" => "Kelas B",
            "jam" => "09.30 - 15.00",
            "sks" => 4,
            "ruang" => "Ruang A.202"
        ],
        [
            "matkul" => "Kimia",
            "kelas" => "Kelas D",
            "jam" => "10.20 - 12.50",
            "sks" => 3,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Elektronika Dasar",
            "kelas" => "Kelas C",
            "jam" => "12.50 - 14.30",
            "sks" => 2,
            "ruang" => "Ruang B.101"
        ],
        [
            "matkul" => "Kalkulus",
            "kelas" => "Kelas E",
            "jam" => "13.40 - 17.00",
            "sks" => 4,
            "ruang" => "Ruang B.201"
        ],
    ],
    /*Kamis*/[
        [
            "matkul" => "Aljabar Linear",
            "kelas" => "Kelas D",
            "jam" => "07.00 - 10.20",
            "sks" => 4,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Kimia",
            "kelas" => "Kelas C",
            "jam" => "09.30 - 12.00",
            "sks" => 3,
            "ruang" => "Ruang B.101"
        ],
        [
            "matkul" => "Fisika Dasar",
            "kelas" => "Kelas D",
            "jam" => "10.20 - 13.40",
            "sks" => 4,
            "ruang" => "Ruang A.202"
        ],
        [
            "matkul" => "Elektronika Dasar",
            "kelas" => "Kelas D",
            "jam" => "12.00 - 13.40",
            "sks" => 2,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Fisika Dasar",
            "kelas" => "Kelas C",
            "jam" => "12.50 - 16.10",
            "sks" => 4,
            "ruang" => "Ruang B.201"
        ],
    ],
    /*Jum'at*/[
        [
            "matkul" => "Kalkulus",
            "kelas" => "Kelas D",
            "jam" => "07.00 - 10.20",
            "sks" => 4,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Fisika Dasar",
            "kelas" => "Kelas E",
            "jam" => "07.50 - 11.10",
            "sks" => 4,
            "ruang" => "Ruang A.202"
        ],
        [
            "matkul" => "Aljabar Linear",
            "kelas" => "Kelas E",
            "jam" => "08.40 - 12.00",
            "sks" => 4,
            "ruang" => "Ruang B.201"
        ],
        [
            "matkul" => "Kimia",
            "kelas" => "Kelas E",
            "jam" => "12.50 - 15.20",
            "sks" => 3,
            "ruang" => "Ruang A.201"
        ],
        [
            "matkul" => "Elektronika Dasar",
            "kelas" => "Kelas E",
            "jam" => "13.40 - 15.20",
            "sks" => 2,
            "ruang" => "Ruang A.202"
        ],
    ],
    /*Days*/["Senin", "Selasa", "Rabu", "Kamis", "Jum'at"]
];