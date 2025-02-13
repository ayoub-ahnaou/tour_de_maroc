<?php

namespace TourDeMaroc\App\Entity;

class Course {
    private $course_id;
    private $edition;

    public function __construct($edition, $course_id = null) {
        $this->course_id = $course_id;
        $this->edition = $edition;
    }

    public function getId() {
        return $this->course_id;
    }

    public function getEdition() {
        return $this->edition;
    }

    public function setEdition($edition) {
        $this->edition = $edition;
    }
}
