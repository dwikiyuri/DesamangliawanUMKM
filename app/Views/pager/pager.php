<!-- <ul class="pages">
        <li>
          <a href="#"><i data-feather="chevron-left"></i></a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>
          <a href="#"><i data-feather="chevron-right"></i></a>
        </li>
      </ul> -->

      <?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
<ul class="pages">
    <?php if ($pager->hasPrevious()) : ?>
        <li>
        <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>"><i data-feather="chevron-left"><span aria-hidden="true"><?= lang('Pager.previous') ?></span></i></a>
        </li>
        <li>
            <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?>>
            <a href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li>
            <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.next') ?></span>
            </a>
    </li>
    <?php endif ?>
    </ul>
</nav>