<main id="AreaLoginCV">
    <section>
        <h2>AREA CLIENTI</h2>
    </section><section>
        <div>
            <h2>Login</h2>
            <form action="#" method="POST">
                <?php if(isset($templateParams["errorelogin"])): ?>
                    <p><?php echo $templateParams["errorelogin"]; ?></p>
                <?php endif; ?>

                <label for="username">Nome Utente: <input type="text" id="username" name="username" /></label>
                <label for="password">Password: <input type="password" id="password" name="password" /></label>
                <div>
                    <input type="submit" name="submit" value="Invia">
                    <button type="reset" name="reset" value="Pulisci">Pulisci</button>
                </div>
            </form>
        </div><div>
            <h2>Registrazione</h2>
            <form action="#" method="POST">
                <?php if(isset($templateParams["erroreRegister"])): ?>
                    <p><?php echo $templateParams["erroreRegister"]; ?></p>
                <?php endif; ?>
                <label for="nome">Nome: <input type="text" id="nome" name="nome"/></label>
                <label for="cognome">Cognome: <input type="text" id="cognome" name="cognome"/></label>
                <label for="birthDate">Data di Nascita: <input type="date" id="birthDate" name="birthDate"/></label>
                <label for="newUsername">Nome Utente: <input type="text" id="newUsername" name="newUsername"/></label>
                <label for="mail">Email: <input type="text" id="mail" name="mail"/></label>
                <label for="newPassword">Password: <input type="password" id="newPassword" name="newPassword"/></label>
                <label for="confirmPass">Conferma password: <input type="password" id="confirmPass" name="confirmPass"/></label>
                <div>
                    <input type="submit" name="submit" value="Invia">
                    <button type="reset" name="reset" value="Pulisci">Pulisci</button>
                </div>
            </form>
        </div>
    </section>
</main>