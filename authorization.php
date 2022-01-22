<?php
require("connectdb.php");


$content = '
            <div class="search-form">
            
                <form method="POST" action="auth.php">
                <h1 class = "heading">Авторизация</h1>
                    <div>
                        <label>Логин </label>
                        <input type="text" class = "fortext" name="login" />
                    </div>
                    <div>
                        <label>Пароль</label>
                        <input type="password" class = "fortext" name="password" />
                    </div>
                        <button type="submit">Войти</button> <a href="/signup.php">Регистрация</a>
                </form>
            </div>
';
require("template.php");
?>