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
  <section class="lot-item container">
      <?php if (isset($lot)): ?>
    <h2><?=htmlspecialchars($lot['title']); ?></h2>

    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?=htmlspecialchars($lot['path']); ?>" width="730" height="548" alt="Сноуборд">
        </div>
        <p class="lot-item__category">Категория: <span><?=htmlspecialchars($lot['name']); ?></span></p>
        <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
          снег
          мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
          снаряд
          отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
          кэмбер
          позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
          просто
          посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
          равнодушным.</p>
      </div>
 <?php else:?>
        <h2>Такого лота нет </h2>
        <?php endif;?>
      <div class="lot-item__right">
          <?php if (!isset($_SESSION['user'])): ?>
            <div class="not-user"></div>
          <?php else :  ?>
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
              <?= time_lot();?>
</div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?=format_number(htmlspecialchars($lot['now_price'])); ?></span>
            </div>

            <div class="lot-item__min-cost">
                Мин. ставка <span>12 000 р</span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
          <?endif;?>
        <div class="history">
          <h3>История ставок (<span>10</span>)</h3>
          <table class="history__list">
            <tr class="history__item">
              <td class="history__name">Иван</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">5 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Константин</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">20 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Евгений</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">Час назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Игорь</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 08:21</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
