<main id="CentroAssistenza">
    <section>
        <section>
            <h2>Orari</h2>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </section><section>
            <h2>Contattaci</h2>

                <?php if(isset($templateParams["errore"])): ?>
                    <p><?php echo $templateParams["errore"]; ?></p>
                <?php endif; ?>

            <form action="#" method="POST">
                <label for="mail">Inserire Email:  <input type="email" name="mail" id="mail"></label>
                <label for="text">Testo del messaggio:  <textarea name="text" id="text" cols="30" rows="10"></textarea></label>
                <label><input type="submit" name="submit" value="Invia"></label>
            </form>
        </section>
    </section>
</main>