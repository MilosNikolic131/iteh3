<?php 
class Prijava{
    public $id;
    public $predmet;
    public $katedra;
    public $sala;
    public $datum;
    public function __construct($id = null,$predmet = null,$katedra = null,$sala = null,$datum = null){
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }
    
public static function getAll(mysqli $conn){
$query = "SELECT * FROM prijave";
return $conn->query($query);
}

public static function getbyID($id,mysqli $conn)
{
 $query = "SELECT * FROM prijave WHERE id = $id";
$myobj = array();
if($msqlobj = $conn->query($query)){
    while ($red = $msqlobj->fetch_array(1)){
        $myobj[] = $red;
    }
}
return $myobj;

}

public function deletebyID(mysqli $conn){
    $query = "DELETE FROM prijave WHERE id = $this->id";
    return $conn->query($query);

}

public function update($id,mysqli $conn){
    $query = "UPDATE prijave set predmet = $this->predmet,katedra = $this->katedra,sala = $this->sala,datum = $this->datum WHERE id = $this->id";
    return $conn->query($query);
    
}


public static function insert(Prijava $prijava,mysqli $conn){
    $query = "INSERT INTO prijave(predmet,katedra,sala,datum) VALUES ('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
    return $conn->query($query);
    
}







}

?>