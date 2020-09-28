<?php
 namespace backend\models;
 use Yii;
 use yii\base\Model;
 
 class Uploade extends Model{
    public $filese;
    public $cpeople;
    public $interval;

    public function rules()
    {
        return [
  
            [['filese'], 'file', 'skipOnEmpty' => false,'checkExtensionByMimeType'=>false],
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