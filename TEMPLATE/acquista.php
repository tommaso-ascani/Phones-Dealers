<main id="Index">
    <h1>LISTINO</h1>

    <div>
        <div>
            <div>
                <h2>Filtra per:</h2>
            </div><div>
                <div>
                    <h3>Colore</h3>
                    <select name="filtroColore" title="filtrocolore" id="color" required>
                        <option value="" selected>None</option>
                        <option value="Bianco">Bianco</option>
                        <option value="Giallo">Giallo</option>
                        <option value="Nero">Nero</option>
                        <option value="Rosso">Rosso</option>
                        <option value="Verde">Verde</option>
                        <option value="Blu">Blu</option>
                        <option value="Grigio">Grigio</option>
                        <option value="Oro">Oro</option> 
                        <option value="Argento">Argento</option>                     
                    </select>                        
                </div>
                <div>
                    <h3>Memoria</h3>
                    <select name="filtroMemoria" title="filtroMemoria" id="memory" required>
                        <option value="" selected>None</option>
                        <option value="32">32gb</option>
                        <option value="64">64gb</option>
                        <option value="128">128gb</option>
                        <option value="256">256gb</option>
                        <option value="512">512gb</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div>
    <?php foreach($templateParams["Prodotto"] as $prodotto): ?> 
        <div class="product">
            <div>
              <img src="<?php echo $prodotto["percorsoImmagine"]?>" alt="">
            </div>
            <div>
                <div>
                    <h3><?php echo $prodotto["Marca"]?>   <?php echo $prodotto["Modello"]?></h3>
                    <div><br> Colore: <p class="col"><?php echo $prodotto["Colore"]?></p> <br>  Memoria in GB: <p class="mem"><?php echo $prodotto["Memoria"]?></p> <br>  Venduto da: <p><?php $venditoreProdotto = $dbh->getvenditoreProdotto($prodotto["id_prodotto"]); echo $venditoreProdotto[0]["Username"]; ?></p></div>
                </div>
                <div>
                    <div>
                        <a id="<?php echo $prodotto["id_prodotto"]?>" href="./index.php?pAdd=<?php echo $prodotto["id_prodotto"]?>"><img src="./IMG/Site/cartimage.png" alt="Shopper icon per aggiungere prodotto al carrello"></a>
                    </div><div>
                        <p>Quantità: <?php echo $prodotto["quantità"]?></p>
                        <p>Prezzo: <?php echo $prodotto["Prezzo"]?> €</p>
                    </div><div>
                        <p>Quantità: <?php echo $prodotto["quantità"]?></p>
                        <p>Prezzo: <?php echo $prodotto["Prezzo"]?> €</p>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
    </div>
</main>