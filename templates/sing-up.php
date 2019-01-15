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
    <form class="form container <?php if((count($errors ) > 0)){print('form--invalid');}?>" action="sing-up.php" method="POST" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Регистрация нового аккаунта</h2>
        <?php $classname = isset($errors['email']) ? 'form__item--invalid' : '';
        $value = isset($form['email']) ? $form['email'] : '';?>
        <div class="form__item <?=$classname?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$value?>">
            <span class="form__error"><?=$errors['email']?></span>
        </div>
        <?php $classname_pas = isset($errors['password']) ? 'form__item--invalid' : '';
        $value = isset($form['password']) ? $form['password'] : '';?>
        <div class="form__item <?=$classname_pas?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$value?>">
            <span class="form__error"><?=$errors['password']?></span>
        </div>
        <?php $classname_name = isset($errors['name']) ? 'form__item--invalid' : '';
        $value = isset($form['name']) ? $form['name'] : '';?>
        <div class="form__item <?=$classname_name?>">
            <label for="name">Имя*</label>
            <input id="name" type="text" name="name" placeholder="Введите имя" value="<?=$value?>">
            <span class="form__error"><?=$errors['name']?></span>
        </div>
        <div class="form__item">
            <label for="message">Контактные данные*</label>
            <textarea id="message" name="message" placeholder="Напишите как с вами связаться" ></textarea>
            <span class="form__error">Напишите как с вами связаться</span>
        </div>
        <div class="form__item form__item--file form__item--last">
            <label>Аватар</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Зарегистрироваться</button>
        <a class="text-link" href="login.php">Уже есть аккаунт</a>
    </form>
</main>