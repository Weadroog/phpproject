
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
  </nav>

  <form class="form form--add-lot container <?php if((count($errors ) > 0)){print('form--invalid');}?>" action=add.php method="POST" enctype=multipart/form-data> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two ">
     <?php $classname = isset($errors['Название']) ? 'form__item--invalid' : '';
     $value = isset($lot['lot-name']) ? $lot['lot-name'] : '';?>
      <div class="form__item  <?=$classname?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input  id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"  value="<?=$value?>">
        <span class="form__error"><?=$errors['Название']?></span>
      </div>
        <?php $classname_cat = isset($errors['Категория']) ? 'form__item--invalid' : '';
        $value_cat = isset($lot['category']) ? $lot['category'] : '';?>
      <div class="form__item <?=$classname_cat?>">
        <label for="category">Категория</label>
        <select id="category" name="category" ">
          <option>Выберите категорию</option>
          <option value="1">Доски и лыжи</option>
          <option value="2">Крепления</option>
          <option value="3">Ботинки</option>
          <option value="4">Одежда</option>
          <option value="5">Инструменты</>
          <option value="6">Разное</option>
        </select>
        <span class="form__error"><?=$errors['Описание']?></span>
      </div>
    </div>
      <?php $classname_disc = isset($errors['Описание']) ? 'form__item--invalid' : '';
      $value_disc = isset($lot['message']) ? $lot['message'] : '';?>
    <div class="form__item form__item--wide <?=$classname_disc?>">

      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$value_disc?></textarea>
      <span class="form__error"><?=$errors['Описание']?></span>
    </div>
      <?php $classname_file = isset($errors['file']) ? 'form__item--invalid' : '';
      $value_file = isset($lot['file']) ? $lot['file'] : '';?>
    <div class="form__item form__item--file "> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>

      <div class="form__input-file <?=$classname_file?>">
        <input class="visually-hidden" type="file" name="lot_img" id="photo2" value="<?=$value_file?>">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
        <?php $classname_price = isset($errors['Начальная цена']) ? 'form__item--invalid' : '';
        $value_price = isset($lot['lot-rate']) ? $lot['lot-rate'] : '';?>
      <div class="form__item form__item--small <?=$classname_price?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$value_price?>">
        <span class="form__error"><?=$errors['Начальная цена']?></span>
      </div>
        <?php $classname_step = isset($errors['Шаг ставки']) ? 'form__item--invalid' : '';
        $value_step = isset($lot['lot-step']) ? $lot['lot-step'] : '';?>
      <div class="form__item form__item--small <?=$classname_step?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$value_step?>" >
        <span class="form__error"><?=$errors['Шаг ставки']?></span>
      </div>
        <?php $classname_date = isset($errors['Дата окончания торгов торгов']) ? 'form__item--invalid' : '';
        $value_date = isset($lot['lot-date']) ? $lot['lot-date'] : '';?>
      <div class="form__item <?=$classname_date?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$value_date?>">
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>