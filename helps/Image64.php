<?php 

namespace app\helps;

use Yii;
use yii\web\UploadedFile;


class Image64 {
    
    public function imgBase64($model, $atributo)
    {
        if (empty($model->$atributo)) {
            //Path da pasta para salvar a imagem.
            $uploadPath = Yii::getAlias('@webroot/files');
            
            //Instance do atributo.
            $model->$atributo = UploadedFile::getInstance($model, $atributo);
            
            //Gera um hash para concatenar com o nome rel.
            $key = Yii::$app->getSecurity()->generateRandomString();
            //Novo nome da imagem.
            $nomeFotoSErvidor = $key . $model->$atributo;
            //Path para salvar a imagem.
            $urlSalveImg = $uploadPath . '/' . $nomeFotoSErvidor;
            //Salva a imagem.
            $model->$atributo->saveAs($urlSalveImg, false);
            //Lê todo o conteúdo de um arquivo para uma string
            $dataImg = file_get_contents($urlSalveImg);
            //Converte para base64.
            $fotoServidor64 = base64_encode($dataImg);
            //Exclui a imagem.
            unlink($urlSalveImg);
            
            return $fotoServidor64;
        } else {
            return false;
        }
    }


}