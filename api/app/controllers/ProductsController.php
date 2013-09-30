<?php

class ProductsController extends MageController {

    public function getProducts() {

        $collection = array();

        $products = Mage::getResourceModel('catalog/product_collection');
        $products->addAttributeToSelect('*');
        $products->addAttributeToFilter('visibility', array('neq' => 1));
        $products->addAttributeToFilter('status', 1);
        $products->load();

        foreach ($products as $product) {

            $ids        = array();
            $categoryId = (int) $product->getCategoryIds()[0];
            $type       = Mage::getModel('catalog/category')->load($categoryId);

//            if ($product->getName() !== 'Anashria Womens Premier Leather Sandal') {
//                continue;
//            }

            foreach ($product->getCategoryIds() as $id) {

                array_push($ids, (int) $id);

                // Add any parent IDs as well.
                $category = Mage::getModel('catalog/category')->load($id);

                if ($category->parent_id) {

                    $parentCategory = Mage::getModel('catalog/category')->load($category->parent_id);

                    if ($parentCategory->parent_id) {;
                        array_push($ids, (int) $parentCategory->parent_id);
                    }

                    array_push($ids, (int) $category->parent_id);
                }

            }

            $collection[] = array(
                'id'                => (int) $product->getId(),
                'name'              => trim($product->getName()),
                'ident'             => trim($this->_createIdent($product->getName())),
                'price'             => (float) $product->getPrice(),
                'image'             => $product->getThumbnailUrl(),
                'colour'            => (int) $product->getData('color'),
                'manufacturer'      => (int) $product->getData('manufacturer'),
                'categories'        => array_unique($ids),
                'type'              => $type,
                'specialisation'    => $this->_hasSpecialisationRoute()
            );

        }

        return Response::json($collection);

    }

    private function _hasSpecialisationRoute() {

//        $inflection = new Illuminate\Support\Pluralizer();
//        die(var_dump($inflection->singular('shoes')));

//        foreach (Route::getRoutes() as $route) {
//            var_dump($route->getAction());
////            die();
//        }
//        die(var_dump(Route::getRoutebyname("my_route_name")));
    }

}