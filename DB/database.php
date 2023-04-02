<?php
    class DataBaseHelper{
        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if($this->db->connect_error){
                die("Connesione fallita al db");
            }
        }

        //Funzioni prodotti

        public function getProduct(){
            $stmt = $this->db->prepare("SELECT id_prodotto, id_venditore, Modello, Marca, Colore, Memoria, Prezzo, quantità, attivo, percorsoImmagine FROM prodotti WHERE attivo=1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function getvenditoreProdotto($idProdotto){
            $stmt = $this->db->prepare("SELECT prodotti.id_venditore, venditori.Username FROM prodotti INNER JOIN venditori ON prodotti.id_venditore=venditori.id_venditore WHERE prodotti.id_prodotto= ?");
            $stmt->bind_param('i',$idProdotto);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getDatiCliente($idCliente) {
            $stmt = $this->db->prepare("SELECT Nome, Cognome, Data_nascita FROM clienti WHERE clienti.id_cliente= ?");
            $stmt->bind_param('i',$idCliente);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNotificheCliente($idCliente) {
            $stmt = $this->db->prepare("SELECT Testo FROM notifiche_clienti WHERE notifiche_clienti.id_cliente= ?");
            $stmt->bind_param('i',$idCliente);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getOrdiniCliente($idCliente) {
            $stmt = $this->db->prepare("SELECT prodotti.id_venditore, prodotti.Modello, prodotti.Marca, prodotti.Colore, prodotti.Memoria, prodotti.Prezzo, prodotti.percorsoImmagine, venditori.Username, ordini.id_prodotto, n_ordine, ordini.quantità
            FROM ordini
            INNER JOIN prodotti ON prodotti.id_prodotto=ordini.id_prodotto
            INNER JOIN venditori ON prodotti.id_venditore=venditori.id_venditore
            WHERE id_cliente=?
            ORDER BY n_ordine DESC");
            $stmt->bind_param('i',$idCliente);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumOrdiniCliente($idcliente){
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM ordini  WHERE id_cliente=".$idcliente." GROUP BY n_ordine");
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        
        public function deleteProdotto($idProdotto){
            $stmt = $this->db->prepare("UPDATE prodotti SET attivo=0 WHERE id_prodotto = ".$idProdotto);
            $stmt->execute();
        }

        public function addProduct($idVenditore, $modello, $marca, $colore, $memoria, $prezzo, $quantità, $nomeImmagine){
            $stmt = $this->db->prepare("INSERT INTO prodotti (id_venditore, Modello, Marca, Colore, Memoria, Prezzo, quantità, percorsoImmagine) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
            $nomeImmagine2 = UPLOAD_DIR_PROD . $nomeImmagine;
            $stmt->bind_param('isssiiis', $idVenditore, $modello, $marca, $colore, $memoria, $prezzo, $quantità, $nomeImmagine2);
            $stmt->execute();
        }

        public function getProductQuantity($id_prodotto){
            $query = "SELECT quantità FROM prodotti WHERE id_prodotto = ".$id_prodotto;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            return $result;
        }
        
        //Funzioni Clienti

        public function checkLoginUser($username, $password){
            $query = "SELECT id_cliente, Username FROM clienti WHERE username = ? AND password = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkRegisteredUser($username, $mail){
            $query = "SELECT Username FROM clienti WHERE Username = ? OR Email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $username, $mail);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function userRegister($nome, $cognome, $birthdate, $username, $mail, $password){
            $query = "INSERT INTO clienti (`Nome`, `Cognome`, `Data_nascita`, `Username`, `Email`, `Password`) VALUES
                    (?, ?, ?, ?, ?, ?);";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssssss', $nome, $cognome, $birthdate, $username, $mail, $password);
            $stmt->execute();
        }

        public function getAllUsernameClients(){
            $stmt = $this->db->prepare("SELECT Username FROM clienti");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        //Funzioni venditori

        public function checkLoginSeller($username, $password){
            $query = "SELECT id_venditore, Username FROM venditori WHERE username = ? AND password = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkRegisteredSeller($pIVA){
            $query = "SELECT Username FROM venditori WHERE Partita_IVA = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $pIVA);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function sellerRegister($pIVA, $username, $mail, $password){
            $query = "INSERT INTO venditori (`Partita_IVA`, `Username`, `Email`, `Password`) VALUES
                    (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssss', $pIVA, $username, $mail, $password);
            $stmt->execute();
        }

        public function getProdottiVenditore($idVenditore){
            $query = " SELECT id_prodotto, Modello, Marca, Colore, Memoria, Prezzo, quantità, percorsoImmagine FROM prodotti WHERE prodotti.id_venditore= ? AND attivo = 1";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$idVenditore);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getDatiVenditore($idVenditore) {
            $stmt = $this->db->prepare("SELECT Username, Partita_IVA FROM venditori WHERE venditori.id_venditore= ?");
            $stmt->bind_param('i',$idVenditore);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNotificheVenditore($idVenditore) {
            $stmt = $this->db->prepare("SELECT Testo FROM notifiche_venditori WHERE notifiche_venditori.id_venditore= ?");
            $stmt->bind_param('i',$idVenditore);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getOrdiniVenditore($idVenditore) {
            $stmt = $this->db->prepare("SELECT ordini.id_ordine 
            FROM ordini 
            INNER JOIN prodotti ON ordini.id_prodotto=prodotti.id_prodotto
            WHERE prodotti.id_venditore=?");
            $stmt->bind_param('i',$idVenditore);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }



        //Funzioni Carrello

        public function existCart($username){
            $query = "SHOW TABLES LIKE 'carrello_".$username."'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $result2 = mysqli_fetch_assoc($result);
            if ($result2 == null) {
                return false;
            } else {
                return true;
            }
        }

        public function createCart($username){
            $query = "CREATE TABLE carrello_" .$username. " (id_productCart int(11) NOT NULL, id_prodotto int(11) NOT NULL, quantità int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8";           
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $query2  = "ALTER TABLE carrello_" .$username. "
                        ADD PRIMARY KEY (id_productCart),
                        ADD KEY id_prodotto (id_prodotto);";
            $stmt2 = $this->db->prepare($query2);
            $stmt2->execute();

            $query3  = "ALTER TABLE carrello_" .$username. "
                        ADD CONSTRAINT `carrello_?` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id_prodotto`)  ON DELETE CASCADE ON UPDATE CASCADE;";
            $stmt3 = $this->db->prepare($query3);
            $stmt3->execute();

            $query4  = "ALTER TABLE carrello_" .$username. "
                        MODIFY id_productCart int(11) NOT NULL AUTO_INCREMENT";
            $stmt4 = $this->db->prepare($query4);
            $stmt4->execute();
        }

        public function addToCart($username, $id_prodotto){
            if(!$this->existCart($username)){
                $this->createCart($username);
            }
            $query = "SELECT id_prodotto FROM carrello_".$username." WHERE id_prodotto = ".$id_prodotto;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            if(empty($result)){
                $query2 = "INSERT INTO carrello_".$username." (`id_prodotto`, `quantità`) VALUES (".$id_prodotto.", 1)";
                $stmt2 = $this->db->prepare($query2);
                $stmt2->execute();
            }else{
                if($this->isQuantityAvailable($username, $id_prodotto)){
                    $query3 = "UPDATE carrello_".$username." SET quantità=quantità+1 WHERE id_prodotto = ".$id_prodotto;
                    $stmt3 = $this->db->prepare($query3);
                    $stmt3->execute();
                }
            }            
        }

        public function isQuantityAvailable($username, $id_prodotto){
            $queryTemp = "SELECT quantità FROM carrello_".$username." WHERE id_prodotto = ".$id_prodotto;
            $stmtTemp = $this->db->prepare($queryTemp);
            $stmtTemp->execute();
            $resultTemp = $stmtTemp->get_result()->fetch_all(MYSQLI_ASSOC);

            if($resultTemp[0]['quantità'] < $this->getProductQuantity($id_prodotto)[0]['quantità']) {
                return true;
            }else{
                return false;
            }

            
        }

        public function removeFromCart($idProdotto, $username){
            $stmt = $this->db->prepare("DELETE FROM carrello_".$username." WHERE id_prodotto = ".$idProdotto);
            if($stmt !== false){
                $stmt->execute();
            }
            if($this->isCartEmpty($username)){
                $this->destroyCart($username);
            }
        }

        public function removeOneFromCart($idProdotto, $username){
            $query = "SELECT quantità FROM carrello_".$username." WHERE id_prodotto = ".$idProdotto;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            if($result[0]['quantità']>1){
                $query2 = "UPDATE carrello_".$username." SET quantità=quantità-1 WHERE id_prodotto = ".$idProdotto;
                $stmt2 = $this->db->prepare($query2);
                $stmt2->execute();
            }else{
                $this->removeFromCart($idProdotto, $username);
            }            
        }

        public function destroyCart($username){
            $query = "DROP TABLE IF EXISTS carrello_".$username;
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }

        public function getCart($username){
            if($this->existCart($username)){
                $query = "SELECT carrello_".$username.".id_prodotto, carrello_".$username.".quantità, prodotti.Modello, prodotti.Marca, prodotti.Colore, prodotti.Memoria, prodotti.Prezzo, prodotti.id_venditore, prodotti.percorsoImmagine
                        FROM carrello_".$username."
                        INNER JOIN prodotti ON carrello_".$username.".id_prodotto=prodotti.id_prodotto";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();

                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        public function isCartEmpty($username){
            if($this->existCart($username)){
                $query = "SELECT COUNT(*) FROM carrello_".$username;
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                if($result[0]["COUNT(*)"]>0){
                    return false;
                }else{
                    return true;
                }
            }
        }

        public function getCartPrice($username){
            if($this->existCart($username)){
                $query = "SELECT id_prodotto FROM carrello_".$username;
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                $totPrice = 0;

                foreach ($result as $prodotto) {
                    $query2 = "SELECT prodotti.prezzo 
                                FROM prodotti
                                INNER JOIN carrello_".$username." ON prodotti.id_prodotto=carrello_".$username.".id_prodotto
                                WHERE carrello_".$username.".id_prodotto=".$prodotto['id_prodotto'];
                    $stmt2 = $this->db->prepare($query2);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
                    
                    $query3 = "SELECT quantità FROM carrello_".$username." WHERE id_prodotto = ".$prodotto['id_prodotto'];
                    $stmt3 = $this->db->prepare($query3);
                    $stmt3->execute();
                    $result3 = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

                    $totPrice = $totPrice + ($result2[0]['prezzo']*$result3[0]['quantità']);
                }
                return $totPrice;
            }
        }

        //Altro

        public function sendHelp($mail, $text){
            $query = "INSERT INTO richieste_aiuto (`eMail`, `testo`, `data`) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $dateTemp = date('Y-m-d');
            $stmt->bind_param('sss', $mail, $text, $dateTemp);
            $stmt->execute();
        }

        public function buy($username){
            $temp = $this->getCart($username);
            foreach ($temp as $prodotto) {
                $query = "UPDATE prodotti SET quantità=quantità-".$prodotto['quantità']." WHERE id_prodotto = ".$prodotto['id_prodotto'];
                $stmt = $this->db->prepare($query);
                $stmt->execute();
            }
            
            $culo = $this->getCartPrice($_SESSION['username']);
            $this->destroyCart($username);
            
            $query2 = "SELECT MAX(n_ordine) FROM `ordini`";
            $stmt2 = $this->db->prepare($query2);
            $stmt2->execute();
            $result = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

            foreach ($temp as $prodotto) {
                $query3 = "INSERT INTO ordini (`n_ordine`, `id_cliente`, `id_prodotto`, `quantità`) VALUES (".($result[0]['MAX(n_ordine)']+1).", ".$_SESSION['id_cliente'].", ".$prodotto['id_prodotto'].", ".$prodotto['quantità'].")";
                $stmt3 = $this->db->prepare($query3);
                $stmt3->execute();

                $query5 = "INSERT INTO `notifiche_venditori`(`id_venditore`, `Testo`) VALUES ( ".$prodotto['id_venditore'].", 'Ordine n° ".($result[0]['MAX(n_ordine)']+1).", effettuato in data ".date('Y-m-d')." da ".$_SESSION['username'].", con un costo totale di ".($prodotto['Prezzo']*$prodotto['quantità'])." €')";
                $stmt5 = $this->db->prepare($query5);
                $stmt5->execute();  
            }

            $query4 = "INSERT INTO `notifiche_clienti`(`id_cliente`, `Testo`) VALUES ( ".$_SESSION['id_cliente'].", 'Conferma ordine n° ".($result[0]['MAX(n_ordine)']+1).", effettuato in data ".date('Y-m-d').", con un costo totale di ".$culo." €')";
            $stmt4 = $this->db->prepare($query4);
            $stmt4->execute();
            
            foreach ($this->getProduct() as $prodotto){
                if($prodotto['quantità'] == 0){
                    $query6 = "UPDATE prodotti SET attivo=0 WHERE id_prodotto = ".$prodotto['id_prodotto'];
                    $stmt6 = $this->db->prepare($query6);
                    $stmt6->execute();
                    $query7 = "INSERT INTO `notifiche_venditori`(`id_venditore`, `Testo`) VALUES (".$prodotto['id_venditore'].", 'Il prodotto ".$prodotto['Marca']." ".$prodotto['Modello']." è SOLD OUT!' )";
                    $stmt7 = $this->db->prepare($query7);
                    $stmt7->execute();
                }
            }
        }
    }
?>