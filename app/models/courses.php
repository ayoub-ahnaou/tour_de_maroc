<?php 
namespace TourDeMaroc\App\models;
use TourDeMaroc\App\libraries\database;

class courses{
    private $course_id;
    private $nom;
    

    public function __construct($course_id=null,$nom=null)
    {
        $this->course_id=$course_id;
        $this->nom=$nom;
   
    }

    // gettters
    public function getId(){
       return $this->course_id;
    }
     public function getNom(){
        return $this->nom;
     }


     public function SelectCourse() {
        $db = database::getInstance()->getConnection();
        $sql = "SELECT * FROM course";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $courses = []; 
        foreach($result as $row) {
            $obj = new self($row['course_id'], $row['edition']);
            $courses[] = $obj; 
        }
        return $courses;  
    }
    

   
  
     
  

}