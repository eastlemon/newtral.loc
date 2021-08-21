<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Producer;
use app\models\Product;
use app\models\Productpicture;

class ImportController extends Controller
{
    public function actionImport()
    {
        $xmlstring = file_get_contents('web/uploads/1c/import0_1.xml');
        $oxml = simplexml_load_string($xmlstring);
        //$json = json_encode($oxml);
        //$array = json_decode($json, TRUE);
        
        //var_dump($oxml->Каталог->Товары);

        //if (isset($oxml->Каталог->Товары->Товар)) echo '1';
        //else echo '0';

        foreach ($oxml->Каталог->Товары->Товар as $item) {
            $producer = $item->Изготовитель->Наименование;
            
            $product = new Product();
            $product->name = $item->Наименование;
            $product->articule = $item->Артикул;
            $product->description = $item->Описание;
            $product->producer_id = $this->get_producer_by_name($producer);
            $product->save(false);

            if ($_pp = $item->Картинка) {
                foreach ($_pp as $p) {
                    $pp = new Productpicture();
                    $pp->picture = $item->Ид . '.jpg';
                    $pp->product_id = $product->id;
                    $pp->save(false);
                }
            }
        }

        /*foreach ($aproducers as $i => $producer) {
            echo $producer . '<br>';
            $p = new Producer();
            $p->name = trim($producer);
            $p->save();
        }*/

        return ExitCode::OK;
    }

    public function get_producer_by_name($name)
    {
        $p = Producer::find()->where(['name' => trim($name)])->one();
        return $p->id;
    }
}
