<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $item): ?>
                <?php if ($item['name'] == 'Доски и лыжи'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
                <?php if ($item['name'] == 'Крепления'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
                <?php if ($item['name'] == 'Ботинки'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
                <?php if ($item['name'] == 'Одежда'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
                <?php if ($item['name'] == 'Инструменты'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
                <?php if ($item['name'] == 'Разное'):?>
                    <li class="nav__item">
                        <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
    <form class="form container" action="login.php" method="POST" enctype=multipart/form-data> <!-- form--invalid -->
        <h2>Вход</h2>
        <?php $classname = isset($errors['email']) ? 'form__item--invalid' : '';
        $value = isset($form['email']) ? $form['email'] : '';?>
        <div class="form__item <?=$classname?> "> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$value?>" >
        <?php if ($classname):?>
            <span class="form__error"><?=$errors['email']?></span>
            <?php endif;?>
        </div>
        <?php $classname_pas = isset($errors['password']) ? 'form__item--invalid' : '';
        $value_pas = isset($form['password']) ? $form['password'] : '';?>
        <div class="form__item form__item--last <?=$classname_pas?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль" >
            <?php if ($classname_pas):?>
            <span class="form__error"><?=$errors['password']?></span>
            <?php endif;?>
        </div>
        <button type="submit" class="button">Войти</button>
    </form>
</main>