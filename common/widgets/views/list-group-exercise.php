<? foreach ($model as $item): ?>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <a href="/admin/exercise/index?group_id=<?= $item->id?>">
                <div class="panel-body">

                </div>
            </a>

            <div class="panel-heading">
                <h3 class="panel-title"><?= $item->name?></h3>
            </div>
        </div>
    </div>
<? endforeach; ?>