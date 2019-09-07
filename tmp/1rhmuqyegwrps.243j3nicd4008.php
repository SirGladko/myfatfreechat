<form action="" method="POST">
    <input class="logininput" id="input" name="newlogin" placeholder="Login" type="text" maxlength="<?= ($login_len) ?>" required autofocus>
    <input class="logininput" id="input" name="newpassw" placeholder="Hasło" type="password" maxlength="<?= ($passw_len) ?>" required>
    <p class="error mg-b-20"><?= ($registerErr) ?></p>
    <button class="btn" type="submit" name="register">Register</button>
</form>
<a href="login" class="vanilla mg-t-10"><button class="btn">Back to login</button></a>
