<?php

class Sort{
    public $size = 0;
    public $arr;
    public $unitk = 0;

    function __construct()
    {
        $this->size = 0;
        $this->unitk = 0;
    }

    function setSize($s)
    {
        $this->size = $s;
    }

    function setArray()
    {
        if(isset($_POST["array"]))
            $this->arr = explode(' ',$_POST["array"]);

        foreach($this->arr as $a)
        {
            $a = (int)$a;
        }

        $this->size = sizeof($this->arr);
    }

    function getSize()
    {
        return $this->size;
    }

    function getUnitK()
    {
        return $this->unitk;
    }

    function getArray()
    {
        return $this->arr;
    }

    function printArray()
    {
        echo '<br>';
        foreach($this->arr as $a)
        {
            echo $a.' ';
        }
    }

    function bubbleSort()
    {
        $temp = '';
        $isOrder = false;
        $s = $this->size;
        $a = $this->arr;

        for($i=1; $i<$s && !$isOrder; $i++)
        {
            $isOrder = true;

            for($j=0; $j<$s-$i; $j++)
            {
                if($a[$j] > $a[$j+1])
                {
                    $temp = $a[$j];
                    $a[$j] = $a[$j+1];
                    $a[$j+1] = $temp;

                    $isOrder = false;
                }

                $this->unitk++;
            }
        }

        $this->arr = $a;
    }
}

$sort = new Sort;

?>

<h1>Bubble Sort</h1>

<form action="" method="POST">
    Array : <input type="text" name="array" value="<?php if(isset($_POST["Submit"]))echo $_POST["array"]; ?>"><br>
    <input type="submit" name="Submit" value="Sort">
</form>

<?php

if(isset($_POST["Submit"]))
{
    $sort->setArray();
    echo '<br>Before :';
    $sort->printArray();
    $sort->bubbleSort();
    echo '<br><br>After :';
    $sort->printArray();
    echo '<br><br>Unit k : <br>'.$sort->getUnitK();
}

?>

