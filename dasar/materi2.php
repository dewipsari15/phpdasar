<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- PHP OOP -->
    <?php
        class Fruit {
            // Properties
            public $name;
            public $color;

            // Methods
            function set_name($name) {
                $this->name = $name;
            }
            function get_name() {
                return $this->name;
            }
        }

        $apple = new Fruit();
        $banana = new Fruit();
        $apple->set_name('Apple');
        $banana->set_name('Banana');

        echo $apple->get_name();
        echo "<br>";
        echo $banana->get_name();
    ?>
    <br>

    <!-- CONSTRUCTOR -->
    <?php
    class komputer
    {
        public $prosesor;
        public $memory;
        public $ram;

        public function __construct($prosesor = "prosesor", $memory = "memory", $ram = "ram")
        {
            $this->prosesor = $prosesor;
            $this->memory = $memory;
            $this->ram = $ram;
        }

        public function getData()
        {
            return "$this->prosesor | $this->memory | $this->ram";
        }
    }
    $komputer1 = new komputer("core i7", "255 GB", "8 GB");
    $komputer2 = new komputer("core i9", "50 GB");
    echo "Spek komputer sekolah : " . $komputer1->getData();
    echo "<br> ";
    echo "Spek komputer rumah : " . $komputer2->getData();
    ?>

    <!-- DESTRUCTOR -->
    <?php
        class product {
            public $ram;

            function __construct($ram = "RAM") {
                $this->ram = $ram;
            }
            function __destruct() {
                echo "{$this->ram}.";
            }
        }

        $komputer1 = new product("240 GB");
    ?>
</body>
</html>