<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?

abstract Class plane
{
    public $name;
    public $speed;

    public $flight;

    public function __construct($name, $speed)
    {
        $this->flight = false;
        $this->name = $name;
        $this->speed = $speed;        
    }

    public function takeoff()
    {      
        $this->$flight = true; 
        echo $this->name . "Взлетел";

    }

    public function landing()
    {
        $this->$flight = false;
        echo $this->name . "Выполнил посадку";
    }

    public function status()
    {
        return($this->flight) ? "В небе":"На земле";
    }

    public function namePlane()
    {
        return ($this->name);
    }
    
}    

    Class Mig extends plane 
    {

        function attack()
        {
            $this->attack = true;
            echo $this->name . "атакует";
        }
    }

    Class Ty_154 extends plane
    {

    }

    Class airport 
    {
        public $place;
        public $planes = array();
        
        

        public function __construct()
        {
            $this->place=$place;
        }

        public function acceptance_plane(plane $plane)
        {
            if($this->planes < $this->place)
            {
                $this->planes[]=$planes;
                echo $planes->status()." ".$planes->namePlane()."Принят в аэропорт";
            }
            else
            {
                echo "В аэропорту нет мест";
            }
        }

        public function flew_away(plane $planes)
        {
            $position = array_search($planes, $this->planes);
            
            if($position !== false){
                unset($this->planes, $position);
                echo $planes->status()." ".$planes->namePlane()."покинул аэропорт";
            }
            else
            {
                echo $planes->status()."стоит на стоянке";
            }
        }

        public function parking(plane $planes)
        {
            $position = array_search($planes, $this->planes);
            if($position !== false)
            {
                unset($this->planes, $position);
                echo $planes->status()." ".$plane->namePlane()."Находится на стоянке";
            }
            else
            {
                echo $planes->namePlane()."Не находится в аэропорту";
            }
        }

        public function ready_for_takeoff(plane $planes)
        {
            echo $planes->namePlane()."Готов к взлету";
        }

        public function under_repair(plane $planes)
        {
            $position = array_search($planes, $this->planes);
            if($position !== false)
            {
                unset($this->planes, $position);
                echo $planes->status()." ".$plane->namePlane()."Не сломан";
            }
            else
            {
                echo $planes->namePlane()."На ремонте";
            }
        }

        public function decision_making(plane $planes)
        {
            echo $planes->namePlane()."принят в аэропорт";
        }
    }
    

    $airport = new airport(2);
    $Mig = new Mig("Mig", 3000);
    $Ty_154 = new Ty_154("Ty_154", 1500);          //Ассоциация

    $planes = [$Mig, $Ty_154];
    $airport = new airport(2);
    foreach ($planes as $p)
    {
        $airport -> acceptance_plane($p);
        echo "<br>";
    }                                                   //Агрегация

    $airport = new airport(2);
    $airport -> parking(new Mig("Mig", 3000));
    echo "<br>";
    $airport -> parking(new Ty_154("Ty_154", 1500));    //Композиция


?>

</body>
</html>