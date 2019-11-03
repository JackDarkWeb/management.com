<?$title_for_site = 'Tous nos annonces'?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => 'Tous nos annonces'])?>

<section class='pb-5'>

    <div class='container'>
        <div class='row my-4'>
            <h2 class=''>Tous les annonces</h2>
        </div>

        <?if(isset($announces)):?>

        <div class="card-deck">
            <? foreach ($announces as $item):?>
                <div class="card">
                    <a href="<?=Router::url("announce/read", ['id' => $item->id, "slug" => $item->slug])?>"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?=Router::url("announce/read", ['id' => $item->id, "slug" => $item->slug])?>"><?=$item->title?></a></h5>
                        <p class="card-text"><?=$item->price.'  '.strtoupper($item->devise)?></p>

                        <p class="card-text"><i class="fa fa-folder-open" aria-hidden="true"></i> <a href="/announce/category/<?=$item->category?>"><?=$item->category?></a></p>

                        <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href=''> <?=$item->city?></a></p>

                        <p class="card-text"><i class="fa fa-eye" aria-hidden="true"></i> <?=(new CounterView())->number_views($item->id)?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=Helper::time_ago($item->created_at)?></small>
                    </div>
                </div>
            <? endforeach;?>
        </div>

        <?endif;?>


        <div class="mt-4 count-page" value="<?=2?>">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item before mr-2 rounded <?=(isset($page) && $page === 0) ? 'disabled' : ''?>">
                        <a class="page-link" href="/announce?page=<?=($page-1)?>" tabindex="-1">Précédent</a>
                    </li>

                    <?=Helper::paginate(10);?>

                    <li class="page-item after">
                        <a class="page-link rounded" href="/announce?page=<?=($page+1)?>">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>



    </div>
</section>
<script src="/public/js/announces.js"></script>

<?=ExtendsView::extend('footer')?>
