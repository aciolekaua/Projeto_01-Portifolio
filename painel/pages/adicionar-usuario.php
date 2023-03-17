<?php 
verificarPermissaoPag(2); ?>
<h2>Efetue o Login:</h2>
    <form method="post">
        <input type="text" name="user" placeholder="Login..." required />
        <input type="password" name="password" placeholder="Senha..." required />
        <input type="submit" name="acao" value="Logar!" />
    </form>