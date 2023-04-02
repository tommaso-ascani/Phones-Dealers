<!DOCTYPE html>
<html lang="it" >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
        <title>PhonesDealer</title>
        <link rel="icon" href="./IMG/Site/TelephoneIcon.png">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
    </head>
    <body>
        <header>
            <div>
                <div> 
                    <div>
                        <a href="index.php">
                            <img src="./IMG/Site/TelephoneIcon.png" alt="Icona del brand">                
                        </a>
                        <a href="index.php">
                            <h1>PhonesDealer</h1>
                        </a>
                    </div><div> 
                        <a href="./carrelloLogica.php"><img src="./IMG/Site/IconShop.png" alt="Shopper icon per accedere al carrello" /></a>
                    </div>
                </div><div>
                    <div>
                        <a style="<?php if(isUserLoggedIn()){ echo 'color: red;'; }?>" href="./areaCLientiLogica.php" target="_self"><h2>Area Clienti</h2></a>
                        <a style="<?php if(isSellerLoggedIn()){ echo 'color: red;'; }?>" href="./areaVenditoreLogica.php" target="_self"><h2>Area Venditori</h2></a>
                    </div><div>
                        <div>
                            <img src="./IMG/Site/menuIcon.png" alt="Icona Menu laterale" id="menu" class="menu">
                        </div>
                        <div id="menuitem1" class="menuitem">
                            <a style="<?php if(isUserLoggedIn()){ echo 'color: red;'; }?>" href="./areaCLientiLogica.php" target="_self"><h2>Area Clienti</h2></a>
                        </div><div id="menuitem2" class="menuitem">
                            <a style="<?php if(isSellerLoggedIn()){ echo 'color: red;'; }?>" href="./areaVenditoreLogica.php" target="_self"><h2>Area Venditori</h2></a>
                        </div>
                    </div>
                </div>
            </div> 
        </header>
        <?php
            require($templateParams["Pagina"]);
        ?>
        <footer>
            <div>
                <div>
                    <h1>Metodi di Pagamento</h1>
                    <p>PayPal, Carta di Credito/Debito dei circuiti Mastercard e Maestro</p>
                </div><div>
                    <a href="./assistenza.php" target="_self"><h1>Contattaci</h1></a>
                    <p>Se volete contattarci cliccate su Contattaci qua sopra</p>
                </div><div>
                    <a href="./chiSiamoLogica.php" target="_self"><h1>Chi Siamo</h1></a>
                    <p>Per sapere le nostre info cliccate su Chi Siamo qua sopra</p>
                </div><div>
                    <h1>Corrieri</h1>
                    <p>DHL, Bartolini</p>
                </div>
            </div>
        </footer>
    </body>
    <script src="./JS/jquery-3.4.1.min.js"></script>
	<script src="./JS/productFilters.js"></script>
    <script src="./JS/menu.js"></script>
</html>