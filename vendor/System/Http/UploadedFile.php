<?php 

namespace System\Http;

class UploadedFile 
{
    /**
     * Application Object
     *
     * @var \System\Application
     */
    // private $app;


    /**
     * File name
     * 
     * @var array
     */
    private $file = [];


    /**
     * File name
     * 
     * @var string
     */
    private $fileName;


    /**
     * File name without extention
     * 
     * @var string
     */
    private $nameOnly;


    /**
     * File name extention
     * 
     * @var string
     */
    private $extention;


    /**
     * File mime type
     * 
     * @var string
     */
    private $mimeType;


    /**
     * File temp path
     * 
     * @var string
     */
    private $tempFile;


    /**
     * File size in bytes
     * 
     * @var string
     */
    private $size;


    /**
     * File Error
     * 
     * @var int
     */
    private $error;


    /**
     * The allowed image extentions
     * 
     * @var array
     */
    private $allowedImageExtentions = ['gif', 'jpg', 'jpeg', 'png', 'webp'];
    
    
    /**
     * Constructor
     * 
     * @param string $input
     */
    public function __construct($input)
    {
        $this->getFileInfo($input);
    }


    /**
     * Start collection uploaded file data
     * 
     * @param string $input
     * @return void
     */
    private function getFileInfo($input)
    {
        if(empty($_FILES[$input])){
            return;
        }

        $file = $_FILES[$input];

        $this->error = $file['error'];

        if($this->error != UPLOAD_ERR_OK){
            return;
        }

        $this->file = $file;

        $this->fileName = $this->file['name'];

        $fileNameInfo = pathinfo($this->fileName);

        $this->nameOnly = $fileNameInfo['filename'];

        $this->extention = strtolower($fileNameInfo['extension']);

        $this->mimeType = $this->file['type'];

        $this->tempFile = $this->file['tmp_name'];

        $this->size     = $this->file['size'];
    }


    /**
     * Determine if the file is uploaded 
     * 
     * @return bool
     */
    public function exists()
    {
        return ! empty($this->file);
    }


    /**
     * Get File name
     * 
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }


    /**
     * Get File name without extention
     * 
     * @return string
     */
    public function getNameOnly()
    {
        return $this->nameOnly;
    }


    /**
     * Get  extention
     * 
     * @return string
     */
    public function getExtention()
    {
        return $this->extention;
    }


    /**
     * Get File mime type
     * 
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }


    /**
     * Determine whether the uploaded file is image
     * 
     * @return bool
     */
    public function isImage()
    {
        return strpos($this->mimeType, 'image/') == 0 &&
               in_array($this->extention, $this->allowedImageExtentions);
           
    }


    /**
     * Move the uploaded file to the given destination " target "
     * 
     * @param string $target
     * @param string $newFileName
     * @return string
     */
    public function moveTo($target, $newFileName = null)
    {
        $fileName = $newFileName ?: sha1(mt_rand()) . '_' . sha1(mt_rand());

        $fileName .= '.' . $this->extention;

        if(! is_dir($target)){
            mkdir($target, 0777, true);
        }

        $uploadedFilePath = rtrim($target, '/') . '/' . $fileName;

        move_uploaded_file($this->tempFile, $uploadedFilePath);

        return $fileName;
    }
}