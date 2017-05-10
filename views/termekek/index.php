<table class="table">
    <thead>
        <tr>
            <th>Név</th>
            <th>Ár</th>
            <th>Megapack Kedvezmény</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        /** @var TermekekTable $value */
        foreach ($this->termekekList as $value){
                echo "<tr>";
                    echo "<td>".$value->getName()."</td>";
                    echo "<td>".$value->getPrice()." Ft</td>";
                    echo "<td>".($value->isMegapack()?"Igen":"Nem")."</td>";
                    echo "<td><button class='btn btn-block btn-default' id='add' rel='".$value->getId()."'>Kosárhoz ad</button> </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<div id="modalHire"></div>

<?php
