<article class="hreview open special">
    <?php if (empty($reviews)): ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! Keine Reviews gefunden.</h2>
        </div>
    <?php else: ?>
        <?php foreach ($reviews as $review): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $review->benutzername ?></div>
                <div class="panel-body">
                    <p style="color:black;" class="description">Review zum <?= $review->marke ?><a href="mailto:<?= $review->modell; ?>"><?= $review->modell; ?></a></p>
                    <p>
                        <a title="Löschen" href="/user/delete?id=<?= $review->id ?>">Löschen</a>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>