<?php 

interface Lawnmower {
    public function cut_grass();
}
 
// does not implement 
class CrappyMowersInc  {
    public function leak_oil() {
        return 'leaking oil';
    }
}
// $mower = new CrappyMowersInc; 
// var_dump($mower->leak_oil()); // leaking oil
 
class Kubota implements Lawnmower {
    public function cut_grass(){
        return 'cutting major grass';
    }
}
// $mower = new Kubota;
// var_dump($mower->cut_grass()); // cutting major grass
 
class JohnDeere implements Lawnmower {
    public function cut_grass(){
        return 'cutting grass like a champion';
    }
}
// $mower = new JohnDeere;
// var_dump($mower->cut_grass()); // cutting grass like a champion


class Landscaper
{
    protected $mower;
    protected $customer;
    
    public function __construct(Lawnmower $mower, $customer = ''){
        $this->mower = $mower;
        $this->customer = $customer;
    }
    
    public function help_customer(){
        return 'Finished mowing '. $this->customer .' lawn';
    }
}
 
$landscaper = new Landscaper(new JohnDeere, 'The Johnsons');
echo $landscaper->help_customer(). '<br>';
// string 'Finished mowing The Johnsons lawn' (length=33)
 
$landscaper = new Landscaper(new JohnDeere, 'The Thompsons');
echo $landscaper->help_customer() . '<br>';
// string 'Finished mowing The Thompsons lawn' (length=34)

$landscaper = new Landscaper(new Kubota, 'The Henrys');
echo $landscaper->help_customer() . '<br>';
// Catchable fatal error: Argument 1 passed to Landscaper::__construct() must be an instance of JohnDeere, instance of Kubota given

$a = '1';
$b = &$a;
$b = '2$b';

echo $b . '<br>';
echo '0xFF' == 255 ? 'yes' : 'no';
?>
