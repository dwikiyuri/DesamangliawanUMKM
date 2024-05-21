<div class="row justify-content-center"><ul class="pagination">

<?php foreach ($pager->links() as $link) : ?>
            <li class="paginate_button page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
<!-- <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
<li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
<li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
<li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
<li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
<li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li> -->

<!-- <li class="paginate_button page-item next" id="dataTable_next">   
<a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a> -->
<?php if ($pager->hasNextPage()) : ?>
            <li class="paginate_button page-item next" id="dataTable_next">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>
            <li class="paginate_button page-item next" id="dataTable_next">
                <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
</ul>
</div>

