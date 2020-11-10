<?php 
class Image
{
    public $file;
    public $location;
    public $allowed_size;
    public $extension;

    function __construct()
    {
        // array of "name", "size, "type", "error"
        $this->file = NULL;
        $this->extension = NULL;
        $this->location = '/opt/lampp/htdocs/professor/images/';
        $this->allowed_size = 12000;
    }

    function Initialize($f)
    {
        // array of "name", "size, "type", "error"
        $this->file = $f;
    }

    public function Extension()
    {
        $this->extension = pathinfo($this->file['name'], PATHINFO_EXTENSION);;
        if ($this->extension === "png") {
            return true;
        } else {
            return false;
        }
    }

    public function Upload($img_name)
    {
        if (move_uploaded_file($this->file["tmp_name"], $this->location .  $img_name)) {
            return true;
        } else {
            return false;
        }
    }
}

?>