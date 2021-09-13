<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Producer;
use app\models\Store;
use app\models\Part;
use app\models\PartPicture;
use app\models\Offer;
use app\models\Category;
use app\models\Node;
use app\models\Unit;
use app\models\OldPart;
use app\models\OldOffer;
use app\models\OldNode;
use app\models\OldUnit;
use app\models\OldCategory;
use app\models\OldNodePart;
use app\models\NodePart;

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

    public function actionCategories()
    {
        $oldCategories = OldCategory::find()->all();
        foreach ($oldCategories as $oldCategory) {
            $category = new Category();
            $category->name = $oldCategory->name;
            $category->picture = '';
            $category->is_popular = 0;
            $category->parent_id = $this->get_category_by_name($oldCategory->parent->name);
            $category->save(false);
        }
    }

    public function actionUnits()
    {
        $oldUnits = OldUnit::find()->all();
        foreach ($oldUnits as $oldUnit) {
            $unit = new Unit();
            $unit->name = $oldUnit->name;
            $unit->articul = $oldUnit->article;
            $unit->description = $oldUnit->description;
            $unit->category_id = $this->get_category_by_name($oldUnit->oldCategory->name);
            $unit->producer_id = $this->get_producer_by_name($oldNode->oldManufacturer->name);
            $unit->save(false);
        }
    }

    public function actionNodeParts()
    {
        $oldNodeParts = OldNodePart::find()->all();
        foreach ($oldNodeParts as $oldNodePart) {
            $nodeParts = new NodePart();
            $nodeParts->node_id = $this->get_node_by_name($oldNodePart->oldNode->name);
            $nodeParts->part_id = $this->get_part_by_name($oldNodePart->oldPart->name);
            $nodeParts->save(false);

            var_dump($oldNodePart->oldNode->name);
            var_dump($oldNodePart->oldPart->name);
        }
    }

    public function actionNodes()
    {
        $oldNodes = OldNode::find()->all();
        foreach ($oldNodes as $oldNode) {
            $node = new Node();
            $node->name = $oldNode->name;
            $node->articul = $oldNode->article;
            $node->description = $oldNode->description;
            $node->category_id = $this->get_category_by_name($oldNode->oldCategory->name);
            $node->save(false);
        }
    }

    public function actionParts()
    {
        $oldParts = OldPart::find()->all();
        foreach ($oldParts as $oldPart) {
            $part = new Part();
            $part->name = $oldPart->name;
            $part->articul = $oldPart->article;
            $part->description = $oldPart->note;
            $part->producer_id = $this->get_producer_by_name($oldPart->oldManufacturer->name);
            $part->save(false);

            $oldOffers = OldOffer::find()->where(['part_id' => $oldPart->id])->all();
            foreach ($oldOffers as $oldOffer) {
                $offer = new Offer();
                $offer->amount = $oldOffer->count;
                $offer->price = $oldOffer->price;
                $offer->part_id = $part->id;
                $offer->store_id = $this->get_store_by_name($oldOffer->oldStore->name);
                $offer->save(false);
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
