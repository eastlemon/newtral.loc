<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Producer;
use app\models\Store;
use app\models\Part;
use app\models\Offer;
use app\models\Category;
use app\models\Node;
use app\models\Unit;
use app\models\NodePart;

class ImportController extends Controller
{
    public function actionDo1c()
    {
        $offers = file_get_contents('web/uploads/1c/offers0_1.xml');
        $import = file_get_contents('web/uploads/1c/import0_1.xml');
        
        $offers = simplexml_load_string($offers);
        $import = simplexml_load_string($import);
        
        /*foreach ($offers->ПакетПредложений->Склады->Склад as $item) {
            $stores[(string) $item->Ид] = [
                'name' => $item->Наименование,
            ];
        }*/
        //var_dump($stores);
        
        /*foreach ($offers->ПакетПредложений->ТипыЦен->ТипЦены as $item) {
            $price_types[(string) $item->Ид] = [
                'currency' => $item->Валюта,
                'tax' => $item->Налог->Наименование,
                'enabled' => $item->Налог->УчтеноВСумме,
                'excise' => $item->Налог->Акциз,
            ];
        }*/
        //var_dump($price_types);

        foreach ($offers->ПакетПредложений->Предложения->Предложение as $item) {
            /*$prices = [];
            foreach ($item->Цены->Цена as $p) {
                $prices[(string) $p->ИдТипаЦены] = $p->ЦенаЗаЕдиницу;
            }*/
            
            /*$amounts = [];
            foreach ($item->Склад as $s) {
                $amounts[(string) $s->attributes()->ИдСклада] = $s->attributes()->КоличествоНаСкладе; 
            }*/

            $_offers[(string) $item->Ид] = [
                //'total' => (string) $item->Количество,
                //'prices' => $prices,
                //'amounts' => $amounts,
                'chelnsk' => [
                    'count' => (string) $item->Склад[2]->attributes()->КоличествоНаСкладе,
                    'price' => (string) $item->Цены->Цена[1]->ЦенаЗаЕдиницу,
                ],
                'usinsk' => [
                    'count' => (string) $item->Склад[0]->attributes()->КоличествоНаСкладе,
                    'price' => (string) $item->Цены->Цена[0]->ЦенаЗаЕдиницу,
                ],
            ];
        }
        //var_dump($_offers);

        foreach ($import->Каталог->Товары->Товар as $item) {
            $product = new Part();
            $product->name = (string) $item->Наименование;
            $product->articul = (string) $item->Артикул;
            $product->description = (string) $item->Описание;
            $product->producer_id = $this->get_producer_by_name($item->Изготовитель->Наименование);
            if ($product->save()) {
                var_dump($product->name);

                $filename = 'web/uploads/' . (string) $item->Ид . '.jpg';
                if (file_exists($filename)) {
                    Yii::$app->db->createCommand()->insert('part_picture', [
                        'picture' => (string) $item->Ид . '.jpg',
                        'part_id' => $product->id,
                    ])->execute();
                }
    
                if ($_offer = $_offers[(string) $item->Ид]) {
                    $offer = new Offer();
                    $offer->amount = $_offer['chelnsk']['count'];
                    $offer->price = $_offer['chelnsk']['price'];
                    $offer->part_id = $product->id;
                    $offer->store_id = 2;
                    $offer->save();
                    
                    $offer = new Offer();
                    $offer->amount = $_offer['usinsk']['count'];
                    $offer->price = $_offer['usinsk']['price'];
                    $offer->part_id = $product->id;
                    $offer->store_id = 3;
                    $offer->save();
                }
            }
        }
    }

    public function get_producer_by_name($name)
    {
        $p = Producer::find()->where(['name' => trim($name)])->one();
        return $p->id ?: 729;
    }

    public function get_store_by_name($name)
    {
        $s = Store::find()->where(['name' => trim($name)])->one();
        return $s->id ?: 4;
    }

    public function get_category_by_name($name)
    {
        $c = Category::find()->where(['name' => trim($name)])->one();
        return $c->id ?: 47;
    }

    public function get_part_by_name($name)
    {
        $p = Part::find()->where(['name' => trim($name)])->one();
        return $p->id;
    }

    public function get_node_by_name($name)
    {
        $n = Node::find()->where(['name' => trim($name)])->one();
        return $n->id;
    }
}
