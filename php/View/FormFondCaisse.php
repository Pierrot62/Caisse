<?php 
if($_GET["m"] == "deconnect"){
    echo '<header>
    <div class="header-1">
        <img src="Img/Logo_Afpa.jpg">
        <p>'. $titre . '</p>
        <div class="a"><a href="deconnect">Deconnexion</a></div>
    </div>
</header>
<form class="formFondCaisse" action="index.php?action=connect" method="POST">
    <div class="fond">
        <h3>Fond de Caisse :</h3>
        <div class="contenue">
            <fieldset>
                <legend>Billets</legend>
                <label for="B100"> 100 € :</label>
                <input class="nbMonnaie" type="text" name="B100" id="B100" placeholder="Nombre de Billets" required value="0"/><br>

                <label for="B50"> 50 € :</label>
                <input class="nbMonnaie" type="text" name="B50" id="B50" placeholder="Nombre de Billets"  required value="0"/><br>

                <label for="B20"> 20 € :</label>
                <input class="nbMonnaie" type="text" name="B20" id="B20" placeholder="Nombre de Billets"  required value="0"/><br>

                <label for="B10"> 10 € :</label>
                <input class="nbMonnaie" type="text" name="B10" id="B10" placeholder="Nombre de Billets" required value="0" /><br>

                <label for="B5"> 5 € :</label>
                <input class="nbMonnaie" type="text" name="B5" id="B5" placeholder="Nombre de Billets"  required value="0" /><br>
            </fieldset>
        
               <fieldset>
                <legend>Pièces</legend>
                <label for="P2"> 2 € :</label>
                <input class="nbMonnaie" type="text" name="B2" id="B2" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P1"> 1 € :</label>
                <input class="nbMonnaie" type="text" name="B1" id="B1" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P50"> 0.50 € :</label>
                <input class="nbMonnaie" type="text" name="B0.50" id="B0.50" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P20"> 0.20 € :</label>
                <input class="nbMonnaie" type="text" name="B0.20" id="B0.20" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P10"> 0.10 € :</label>
                <input class="nbMonnaie" type="text" name="B0.10" id="B0.10" placeholder="Nombre de Pièces"  required value="0"/><br>
                
                <label for="P005"> 0.05 € :</label>
                <input class="nbMonnaie" type="text" name="B0.05" id="B0.05" placeholder="Nombre de Pièces"  required value="0"/><br>
                
                <label for="P002"> 0.02 € :</label>
                <input class="nbMonnaie" type="text" name="B0.02" id="B0.02" placeholder="Nombre de Pièces"  required value="0"/><br> 
                   
                <label for="P001"> 0.01 € :</label>
                <input class="nbMonnaie" type="text" name="B0.01" id="B0.01" placeholder="Nombre de Pièces"  required value="0"/><br>   

            </fieldset>
            </div>
            <div class="container-form-center">
                <input type="submit" class="submit" value="Valider" />
            
        </div>


    </div>

</form>';
}
elseif ($_GET['action'] == "fondCaisse")
{
    echo '<header>
    <div class="header-1">
        <img src="Img/Logo_Afpa.jpg">
        <p>'. $titre . '</p>
        <div class="a"><a href="deconnect">Deconnexion</a></div>
    </div>
</header>
<form class="formFondCaisse" action="index.php?action=InterfacePrincipal" method="POST">
    <div class="fond">
        <h3>Fond de Caisse :</h3>
        <div class="contenue">
            <fieldset>
                <legend>Billets</legend>
                <label for="B100"> 100 € :</label>
                <input class="nbMonnaie" type="text" name="B100" id="B100" placeholder="Nombre de Billets" required value="0"/><br>

                <label for="B50"> 50 € :</label>
                <input class="nbMonnaie" type="text" name="B50" id="B50" placeholder="Nombre de Billets"  required value="0"/><br>

                <label for="B20"> 20 € :</label>
                <input class="nbMonnaie" type="text" name="B20" id="B20" placeholder="Nombre de Billets"  required value="0"/><br>

                <label for="B10"> 10 € :</label>
                <input class="nbMonnaie" type="text" name="B10" id="B10" placeholder="Nombre de Billets" required value="0" /><br>

                <label for="B5"> 5 € :</label>
                <input class="nbMonnaie" type="text" name="B5" id="B5" placeholder="Nombre de Billets"  required value="0" /><br>
            </fieldset>
        
               <fieldset>
                <legend>Pièces</legend>
                <label for="P2"> 2 € :</label>
                <input class="nbMonnaie" type="text" name="B2" id="B2" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P1"> 1 € :</label>
                <input class="nbMonnaie" type="text" name="B1" id="B1" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P50"> 0.50 € :</label>
                <input class="nbMonnaie" type="text" name="B0.50" id="B0.50" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P20"> 0.20 € :</label>
                <input class="nbMonnaie" type="text" name="B0.20" id="B0.20" placeholder="Nombre de Pièces"  required value="0"/><br>

                <label for="P10"> 0.10 € :</label>
                <input class="nbMonnaie" type="text" name="B0.10" id="B0.10" placeholder="Nombre de Pièces"  required value="0"/><br>
                
                <label for="P005"> 0.05 € :</label>
                <input class="nbMonnaie" type="text" name="B0.05" id="B0.05" placeholder="Nombre de Pièces"  required value="0"/><br>
                
                <label for="P002"> 0.02 € :</label>
                <input class="nbMonnaie" type="text" name="B0.02" id="B0.02" placeholder="Nombre de Pièces"  required value="0"/><br> 
                   
                <label for="P001"> 0.01 € :</label>
                <input class="nbMonnaie" type="text" name="B0.01" id="B0.01" placeholder="Nombre de Pièces"  required value="0"/><br>   

            </fieldset>
            </div>
            <div class="container-form-center">
                <input type="submit" class="submit" value="Valider" />
            
        </div>


    </div>

</form>';
}