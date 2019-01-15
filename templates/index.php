

<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $item): ?>
                <?php if ($item['name'] == 'Доски и лыжи'):?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
                <?php endif; ?>
            <?php if ($item['name'] == 'Крепления'):?>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
            <?php endif; ?>
            <?php if ($item['name'] == 'Ботинки'):?>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
            <?php endif; ?>
            <?php if ($item['name'] == 'Одежда'):?>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
            <?php endif; ?>
            <?php if ($item['name'] == 'Инструменты'):?>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
            <?php endif; ?>
            <?php if ($item['name'] == 'Разное'):?>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="index.php?cat_id=<?=$item['id'];?>"><?=$item['name'];?></a>
            </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach ($ads as $key): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$key['path']; ?>" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$key['name']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php<?='?lot_id=' . $key['lot_id']; ?>"><?=$key['title']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=format_number($key['now_price']); ?><!--<b class="rub">р</b> --></span>
                        </div>
                        <div class="lot__timer timer">
                            <span class="time"><?= time_lot();?></span>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>