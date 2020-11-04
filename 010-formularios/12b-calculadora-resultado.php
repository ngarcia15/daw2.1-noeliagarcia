<?php
if (isset($_REQUEST["calcular"])){
    $numero1=$_REQUEST["numero1"];
    $numero2=$_REQUEST["numero2"];
    $operaciones=$_REQUEST["operacion"];

}if ($operaciones  == "sum"){
     $resultado= $numero1 + $numero2;
}elseif ($operaciones == "res"){
    $resultado= $numero1 - $numero2;
}elseif ($operaciones == "mul"){
    $resultado= $numero1 * $numero2;

}elseif ($operaciones == "div"){
    if($numero2==0){
        echo "no se puede dividir entre 0";
    }else{
        $resultado= $numero1 / $numero2;


    }
}
?>
 <p>el resultado es <?=$resultado?> </p>






