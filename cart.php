<?
session_start();

/*
 * [[Корзина товаров shopingCart]]
 * @author KKY
 *         
 * @$obj = new shopingCart('nameSession')       [[nameSession имя сессии для корзины]]
 * 
 * @method addCart ($id, $count, $param)        [[Добавление товара в корзину]]
 * @param  integer [$id]                        [[id товара]]
 * @param  integer [$count]                     [[Колличество товара : по умолчанию 1]]
 * @param  array [$param]                       [[Доп. параметры : не обязательный параметр]]
 * @return integer [1]                          [[товар есть в корзине]]
 * @return integer [2]                          [[добавлен новый товар]]
 *                                                         
 * @method removeCart_id($id)                   [[Удаление товара по id]]
 * 
 * @method removeCart()                         [[Очистить всю корзину]]
 * 
 * @method getCart()                            [[Получить всю корзину]]
 * @return array                                [[возвращает корзину в виде массива]]
 *                                                                     
 * Examles
 * $obj = new shopingCart('shopingCart');
 * @$obj->addCart (25);                                           // Добавлен 1 товар в корзину $id=25
 * $$obj->addCart(10, 2, array('title'=>'name', 'money' => 550)); // Добавлено 2 товара с доп.параметрами
 */

class shopingCart {
    
    public $cart_tovar;
    public $name_session;
    
    function __construct($name_session){
        $this->name_session = $name_session;
        $this->cart_tovar = isset($_SESSION[$name_session]) ? $_SESSION[$name_session] : array();
    }
    function addCart ($id, $count = 1, $param = array()){
        
        foreach ($this->cart_tovar as $key => $array){
            if($array['id'] == $id){
                $this->cart_tovar[$key]['count'] = $count;
                $this->cart_tovar[$key] = array_merge($this->cart_tovar[$key], $param);
                return 1;
            }
        }
        $addCartTMP = array('id' => $id, 'count' => $count);
        $this->cart_tovar[] = array_merge($addCartTMP, $param);
        return 2;
    }
    function issetSession($name_session){
        if(isset($_SESSION[$name_session])){
            return $_SESSION[$name_session];
        } else {
            return array();
        }
    }
    function removeCart_id ($id){
        foreach ($this->cart_tovar as $key => $array){
            if($array['id'] == $id){
                unset($this->cart_tovar[$key]);
                return true;
            }
        }
    }
    function removeCart (){
        $this->cart_tovar = array();
        return true;
    }
    function getCart () {
        return $this->cart_tovar;
    }
    function getCountCart () {
        return count($this->cart_tovar);
    }
    // по завершению сохраняем массив в сессию сессию
    function __destruct () {
        $_SESSION[$this->name_session] = $this->cart_tovar;
    }
}