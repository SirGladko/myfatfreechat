<form action="" method="POST">
    <input class="logininput" name="login" placeholder="Login" type="text" maxlength="<?= ($login_len) ?>" required autofocus>
    <input class="logininput" name="passw" placeholder="Password" type="password" maxlength="<?= ($passw_len) ?>" required>
    <div class="mg-b-20 error"><?= ($loginErr) ?></div>
    <div class="tooltipx">
        <img class="tip" src="ui/images/tip.png">
        <span class="tooltiptextx">Logujesz sie na czat o podanej nazwie z podanym hasłem. Jeżeli chcesz się zalogować na czat domyślny, zostaw pole czatu puste.</span>
    </div>
    <input class="logininput tipbox" name="chat" placeholder="Chat name" type="text" maxlength="<?= ($chat_len) ?>" >
    <input class="logininput mg-b-20" name="chatpassw" placeholder="Chat password" type="password" maxlength="<?= ($chat_passw_len) ?>">
    <p class="mg-b-20 error"><?= ($chatErr) ?></p>
    <button class="btn mg-b-10" name="submitek" type="submit">Log in</button>
</form>
<a href="register" class="vanilla mg-t-10"><button class="btn">Register</button></a>