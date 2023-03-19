<?php 
    require_once('../config/db.php');
class Picture{
    use DbConection {
        DbConection::__construct as private __tConstruct;
    }
    public $id;
    // public $name;
    // public $size;
    // public $imagepatch;

    public function __construct( public $name='',public $size='',public $imagepatch='')
    {
        $this->__tConstruct();
    }
    function toDb(){
        $q = $this->dbh->prepare('INSERT INTO `pictures` (pic_name, size, imagepath) VALUE (:name, :size, :filepath);');
        $q->execute([':name' => $this->name, ':size' => $this->size, ':filepath' => $this->imagepatch]);
    }
    function  fromDb($id){
        $q = $this->dbh->prepare('SELECT imagepath, pic_name as name, id, size FROM `pictures` WHERE id = :id');
        $q->execute([':id' => $id]);
        $result = $q->fetch();
        $this->imagepatch = $result['imagepath'];
        $this->size = $result['size'];
        $this->name = $result['name'];
        $this->id = $result['id'];
        
    }
}


