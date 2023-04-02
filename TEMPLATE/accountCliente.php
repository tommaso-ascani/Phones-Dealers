<main id="AR">
    <h1>Area Riservata Cliente</h1>
    <section>
        <section>               
            <?php $numOrdine = 1; ?> <?php $numOrdineSingoloCorrente=0; $n = $templateParams["numOrdiniCliente"];?>
            <div></div>
            <?php while($numOrdine <= $templateParams["numOrdiniCliente"]): ?>
                <h2>Ordine n°: <?php echo $n; ?></h2>
                <div class="ordine">
                    <?php foreach($templateParams["ordiniCliente"] as $ordineSingolo): 
                        if (($numOrdineSingoloCorrente+1) == count($templateParams["ordiniCliente"])) { ?>
                            <div class="prodotto">
                                <div>
                                    <div>
                                        <img src="<?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["percorsoImmagine"]?>" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <h2> <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Marca"] ?>  <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Modello"] ?> </h2>
                                            <div><br> Colore: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Colore"]?></p> <br> Memoria in GB: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Memoria"] ?> </p></div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <p>Prezzo : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Prezzo"] ?> €</p>
                                    <p>Quantità : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["quantità"] ?></p>
                                </div>
                            </div>
                            <?php break 2;
                        } elseif($templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["n_ordine"] == $templateParams["ordiniCliente"][$numOrdine]["n_ordine"]){ ?>
                            <div class="prodotto">
                                <div>
                                    <div>
                                        <img src="<?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["percorsoImmagine"]?>" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <h2> <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Marca"] ?>  <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Modello"] ?> </h2>
                                            <div><br> Colore: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Colore"]?></p> <br> Memoria in GB: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Memoria"] ?> </p></div>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <p>Prezzo : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Prezzo"] ?> €</p>
                                    <p>Quantità : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["quantità"] ?></p>
                                </div>
                            </div>
                            <?php ++$numOrdine; ++$numOrdineSingoloCorrente; ?>
                            <?php
                        } elseif($numOrdineSingoloCorrente+1 == $templateParams["numOrdiniCliente"]) {
                            ++$numOrdine;
                            ++$numOrdineSingoloCorrente;
                            --$n; 
                            ?>
                            <div class="prodotto">
                                <div>
                                    <div>
                                        <img src="<?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["percorsoImmagine"]?>" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <h2> <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Marca"] ?>  <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Modello"] ?> </h2>
                                            <h4><br> Colore: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Colore"]?></p> <br> Memoria in GB: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Memoria"] ?> </p></h4>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <p>Prezzo : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Prezzo"] ?> €</p>
                                    <p>Quantità : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["quantità"] ?></p>
                                </div>
                            </div>
                            <?php break;
                        } else {
                            ++$numOrdine;
                            ++$numOrdineSingoloCorrente; 
                            --$n; ?>
                            <div class="prodotto">
                                <div>
                                    <div>
                                        <img src="<?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["percorsoImmagine"]?>" alt="">
                                    </div>
                                    <div>
                                        <div>
                                            <h2> <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Marca"] ?>  <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Modello"] ?> </h2>
                                            <h4><br> Colore: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Colore"]?></p> <br> Memoria in GB: <p><?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Memoria"] ?> </p></h4>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <p>Prezzo : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["Prezzo"] ?> €</p>
                                    <p>Quantità : <?php echo $templateParams["ordiniCliente"][$numOrdineSingoloCorrente]["quantità"] ?></p>
                                </div>
                            </div>
                            <?php  break;
                        }
                    ?>
                    <?php endforeach; ?>
                </div>
            <?php  endwhile; ?>
        </section><section>
            <div>
                <img src="./IMG/RegisteredUsers/ClientAccountIcon.png" alt="">
                <p> <?php echo $templateParams["cliente"][0]["Cognome"] ?> <?php echo $templateParams["cliente"][0]["Nome"] ?></p>
            </div><div>
                <ul>
                    <li>
                        <p>Data di nascita : <?php echo $templateParams["cliente"][0]["Data_nascita"] ?></p>
                    </li><li>
                        <p>Numero di ordini effettuatti: <?php echo $templateParams["numNotificheCliente"]?></p>
                    </li>
                </ul>
            </div><div>
                <a href="index.php?logout=true">Logout</a>
            </div>
        </section>
    </section><section>
        <h2>Notifiche</h2>
        <?php $tempNotifiche =  $templateParams["numNotificheCliente"]?>
        <?php for($numOrdine = 1; $numOrdine <= $tempNotifiche; --$tempNotifiche):  ?>    
            <div>
                <h3>Notifica <?php echo $tempNotifiche ?></h3>
                <p> <?php echo $templateParams["notificheCliente"][$tempNotifiche-1]["Testo"] ?> </p>
            </div>
        <?php endfor; ?>
    </section>
</main>