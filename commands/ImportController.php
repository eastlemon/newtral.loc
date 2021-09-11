<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Producer;
use app\models\Store;
use app\models\Part;
use app\models\PartPicture;
use app\models\Offer;

class ImportController extends Controller
{
    public function actionDo1c()
    {
        $offers = file_get_contents('web/uploads/1c/offers0_1.xml');
        $import = file_get_contents('web/uploads/1c/import0_1.xml');
        
        $offers = simplexml_load_string($offers);
        $import = simplexml_load_string($import);
        
        foreach ($offers->ПакетПредложений->Склады->Склад as $item) {
            $stores[(string) $item->Ид] = [
                'name' => $item->Наименование,
            ];
        }
        //var_dump($stores);
        
        foreach ($offers->ПакетПредложений->ТипыЦен->ТипЦены as $item) {
            $price_types[(string) $item->Ид] = [
                'currency' => $item->Валюта,
                'tax' => $item->Налог->Наименование,
                'enabled' => $item->Налог->УчтеноВСумме,
                'excise' => $item->Налог->Акциз,
            ];
        }
        //var_dump($price_types);

        foreach ($offers->ПакетПредложений->Предложения->Предложение as $item) {
            $prices = [];
            foreach ($item->Цены->Цена as $p) {
                $prices[(string) $p->ИдТипаЦены] = $p->ЦенаЗаЕдиницу;
            }
            
            $amounts = [];
            foreach ($item->Склад as $s) {
                $amounts[(string) $s->attributes()->ИдСклада] = $s->attributes()->КоличествоНаСкладе; 
            }

            $_offers[(string) $item->Ид] = [
                'total' => $item->Количество,
                'prices' => $prices,
                'amounts' => $amounts,
            ];
        }
        //var_dump($_offers);

        foreach ($import->Каталог->Товары->Товар as $item) {
            $product = new Part();
            $product->name = (string) $item->Изготовитель->Наименование;
            $product->articul = (string) $item->Артикул;
            $product->description = (string) $item->Описание;
            $product->producer_id = $this->get_producer_by_name($item->Изготовитель->Наименование);
            $product->save(false);

            /*if ($_pp = $item->Картинка) {
                foreach ($_pp as $p) {
                    $pp = new PartPicture();
                    $pp->picture = $item->Ид . '.jpg';
                    $pp->product_id = $product->id;
                    $pp->save(false);
                }
            }*/

            if ($_offer = $_offers[(string) $item->Ид]) {
                if (is_array($_offer['prices'])) foreach ($_offer['prices'] as $pkey => $price) {
                    if (is_array($_offer['amounts'])) foreach ($_offer['amounts'] as $akey => $amount) {
                        if ($price && $amount) {
                            $offer = new Offer();
                            $offer->amount = $amount;
                            $offer->price = $price;
                            $offer->part_id = $product->id;
                            $offer->store_id = $this->get_store_by_name((string) $stores[$akey]['name']);
                            $offer->save(false);
                        }
                    }
                }
            }
        }

        return ExitCode::OK;
    }

    public function get_producer_by_name($name)
    {
        $p = Producer::find()->where(['name' => trim($name)])->one();
        return $p->id ?: 729;
    }

    public function get_store_by_name($name)
    {
        $p = Store::find()->where(['name' => trim($name)])->one();
        return $p->id ?: 2;
    }
}
