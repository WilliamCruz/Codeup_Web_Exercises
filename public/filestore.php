<?php
//William Cruz
//6-18-14
//Classes and Objects II
//used in todo_filestore and addressDataStore

class Filestore {

    public $filename = '';

    function __construct($filename = '') 
    {
        $this->filename = $filename;
    }
     
    function read_lines()
    {
        $filesize = filesize($filename);
        $handle = fopen($filename, "r");
        $list_string = trim(fread($handle, $filesize));
        $list_array = explode("\n", $list_string);
        fclose($handle);
        return $list_array; 
    }

    function write_lines($array)
    {
        $list_string = implode("\n", $list);
        $handle = fopen($filename, 'w');
        fwrite($handle, $list_string);
        fclose($handle);
    }

    function read_csv()
    {
        $book = [];
        $handle = fopen($this->filename, 'r');
        while(!feof($handle)) {
            $row = fgetcsv($handle);
            if (is_array($row)) {
                $book[] = $row;
            }
        }
        fclose($handle);
        return $book;
    }

    function write_csv($array)
    {
        if (is_writable($this->filename)) {
            $handle = fopen($this->filename, 'w');
            foreach($book as $newData) {
                fputcsv($handle, $newData);
            }
            fclose($handle);
        }
    }
}

?>