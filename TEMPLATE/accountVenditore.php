<main id="AR">
    <h1>Area Riservata Venditore</h1>
    <section>
        <section>
            <div>
                <a href="./venditoreInserisceProdottoLogica.php">Inserisci un nuovo prodotto</a>
            </div>
            <?php foreach($templateParams["ProdottiVenditore"] as $prodotto) : ?>
                <div class="prodotto">
                    <div>
                        <div>
                            <img src="<?php echo $prodotto["percorsoImmagine"]?>" alt="Immagine del prodotto">
                        </div>
                        <div>
                            <div>
                                <h2><?php echo $prodotto["Marca"]?>   <?php echo $prodotto["Modello"]?></h2>
                                <div><br> Colore: <p class="col"><?php echo $prodotto["Colore"]?></p> <br>  Memoria in GB: <p class="mem"><?php echo $prodotto["Memoria"]?></p> <br>  Venduto da: <p><?php $venditoreProdotto = $dbh->getvenditoreProdotto($prodotto["id_prodotto"]); echo $venditoreProdotto[0]["Username"]; ?></p></div>
                            </div>
                            <div>
                                <a href="./areaVenditoreLogica.php?elimina=<?php echo $prodotto["id_prodotto"] ?>"> <img src="./IMG/Site/XIcon.png" alt="Icona per eliminare prodotto"> </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Quantità: <?php echo $prodotto["quantità"]?></p>
                        <p>Prezzo: <?php echo $prodotto["Prezzo"]?> €</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section><section>
            <div>
                <img src="./IMG/registeredUsers/SellerAccountImage.png" alt="Immagine default del venditore">
                <p> <?php echo $templateParams["venditore"][0]["Username"] ?> </p>
            </div><div>
                <ul>
                    <li>
                        <p>Codice Partita IVA : <?php echo $templateParams["venditore"][0]["Partita_IVA"] ?> </p>
                    </li><li>
                        <p>Numero di ordini effettuati:  <?php echo $templateParams["numOrdiniVenditore"] ?></p>
                    </li>
                </ul>
            </div><div>
                <a href="index.php?logout=true">Logout</a>
            </div>
        </section>
    </section><section>
        <h2>Notifiche</h2>
        <?php $tempNNotifiche = $templateParams["numNotifichevenditore"]; ?>
        <?php for($n = 1; $n <= $tempNNotifiche; $tempNNotifiche--):  ?>    
            <div>
                <h3>Notifica <?php echo $tempNNotifiche ?></h3>
                <p> <?php echo $templateParams["notificheVenditore"][$tempNNotifiche-1]["Testo"] ?> </p>
            </div>
        <?php endfor; ?>
    </section>
</main>