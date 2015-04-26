<?php

/**
 * Description of FileUploader
 *
 * @author Rohmad
 */
class FileUploader
{

    private $path;
    private $location;
    private $ext;
    private $filename;

    public function prepare($data, $target)
    {
        //die($data['name']);
        $name = $data['name'] . '';
        $exts = explode('.', $name);
        $this->ext = end($exts);
        $this->filename = $data['name'];
        $this->location = $data['tmp_name'];
        $this->path = $target;
    }

    public function upload()
    {
        $randomNumber = rand(0, 100000);
        $randomNumber = $randomNumber . '';
        $toEncode = $this->path . $randomNumber;
        $this->path .= '/' . md5($toEncode) . '.' . $this->ext;
        if (file_exists($this->path))
            @unlink($this->path);

        return move_uploaded_file($this->location, $this->path);
    }
    
    public function getPath()
    {
        return $this->path;
    }

}

?>
