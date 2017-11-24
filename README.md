# cart-tovar-php

[[Корзина товаров shopingCart]]
 
$obj = new shopingCart('nameSession')       [[nameSession имя сессии для корзины]]
 
method addCart ($id, $count, $param)        [[Добавление товара в корзину]]
param  integer [$id]                        [[id товара]]
param  integer [$count]                     [[Колличество товара : по умолчанию 1]]
param  array [$param]                       [[Доп. параметры : не обязательный параметр]]
return integer [1]                          [[товар есть в корзине]]
return integer [2]                          [[добавлен новый товар]]
                                                       
method removeCart_id($id)                   [[Удаление товара по id]]
method removeCart()                         [[Очистить всю корзину]]
method getCart()                            [[Получить всю корзину]]
return array                                [[возвращает корзину в виде массива]]
 
# Examle
$obj = new shopingCart('shopingCart');
@$obj->addCart (25);                                           // Добавлен 1 товар в корзину $id=25
$$obj->addCart(10, 2, array('title'=>'name', 'money' => 550)); // Добавлено 2 товара с доп.параметрами
