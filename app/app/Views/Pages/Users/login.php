<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GERIMOS : Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">    
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <section id="login-container">
        <div class="card" style="width:400px;border-radius:7px">
            <div class="card-image">
                <figure class="image">
                    <img src="/assets/img/logo.svg" alt="GERIMOS">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="is-size-4 has-text-centered">Login</div>
                </div>
                <?php
                if(isset($validation)) {
                ?>
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <?=$validation->listErrors()?>
                </div>
                <?php
                }
                if(session()->get('error')!='') {
                ?>
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <?=session()->get('error')?>
                </div>
                <?php
                }
                ?>                
                <div class="content">
                    <form action="/login" method="post">
                        <div class="field">
                            <p class="control has-icons-left">
                                <input type="text" name="cpf" class="input" placeholder="Seu CPF" value="<?= set_value('cpf') ?>">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input type="password" name="password" class="input" placeholder="Sua senha">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox"> Manter logado
                            </label>                    
                        </div>
                        <div class="field">
                            <button type="submit" class="button is-fullwidth is-info"> Acessar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>