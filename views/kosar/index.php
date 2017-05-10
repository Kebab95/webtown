<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Kosaram</div>
            <table class="table">
                <thead>
                <tr>
                    <th>Név</th>
                    <th>Darab</th>
                    <th>Ár</th>
                    <th>Kedvezmény</th>
                    <th>Törlés</th>
                </tr>
                </thead>
                <tbody id="kosarTBody">
                    <?php

                    $array = $this->kosarArray;
                        if ($array !=null && is_array($array)){
                            foreach ($array as $key => $value) {
                                echo "<tr>";
                                    echo "<td>".$value["Nev"]."</td>";
                                    echo "<td>".$value["Darab"]."</td>";
                                    echo "<td id='ar'>".$value["Ar"]." Ft</td>";
                                    echo "<td><i>".$value["Kedvezmeny"]." Ft</i></td>";
                                    echo "<td><button rel='".$key."' id='termekTorles' class='btn btn-danger'>&times;</button> </td>";
                                echo "</tr>";
                            }
                        }
                        else{
                            echo "<tr>
                                <td colspan='5' class='text-center'>Nincsen termék a kosarában</td>
                                </tr>";
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-6">
                Össz Fizetendő ár:
            </div>
            <div class="col-sm-6" id="osszAr">

            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php
/**
 * TODO: Kitörölni a következő kommentet, a Session tesztelés céljából
 */
/*
echo "<pre>";
var_dump(Session::get("kosar"));
echo "</pre>";

echo "<pre>";
var_dump($array);
echo "</pre>";
*/
?>


