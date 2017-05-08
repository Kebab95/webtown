<table class="table">
    <thead>
        <tr>
            <th>Név</th>
            <th>Ár</th>
            <th>Megapack</th>
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
                echo "</tr>";
            }
        ?>
    </tbody>
</table>