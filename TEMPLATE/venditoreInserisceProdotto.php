<main id="InsProd">
    <section>
        <h1>Inserisci un nuovo prodotto</h1>
    </section>
    <section>
        <div>
            <form action="#" method="POST" enctype="multipart/form-data">

                <?php if(isset($templateParams["ErrorInsProduct"])): ?>
                    <p><?php echo $templateParams["ErrorInsProduct"]; ?></p>
                <?php endif; ?>

                <label for="modello"> Modello: <input type="text" id="modello" name="modello"></label>
                <label for="marca"> Marca: <input type="text" id="marca" name="marca"></label>
                <label for="colore"> Colore: <input type="text" id="colore" name="colore"></label>
                <label for="memoria"> Memoria: <input type="number" id="memoria" name="memoria"></label>
                <label for="prezzo"> Prezzo: <input type="number" id="prezzo" name="prezzo"></label>
                <label for="quantità"> Quantità: <input type="number" id="quantità" name="quantità"></label>
                <label for="imgarticolo"> Foto del prodotto: <input type="file" name="imgarticolo" id="imgarticolo" /></label>

                <div>
                    <input type="submit" name="submit" value="Invia">
                    <button type="reset" name="reset" value="Pulisci">Pulisci</button>
                </div>

                <?php if(isset($templateParams["InsProdCorrect"])): ?>
                    <p><?php echo $templateParams["InsProdCorrect"]; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </section>
</main>
