<?php
 namespace backend\models;
 use Yii;
 use yii\base\Model;
 
 class Upload extends Model{
    public $files;
    public $cpeople;
    public $interval;
    public $recipient;

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => false,'checkExtensionByMimeType'=>false],
        ];
    }
    
    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->imageFile->saveAs('uploads/'.date('Y',time()).'/'.date('m',time()).'/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
 } 