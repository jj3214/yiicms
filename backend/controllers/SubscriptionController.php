<?php

namespace backend\controllers;

use Yii;
use backend\models\Subscription;
use backend\models\Upload;
use backend\models\Uploade;
use backend\models\Log;
use backend\models\SubscriptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * SubscriptionController implements the CRUD actions for Subscription model.
 */
class SubscriptionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subscription models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubscriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subscription model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subscription model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subscription();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Subscription model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subscription model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subscription model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Subscription the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subscription::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionTest(){
        $model = new Upload();
        if (Yii::$app->request->isPost) {
            $model->files = UploadedFile::getInstance($model, 'files');
            $ext = strrchr($model->files,'.');
            $files = time().$ext;
            $path = 'uploads/email/'.date('Y',time()).'/'.date('m',time()).'/';
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            if ($model->validate()) {
                $model->files->saveAs($path . $files);
                // 文件上传成功
                $pathname = $path . $files;
                $arr = Yii::$app->request->post();
                $recipient = $arr['Upload']['recipient'];
                $this->getTest($pathname,$recipient);

            }
                
        
        }
        return $this->render('test', [
            'model' => $model,
        ]);
    }
    public function actionMail(){
        $model = new Upload();
        if (Yii::$app->request->isPost) {
            $model->files = UploadedFile::getInstance($model, 'files');
            $ext = strrchr($model->files,'.');
            $files = time().$ext;
            $path = 'uploads/email/'.date('Y',time()).'/'.date('m',time()).'/';
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            if ($model->validate()) {
                $model->files->saveAs($path . $files);
                // 文件上传成功
                $pathname = $path . $files;
                $rows = (new \yii\db\Query())
                    ->select(['email'])
                    ->from('t_subscription')
                    ->where(['country' => 'China'])
                     ->limit(4)
                    ->all();
                $arr = Yii::$app->request->post();
                $cpeople = $arr['Upload']['cpeople'];
                $interval = $arr['Upload']['interval'];
                $this->getAllData($pathname,$rows,$cpeople,$interval);

            }
                
        
        }
        return $this->render('mail', [
            'model' => $model,
        ]);
    }
    public function actionMaile(){
        $model = new Uploade();
        if (Yii::$app->request->isPost) {
            $model->filese = UploadedFile::getInstance($model, 'filese');
            $ext = strrchr($model->filese,'.');
            $files = time().$ext;
            $path = 'uploads/email/'.date('Y',time()).'/'.date('m',time()).'/';
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            if ($model->validate()) {
                $model->filese->saveAs($path . $files);
                // 文件上传成功
                $pathname = $path . $files;
                // $rows = (new \yii\db\Query())
                //     ->select(['email'])
                //     ->from('t_subscription')
                //     ->where(['!=','country','China'])
                //      ->limit(4)
                //     ->all();
                $rows = array('yu0784@sina.com','1538634973@qq.com','360mito@sina.com','1145452959@qq.com','1933833409@qq.com','1823269423@qq.com','1724940950@qq.com','Fanjq_98@126.com','fanjinqing89@163.com','1604304063@qq.com','2325515561@qq.com','18731322936@163.com','2537556780@qq.com','wangjuan2019bj@163.com','937218691@qq.com','yu078403@sina.com','zl931185073@qq.com','3173409597@qq.com','yu078401@sina.com','yu078402@sina.com','1255725377@qq.com','1036740724@qq.com','1337263016@qq.com','286770248@qq.com','1028613040@qq.com','1971261167@qq.com','1325683051@qq.com','1270061204@qq.com','1398997970@qq.com','2358243671@qq.com','410037827@qq.com'
                  );
                $arr = Yii::$app->request->post();
                $cpeople = $arr['Uploade']['cpeople'];
                $interval = $arr['Uploade']['interval'];
                $this->getAllData($pathname,$rows,$cpeople,$interval);

            }
                
        
        }
        return $this->render('maile', [
            'model' => $model,
        ]);
    }
    protected function getTest($pathname,$list){
        error_reporting(E_ALL ^ (E_WARNING|E_NOTICE));

        if (!($content = fread(fopen($pathname, 'rb'), filesize($pathname))))

          die('File not found ('.$pathname.')');

        //标题内容

        $pattern="/Subject: (.*?)\n/ims";

        preg_match($pattern,$content,$subject_results);

        $subject = iconv('GB2312', 'UTF-8', $subject_results[1]);

        // echo "标题：".$subject;

        //发件人：

        $pattern="/From: .*?<(.*?)>/ims";

        preg_match($pattern,$content,$from_results);

        $from = $from_results[1];

        // echo "\n\r";

        // echo "发件人：".$from;

        //收件人：

        $pattern="/To:(.*?):/ims";

        preg_match($pattern,$content,$to_results);

        $pattern="/<(.*?)>/ims";

        preg_match_all($pattern,$to_results[1],$to_results2);

        if(count($to_results2[1])>0){

          $to = $to_results2[1];

        }else{

          $pattern="/To:(.*?)\n/ims";

          preg_match($pattern,$content,$to_results);

          $to = $to_results[1];

        }

        // echo "\n\r";

        // echo "收件人：";

        // print_r($to);

        // echo "\n\r";

        //正文内容

        $pattern = "/Content-Type: multipart\/alternative;.*?boundary=\"(.*?)\"/ims";

        preg_match($pattern,$content,$results);

        if($results[1]!=""){

          $seperator = "--".$results[1];

        }else{

          die("boundary匹配失败");

        }

        $spcontent = explode($seperator, $content);

        $items = array();

        $keyid = 0;

        $email_front_content_array = array();

        foreach($spcontent as $spkey=>$item) {

          //匹配header编码等信息

          $pattern = "/Content-Type: ([^;]*?);.*?charset=(.*?)\nContent-Transfer-Encoding: (.*?)\n/ims";

          preg_match($pattern,$item,$item_results);

          if(count($item_results)==4){

            $Content_code = str_replace($item_results[0],"",$item);

            $item_results[4] = $Content_code;

            if(trim($item_results[3])=="base64"){

              $item_results[5] = base64_decode($item_results[4]);

            }

            if(trim($item_results[3])=="quoted-printable"){

              $item_results[5] = quoted_printable_decode($item_results[4]);

            }

            $item_results[5] = mb_convert_encoding($item_results[5], 'UTF-8', trim($item_results[2]));

            //echo $item_results[5];exit;

            $email_front_content_array[] = $item_results;

          }

        }

        foreach ($email_front_content_array as $email_front_content_each_key=>$email_front_content_each_value){

          if($email_front_content_each_value[1]=='text/html'){

            $content_html = $email_front_content_each_value[5];

            break;

          }else{
            $content_html = $email_front_content_each_value[5];

          }

        }

        // echo "内容：";

        // echo "\n\r";

        // // print_r($content_html) ;

        // echo "\n\r";
        // echo "111";
        date_default_timezone_set(PRC);
        set_time_limit(0);
        $mail=Yii::$app->mailer->compose() 
            //和上面的from字段相对应  可以只写一个  
            ->setTo($list)
            ->setSubject($subject)  //邮件标题
            // ->setTextBody($Emailcon);  //发送纯文字
            ->setHtmlBody($content_html); //发布可以带html标签的文本
            $static=$mail->send();
            if($static==1){
                $log = new Log();
                $log->email = $list;
                $log->issuccess = '测试发送成功';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
            }else{
                $log = new Log();
                $log->email = $list;
                $log->issuccess = '测试发送失败';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
                $mail=Yii::$app->mailer->compose() 
                //和上面的from字段相对应  可以只写一个  
                ->setTo('1145452959@qq.com')
                ->setSubject('测试邮件发送失败')  //邮件标题
                // ->setTextBody($Emailcon);  //发送纯文字
                ->setHtmlBody('测试有邮件发送失败了'); //发布可以带html标签的文本
                $static=$mail->send();
            }
        
       

        
    }
    protected function getAllData($pathname,$list,$cpeople,$interval){
        error_reporting(E_ALL ^ (E_WARNING|E_NOTICE));

        if (!($content = fread(fopen($pathname, 'rb'), filesize($pathname))))

          die('File not found ('.$pathname.')');

        //标题内容

        $pattern="/Subject: (.*?)\n/ims";

        preg_match($pattern,$content,$subject_results);

        $subject = iconv('GB2312', 'UTF-8', $subject_results[1]);

        // echo "标题：".$subject;

        //发件人：

        $pattern="/From: .*?<(.*?)>/ims";

        preg_match($pattern,$content,$from_results);

        $from = $from_results[1];

        // echo "\n\r";

        // echo "发件人：".$from;

        //收件人：

        $pattern="/To:(.*?):/ims";

        preg_match($pattern,$content,$to_results);

        $pattern="/<(.*?)>/ims";

        preg_match_all($pattern,$to_results[1],$to_results2);

        if(count($to_results2[1])>0){

          $to = $to_results2[1];

        }else{

          $pattern="/To:(.*?)\n/ims";

          preg_match($pattern,$content,$to_results);

          $to = $to_results[1];

        }

        // echo "\n\r";

        // echo "收件人：";

        // print_r($to);

        // echo "\n\r";

        //正文内容

        $pattern = "/Content-Type: multipart\/alternative;.*?boundary=\"(.*?)\"/ims";

        preg_match($pattern,$content,$results);

        if($results[1]!=""){

          $seperator = "--".$results[1];

        }else{

          die("boundary匹配失败");

        }

        $spcontent = explode($seperator, $content);

        $items = array();

        $keyid = 0;

        $email_front_content_array = array();

        foreach($spcontent as $spkey=>$item) {

          //匹配header编码等信息

          $pattern = "/Content-Type: ([^;]*?);.*?charset=(.*?)\nContent-Transfer-Encoding: (.*?)\n/ims";

          preg_match($pattern,$item,$item_results);

          if(count($item_results)==4){

            $Content_code = str_replace($item_results[0],"",$item);

            $item_results[4] = $Content_code;

            if(trim($item_results[3])=="base64"){

              $item_results[5] = base64_decode($item_results[4]);

            }

            if(trim($item_results[3])=="quoted-printable"){

              $item_results[5] = quoted_printable_decode($item_results[4]);

            }

            $item_results[5] = mb_convert_encoding($item_results[5], 'UTF-8', trim($item_results[2]));

            //echo $item_results[5];exit;

            $email_front_content_array[] = $item_results;

          }

        }

        foreach ($email_front_content_array as $email_front_content_each_key=>$email_front_content_each_value){

          if($email_front_content_each_value[1]=='text/html'){

            $content_html = $email_front_content_each_value[5];

            break;

          }else{
            $content_html = $email_front_content_each_value[5];

          }

        }

        // echo "内容：";

        // echo "\n\r";

        // // print_r($content_html) ;

        // echo "\n\r";
        // echo "111";
        date_default_timezone_set(PRC);
        set_time_limit(0);        
        $n = 98;
        Yii::$app->MySendMail->setServer("smtp.cstnet.cn", "cropwatch@radi.ac.cn", "nongye#2014"); 
            //设置smtp服务器
        Yii::$app->MySendMail->setFrom("cropwatch@radi.ac.cn"); //设置发件人
        for ($i=0;$i<=80;$i++) {
          if($i>=$n){
            sleep($interval);
            $mail=Yii::$app->mailer->compose() 
            //和上面的from字段相对应  可以只写一个  
            ->setTo($list[$i])
            ->setCc($cpeople)//设置抄送人
            ->setSubject($subject)  //邮件标题
            // ->setTextBody($Emailcon);  //发送纯文字
            ->setHtmlBody($content_html); //发布可以带html标签的文本
            $static=$mail->send();
            if($static==1){
                $log = new Log();
                $log->email = $list[$i];
                $log->issuccess = '发送成功';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
            }else{
                $log = new Log();
                $log->email = $list[$i];
                $log->issuccess = '发送失败';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
                $mail=Yii::$app->mailer->compose() 
                //和上面的from字段相对应  可以只写一个  
                ->setTo('1145452959@qq.com')
                ->setSubject('邮件发送失败')  //邮件标题
                // ->setTextBody($Emailcon);  //发送纯文字
                ->setHtmlBody('有邮件发送失败了'); //发布可以带html标签的文本
                $static=$mail->send();
            }
            $n = $n +98;
          }
          else{
            
            // Yii::$app->MySendMail->setReceiver($list[$i]); //设置收件人，多个收件人，调用多次
            // Yii::$app->MySendMail->setCc("1145452959@qq.com"); //设置抄送，多个抄送，调用多次
            // // Yii::$app->MySendMail->setBcc(); //设置秘密抄送，多个秘密抄送，调用多次
            // Yii::$app->MySendMail->setMailInfo("test", "<b>test</b>"); //设置邮件主题、内容
            // Yii::$app->MySendMail->sendMail(); //发送
            $mail=Yii::$app->mailer->compose() 
            //和上面的from字段相对应  可以只写一个  
            ->setTo($list[$i])
            // ->setBcc($arr)  //发送给谁
            ->setCc($cpeople)//设置抄送人
            ->setSubject($subject)  //邮件标题
            // ->setTextBody($Emailcon);  //发送纯文字
            ->setHtmlBody($content_html); //发布可以带html标签的文本
            $static=$mail->send();
            if($static==1){
                $log = new Log();
                $log->email = $list[$i];
                $log->issuccess = '发送成功';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
            }else{
                $log = new Log();
                $log->email = $list[$i];
                $log->issuccess = '发送失败';
                $log->addtime = date('Y-m-d H:i:s');
                $log->save();
                $mail=Yii::$app->mailer->compose() 
                //和上面的from字段相对应  可以只写一个  
                ->setTo('1145452959@qq.com')
                ->setSubject('邮件发送失败')  //邮件标题
                // ->setTextBody($Emailcon);  //发送纯文字
                ->setHtmlBody('有邮件发送失败了'); //发布可以带html标签的文本
                $static=$mail->send();
            
            }
            sleep($interval);
          }
          
        }
       

        
    }
    

    protected function getdecodevalue($content){

      $pattern="/=\?GB2312\?B\?(.*?)\?=|=\?GBK\?B\?(.*?)\?=|=\?UTF-8\?B\?(.*?)\?=/ims";

      preg_match($pattern,$content,$subject_results);

      if($subject_results[1]!=""){

        $subject = base64_decode($subject_results[1]);

        $charset = "GB2312";

      }

      elseif($subject_results[2]!=""){

        $subject = base64_decode($subject_results[2]);

        $charset = "GBK";

      }

      elseif($subject_results[3]!=""){

        $subject = base64_decode($subject_results[3]);

        $charset = "UTF-8";

      }else{

        $subject = $content;

        $charset = "";

      }

      if($charset!=""){

        $subject = mb_convert_encoding($subject, 'UTF-8', $charset);

      }

      return $subject;

    }

}
