<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * Description of EditingController
 *
 * @author user
 */
class EditingController extends AppController {

//put your code here

    public function teste() {
        $this->layout = "";
    }

    public function home() {
        $this->layout = "";
    }

    public function table() {
        $this->layout = "";
// echo print_r($this->request->data);
        $counter = $this->request->data['counter'];
        $data = $this->request->data;

// $tags0 = explode(",", $data['tags0']);
// $tags1 = explode(",", $data['tags1']);

        $arrayMatrix = '';

        for ($i = 0; $i <= $counter; $i++) {
            $tags = explode(",", $data['tags' . $i]);
            $arrayMatrix[$i] = $tags;
            $arrayMatrix[$i]['label'] = $data['titulo' . $i];
        }

        echo "<table class='table table-hover'><thead><tr>";

        $counterAnterior = 0;
        $counterTotal = 0;
        $arrayCounterByIndex = '';
        echo "<th>" . utf8_decode("ID") . "</th>";
        $NLinha = 1;
        foreach ($arrayMatrix as $array) {

            if (count($array) > $counterAnterior) {
                $counterTotal = count($array);
            }

            echo "<th>";
            echo $array['label'];
            echo "</th>";


            $counterAnterior = count($array);
        }

        echo utf8_decode("<th class='th-form-table'>" . utf8_encode("Preço") . "</th>"
                . "<th class='th-form-table'>" . utf8_encode("Preço de Venda") . "</th>"
                . "<th class='th-form-table'>Peso</th>"
                . "<th class='th-form-sku'>SKU</th>");
        echo "</tr>";


        $totalDeLinhas = 1;
//GERANDO ARRAY DE TODOS OS OBJETOS E SEUS MAX-INDEX
        for ($c = 0; $c < count($arrayMatrix); $c++) {
            $arrayCounterByIndex[$c]['counter'] = 0;
            $arrayCounterByIndex[$c]['maxCounter'] = count($arrayMatrix[$c]) - 1;
            $arrayCounterByIndex[$c]['positionOnArray'] = $c;
            $totalDeLinhas = $totalDeLinhas * count($arrayMatrix[$c]);
        }

//retirando LABEL da contagem de indices
        $counterTotal--;
        // $totalDeLinhas = ($counterTotal * $counterTotal) * count($arrayMatrix);
        $totalDeLinhas = $arrayCounterByIndex[0]['maxCounter'] * $arrayCounterByIndex[1]['maxCounter'];
        // $totalDeLinhas = 486;
//$positionArrayCounter = count($arrayCounterByIndex) - 1;
        $positionArrayCounter = 0;

//L I M I T A R - L Ó G I C A - P A R A - 1 5 - I T E N S
        $position = 0;
        for ($i = 0; $i < $totalDeLinhas; $i++) {
            echo "<tr>";
            echo "<td>{$NLinha}</td>";
            foreach ($arrayMatrix as $array) {

                echo "<td>";

                //lógica para imprimir cor
                if (strpos($array[$arrayCounterByIndex[$position]['counter']], "#")) {
                    $valores = explode("-", $array[$arrayCounterByIndex[$position]['counter']]);
                    echo "<div style='width: 20px; height: 20px; background:{$valores[1]};'></div>";
                } else {
                    echo $array[$arrayCounterByIndex[$position]['counter']];
                }


// echo $arrayCounterByIndex[$position]['counter'];
                echo "</td>";
                //echo "<br/>**************<br/>";
                // echo "POSITION: {$position}<br/>";
                // echo "POISITON ARRAY COUNTER: {$positionArrayCounter}";
                // echo "<br/>ARRAY COUNTER BY INDEX: " . print_r($arrayCounterByIndex[$position]);

                if ($position == $positionArrayCounter) {
                    // echo "<br/>****É IGUAL***";
                    $var = $arrayCounterByIndex[$positionArrayCounter]['counter'];
                    $var++;
                    $arrayCounterByIndex[$positionArrayCounter]['counter'] = $var;
                }
                $position++;
            }

            echo "<td>"
            . "<div class='input-group'>  <span class='input-group-addon'>$</span>  <input type='text' class='form-control' aria-label='Amount (to the nearest dollar)'>  <span class='input-group-addon'>.00</span>
</div>"
            . "</td>"
            . "<td>"
            . "<div class='input-group'>  <span class='input-group-addon'>$</span>  <input type='text' class='form-control' aria-label='Amount (to the nearest dollar)'>  <span class='input-group-addon'>.00</span>
</div>"
            . "</td>"
            . "<td><input type='text' class='form-control form-table' ></td>"
            . "<td><input type='text' class='form-control form-table' ></td>";

            if ($position == $positionArrayCounter) {
                echo "<br/>****É IGUAL***";
                $var = $arrayCounterByIndex[$positionArrayCounter + 1]['counter'];
                $var++;
                $arrayCounterByIndex[$positionArrayCounter + 1]['counter'] = $var;
            }

            if ($arrayCounterByIndex[$positionArrayCounter]['counter'] == $arrayCounterByIndex[$positionArrayCounter]['maxCounter']) {
                $arrayCounterByIndex[$positionArrayCounter]['counter'] = 0;

//incremeta o proximo valor
                if (!empty($arrayCounterByIndex[$positionArrayCounter + 1])) {
                    $arrayCounterByIndex[$positionArrayCounter + 1]['counter'] ++;


                    if ($arrayCounterByIndex[$positionArrayCounter + 1]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 1]['maxCounter']) {
                        $arrayCounterByIndex[$positionArrayCounter + 1]['counter'] = 0;
// $positionArrayCounter++;

                        if (!empty($arrayCounterByIndex[$positionArrayCounter + 2])) {
                            $arrayCounterByIndex[$positionArrayCounter + 2]['counter'] ++;


                            if ($arrayCounterByIndex[$positionArrayCounter + 2]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 2]['maxCounter']) {
                                $arrayCounterByIndex[$positionArrayCounter + 2]['counter'] = 0;
// $positionArrayCounter++;

                                if (!empty($arrayCounterByIndex[$positionArrayCounter + 3])) {
                                    $arrayCounterByIndex[$positionArrayCounter + 3]['counter'] ++;


                                    if ($arrayCounterByIndex[$positionArrayCounter + 3]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 3]['maxCounter']) {
                                        $arrayCounterByIndex[$positionArrayCounter + 3]['counter'] = 0;
// $positionArrayCounter++;

                                        if (!empty($arrayCounterByIndex[$positionArrayCounter + 4])) {
                                            $arrayCounterByIndex[$positionArrayCounter + 4]['counter'] ++;


                                            if ($arrayCounterByIndex[$positionArrayCounter + 4]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                $arrayCounterByIndex[$positionArrayCounter + 4]['counter'] = 0;
// $positionArrayCounter++;

                                                if (!empty($arrayCounterByIndex[$positionArrayCounter + 5])) {
                                                    $arrayCounterByIndex[$positionArrayCounter + 5]['counter'] ++;


                                                    if ($arrayCounterByIndex[$positionArrayCounter + 5]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                        $arrayCounterByIndex[$positionArrayCounter + 5]['counter'] = 0;
// $positionArrayCounter++;

                                                        if (!empty($arrayCounterByIndex[$positionArrayCounter + 6])) {
                                                            $arrayCounterByIndex[$positionArrayCounter + 6]['counter'] ++;


                                                            if ($arrayCounterByIndex[$positionArrayCounter + 6]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                                $arrayCounterByIndex[$positionArrayCounter + 6]['counter'] = 0;
// $positionArrayCounter++;

                                                                if (!empty($arrayCounterByIndex[$positionArrayCounter + 7])) {
                                                                    $arrayCounterByIndex[$positionArrayCounter + 7]['counter'] ++;


                                                                    if ($arrayCounterByIndex[$positionArrayCounter + 7]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                                        $arrayCounterByIndex[$positionArrayCounter + 7]['counter'] = 0;
// $positionArrayCounter++;

                                                                        if (!empty($arrayCounterByIndex[$positionArrayCounter + 8])) {
                                                                            $arrayCounterByIndex[$positionArrayCounter + 8]['counter'] ++;


                                                                            if ($arrayCounterByIndex[$positionArrayCounter + 8]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                                                $arrayCounterByIndex[$positionArrayCounter + 8]['counter'] = 0;
// $positionArrayCounter++;

                                                                                if (!empty($arrayCounterByIndex[$positionArrayCounter + 9])) {
                                                                                    $arrayCounterByIndex[$positionArrayCounter + 9]['counter'] ++;


                                                                                    if ($arrayCounterByIndex[$positionArrayCounter + 9]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                                                        $arrayCounterByIndex[$positionArrayCounter + 9]['counter'] = 0;
// $positionArrayCounter++;

                                                                                        if (!empty($arrayCounterByIndex[$positionArrayCounter + 10])) {
                                                                                            $arrayCounterByIndex[$positionArrayCounter + 10]['counter'] ++;


                                                                                            if ($arrayCounterByIndex[$positionArrayCounter + 10]['counter'] == $arrayCounterByIndex[$positionArrayCounter + 4]['maxCounter']) {
                                                                                                $arrayCounterByIndex[$positionArrayCounter + 10]['counter'] = 0;
// $positionArrayCounter++;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

//            $var = $arrayCounterByIndex[$positionArrayCounter]['counter'];
//            $var++;
//            $arrayCounterByIndex[$positionArrayCounter]['counter'] = $var;
//            echo "<br/>****<br/>VAR: {$var}<BR/>POSITION ARRAY COUNTER: {$positionArrayCounter}<BR/>ARRAY COUNTER BY INDEX: {$arrayCounterByIndex[$positionArrayCounter]['counter']}";
//
//            if ($arrayCounterByIndex[$positionArrayCounter]['counter'] == ($arrayCounterByIndex[$positionArrayCounter]['maxCounter'])) {
//                $positionArrayCounter--;
//            }
//
//            echo "<br/>POSITION ARRAY COUNTER: " . $arrayCounterByIndex[$positionArrayCounter]['counter'];
//            echo "<br/>position: {$position}" . "<br/>";
//            // $arrayCounterByIndex[$positionArrayCounter]['counter'] ++;
//
            if ($position < count($arrayMatrix) - 1) {
                $position++;
            } else {
                $position = 0;
            }

            echo "</tr>";
            $NLinha++;
        }

        echo "</table>";


//        echo "<h1>MAIOR INDICE: {$counterTotal}</h1>";
//        echo "<br/><h1>ARRAY DE INDICES:" . print_r($arrayCounterByIndex) . "</h1>";
//        echo "<br/><h1>CONTADOR GERAL DE TODOS OS ARRAYS: {$positionArrayCounter}</h1>";
//
//        echo "ARRAY MATRIX";
//        print_r($arrayMatrix);
    }

}
