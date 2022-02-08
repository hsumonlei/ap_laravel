class Drinks{
    var $name = 'shark';
    var $price = 50;

    function setPrice($par){
        $this->price= $par;
    }

    function getPrice(){
        echo $this->price."</br>";
    }

    function setName($par){
        $this->name= $par;
    }

    function getName(){
        echo $this->name ."</br>";
    }

    //constant
    const constant1 = "hello world from constant";

    function printConstant()
    {
        echo self:: constant1."<br>";
    }
}

$coke = new Drinks;
