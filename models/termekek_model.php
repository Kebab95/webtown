<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 16:09
 */
class termekek_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getTermekek(){
        return $this->db->SQLSelectToClass("TermekekTable",TermekekTable::$tableName);
    }

    public function getModal($id){
        /** @var TermekekTable $termek */
        $termek = $this->db->SQLSelectToClass(
            "TermekekTable",
            TermekekTable::$tableName,
            array("*"),
            TermekekTable::$id."=".$id)[0];

        ?>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Kosárhoz adás</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?php echo $termek->isMegapack()?"1":"0"?>" id="isMegaPack">
                        <?php
                            if ($termek->isMegapack()){
                                ?>
                                <div class="row form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8 text-center"><b>Megapack kedvezmény:</b><br>Minden 12 dbos termékhez 6000 Ft kedvezményt adunk!</div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="row form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8 text-center"><b>Kettőt fizet hármat kap kedvezmény:</b><br>Minden 3 db termék után engedünk egy termék árából!</div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <?php
                            }
                        ?>

                        <div class="row form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 text-center">
                                Alap Ár: <b><?php echo $termek->getPrice() ?> Ft</b>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6">Mennység: </div>
                            <div class="col-sm-6"><input type="number" id="mennyiseg" class="form-control" min="1" max="50" value="1"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 text-center">
                                Fizetendő Ár: <b rel="<?php echo $termek->getPrice() ?>" id="actualPrice"><?php echo $termek->getPrice() ?> Ft</b>
                                <br><i id="kedvezmeny"></i></div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8"><input rel="<?php echo $termek->getId()?>" type="button" id="submitKosar" class="btn btn-success btn-block" value="Kosárhoz adás"></div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bezárás</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }


    public function addKosar($id, $db)
    {
        if (Session::issetVal("kosar")){
            $array = Session::get("kosar");
            if (is_array($array)){
                array_push($array,array($id,$db));
                Session::set("kosar",$array);
            }
            else {
                Session::set("kosar",array(
                    array($id,$db)
                ));
            }


        }
        else {
            Session::set("kosar",array(
               array($id,$db)
            ));
        }
    }
}