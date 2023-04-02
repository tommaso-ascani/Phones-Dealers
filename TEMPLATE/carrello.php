<main id="Carrello">
    <h1>CARRELLO</h1>    
    <section>
        <section>
            <?php if(isset($templateParams["buy"])): ?>
                <p><?php echo $templateParams["buy"]; ?></p>
            <?php endif; ?>
            
            <?php if(isset($templateParams["cartProduct"])): ?>
                <?php foreach($templateParams["cartProduct"] as $prodotto): ?>               
                    <div>
                        <div>
                            <img src=<?php echo $prodotto['percorsoImmagine']?> alt="">
                        </div><div>
                            <div>
                                <h2><?php echo $prodotto['Marca']?>  <?php echo $prodotto['Modello']?></h2>
                                <div><br> Colore: <p><?php echo $prodotto["Colore"]?></p> <br>  Memoria in GB: <p><?php echo $prodotto["Memoria"]?></p> <br>  Venduto da: <p><?php $venditoreProdotto = $dbh->getvenditoreProdotto($prodotto["id_prodotto"]); echo $venditoreProdotto[0]["Username"]; ?></p></div>
                            </div><div>
                                <div>
                                    <a href="./carrelloLogica.php?pRemove=<?php echo $prodotto["id_prodotto"]?>"><img src="./IMG/Site/meno.png" alt="Shopper icon per rimuovere prodotto al carrello"></a>
                                </div><div>
                                    <p><?php echo $prodotto['quantità']?></p>
                                </div><div>
                                    <a href="./carrelloLogica.php?pAdd=<?php echo $prodotto["id_prodotto"]?>"><img src="./IMG/Site/più.png" alt="Shopper icon per aggiungere prodotto al carrello"></a>
                                </div>
                            </div><div>
                                <p><?php if(!$dbh->isQuantityAvailable($_SESSION['username'], $prodotto["id_prodotto"])){
                                     echo 'Quantità massima raggiunta!';}?></p>
                            </div><div>
                                <p>Prezzo : <?php echo $prodotto['Prezzo']?>€</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section><section>
           <div>
               <div>
                    Prezzo Subtotale: <p><?php ?><?php if(isUserLoggedIn()){echo $dbh->getCartPrice($_SESSION['username']);}?> €</p>
               </div><div>
                    Prezzo Spedizione: <p>10 €</p></h2>
               </div><div>
                    Prezzo totale:<p><?php if(isUserLoggedIn()){echo $dbh->getCartPrice($_SESSION['username'])+10;}?> €</p>
               </div><div>
                   <div>
                        <a href="carrelloLogica.php?buy=true"> PROCEDI AL PAGAMENTO</a>
                   </div><div>
                    <label for="maestro">
                        <input checked type="radio" name="pay" value="maestro" id= "maestro"/>
                        <img src="./IMG/Site/MaestroIcon.png" alt="Maestro Icon">
                    </label>
                    <label for="paypal">
                        <input  type="radio" name="pay" value="paypal" id= "paypal"/>
                        <img src="./IMG/Site/PayPalIcon.png" alt="Maestro Icon">
                    </label>
                    <label for="visa">
                        <input type="radio" name="pay" value="visa" id= "visa"/>
                        <img src="./IMG/Site/VisaIcon.png" alt="Maestro Icon">
                    </label>
                    </div>
               </div>
           </div>
        </section>
    </section>
</main>