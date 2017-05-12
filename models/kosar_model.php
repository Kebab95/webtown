<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.09.
 * Time: 13:18
 */
class kosar_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKosarTermekek(array $list)
    {
        $tempArray = array();
        foreach ($list as $key => $item) {
            /** @var TermekekTable $temp */
            $temp = $this->db->SQLSelectToClass(
                "TermekekTable",
                TermekekTable::$tableName,
                array(),
                TermekekTable::$id."=".$item[0]
            );
            $tempArray[$key] = $temp;
            //array_push($tempArray,$temp);
        }
        return $tempArray;
    }

    public function getKosarTableData(array $array)
    {
        $temp = array();
        if ($array !=null){
            $termekekLista = $this->getKosarTermekek($array);

            $kedvezmenyMegaPack = 0;
            $kedvezmenyKettoHarom = 0;
            foreach ($array as $key => $value) {
                /** @var TermekekTable $termek */
                $termek = $termekekLista[$key][0];
                $darab = $array[$key][1];


                if ($termek->isMegapack()){
                    if ($darab>2){
                        $kedvezmenyMegaPack +=intval($darab/12)*6000;
                    }
                }
                else {
                    if ($darab>2){
                        $kedvezmenyKettoHarom +=intval($darab/3)*$termek->getPrice();
                    }
                }
            }
            foreach ($array as $key => $value) {
                /** @var TermekekTable $termek */
                $termek = $termekekLista[$key][0];
                $darab = $array[$key][1];
                $kedvezmeny = 0;


                if ($termek->isMegapack()){
                    if ($darab>2){
                        $kedvezmeny =intval($darab/12)*6000;
                    }
                    if ($kedvezmenyMegaPack<$kedvezmenyKettoHarom){
                        $temp[$key] = array(
                            "Id" => $termek->getId(),
                            "Nev" => $termek->getName(),
                            "Darab" => $darab,
                            "Ar" => ($termek->getPrice()*$darab),
                            "Kedvezmeny" => 0
                        );
                    }
                    else {
                        $temp[$key] = array(
                            "Id" => $termek->getId(),
                            "Nev" => $termek->getName(),
                            "Darab" => $darab,
                            "Ar" => ($termek->getPrice()*$darab)-$kedvezmeny,
                            "Kedvezmeny" => $kedvezmeny
                        );
                    }

                }
                else {
                    if ($darab>2){
                        $kedvezmeny =intval($darab/3)*$termek->getPrice();
                    }
                    if ($kedvezmenyMegaPack<$kedvezmenyKettoHarom){
                        $temp[$key] = array(
                            "Id" => $termek->getId(),
                            "Nev" => $termek->getName(),
                            "Darab" => $darab,
                            "Ar" => ($termek->getPrice()*$darab)-$kedvezmeny,
                            "Kedvezmeny" => $kedvezmeny
                        );
                    }
                    else {
                        $temp[$key] = array(
                            "Id" => $termek->getId(),
                            "Nev" => $termek->getName(),
                            "Darab" => $darab,
                            "Ar" => ($termek->getPrice()*$darab),
                            "Kedvezmeny" => 0
                        );
                    }

                }

            }
        }
        return $temp;
    }

    public function deleteTermek($key)
    {
        /** @var array $array */
        $array  = Session::issetVal("kosar")?Session::get("kosar"):null;

        unset($array[$key]);
        Session::set("kosar",$array);
    }

    public function getAJAXTable()
    {
        /** @var array $array */
        $array  = Session::issetVal("kosar")?Session::get("kosar"):null;
        if ($array!=null){
            $array = $this->getKosarTableData($array);
        }

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

    }

    public function veglegesites(string $name,$email,$cim, array $termekek)
    {
        $kosarData = $this->getKosarTableData($termekek);

        $insert = "";
        foreach ($kosarData as $value) {
            if (strlen($insert)>0){
                $insert.=",";
            }
            $insert .="('".$name."','".$email."','".$cim."',".$value["Id"].",".$value["Darab"].",".$value["Ar"].")";
        }

        $sql = "INSERT INTO ".RendelesekTable::$tableName." (
                ".RendelesekTable::$name.",
                ".RendelesekTable::$email.",
                ".RendelesekTable::$cim.",
                ".RendelesekTable::$termek.",
                ".RendelesekTable::$datab.",
                ".RendelesekTable::$ar."
        ) VALUES ".$insert;
        //echo $sql;
        try{

            $sth = $this->db->prepare($sql);
            $return = $sth->execute();
            if ($return){
                Session::destroy();
                return $return;
            }
            else {
                return $return;
            }
            //return $sth->execute();
        } catch (PDOException $e){
            return false;
        }
    }
}