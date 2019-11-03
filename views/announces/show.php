<?$title_for_site = $announce->title?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => 'announce'])?>

<div class='container pt-5' id='all-annonces'>

    <? if(isset($announce)):?>

    <div class='row'>
        <div class='col-lg-6 px-4'>
            <div class='row'>
                <div class='col-6'>
                    <p class='font-weight-bold row'><?=$announce->title?></p>
                </div>

                <div class='col-6'>
                    <p class='text-right'><?=$announce->price.'  '.strtoupper($announce->devise)?></p>
                </div>
            </div>

            <div class='d-flex'>
                <p class="text-muted mr-5"><i class="fa fa-folder-open" aria-hidden="true"></i> <small class="font-weight-bold"><a href="/announce/category/<?=$announce->category?>"><?=$announce->category?></a></small></p>

                <p class="font-weight-bold text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="font-weight-bold"><a href='' class=''><?=$announce->city?></a></span></p>
            </div>

            <div class='row mb-4'>
                <img src="https://via.placeholder.com/150" class="img-fluid w-100 img-thumbnail" alt="...">
            </div>

            <div class='row bg-light p-2 mb-4'>
                <div class='col-12'>
                    <h5><i class="fa fa-pencil-square-o text-muted" aria-hidden="true"></i> <span>Description</span></h5>

                    <hr class='row my-1'>
                    <p class=''><?=$announce->description?></p>
                </div>
            </div>

            <!--<div class='row bg-light p-2 mb-4'>
                <div class='col-12'>
                    <h5><i class="fa fa-pie-chart text-muted" aria-hidden="true"></i> <span>Plus de Détails</span></h5>
                
                    <hr class='row my-1'>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>-->

            <h5 class='row'>Annonces Similaires</h5>

            <hr class='row mt-1 mb-4'>

            <div class="card-deck mb-4">
                <div class="card">
                    <a href="<?=Router::url("announce/read", ['id' => $item->id, "slug" => $item->slug])?>"><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href=/announce/1254789">Card title</a></h5>
                    </div>
                </div>
                <div class="card">
                    <a href=""><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
                <div class="card">
                    <a href=""><img src="https://via.placeholder.com/150" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-lg-3'>
            <div class='bg-light row mb-5 py-3 '>
                <div class='col-12'>
                    <h5 class='font-weight-bold'><i class="fa fa-info-circle" aria-hidden="true"></i> Détails de l'annonce</h5>

                    <p class=""><i class="fa fa-lightbulb-o" aria-hidden="true"></i> ID annonce : <span><?=$announce->code?></span></p>
                    <p class=""><i class="fa fa-folder-open" aria-hidden="true"></i> <?=$announce->category?></p>
                    <p class=""><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$announce->city?></p>
                    <p class=""><i class="fa fa-eye" aria-hidden="true"></i> <?=(new CounterView())->number_views($announce->id)?></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?=Helper::time_ago($announce->created_at)?></p>
                </div>
            </div>
        </div>

        <div class='col-lg-3 border'>
            <div class='row'>
                <p class='mx-auto'>Espace publicite</p>
            </div>
        </div>
    </div>
</div>
<? endif;?>

<?=ExtendsView::extend('footer')?>
