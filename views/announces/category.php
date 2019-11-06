<?$title_for_site = $categories[0]->category?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => $categories[0]->category])?>

<div class='container pt-5' id='all-annonces'>
    <div class='row'>
        <div class='col-lg-3'>
            <div class='bg-light row mb-5 py-3 '>
                <div class='col-12'>
                    <p class='font-weight-bold'>Recherche par Filtre</p>
                    <div class='row'>

                        <form method="post" class='col-12'  action=''>
                            <div class="form-group">
                                <label for="InputCountry">Localisations</label>
                                <select class="form-control" id="inputCountry">
                                    <option value=''>-Choisir un pays-</option>
                                    <option value='Benin'>Benin</option>
                                    <option value='Burkina-Faso'>Burkina-Faso</option>
                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                    <option value='Guinnée Bisseau'>Guinnée Bisseau</option>
                                    <option value='Guinnée Conakry'>Guinnée Conakry</option>
                                    <option value='Niger'>Niger</option>
                                    <option value='Mali'>Mali</option>
                                    <option value='Sénégal'>Sénégal</option>
                                    <option value='Togo'>Togo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exSelect">Categorie</label>
                                <select class="form-control" id="exSelect">
                                    <option value=''>-Choisir une categorie-</option>
                                    <option value='Récrutement'>Récrutement</option>
                                    <option value='SERVICES'>SERVICES</option>
                                    <option value='Audit-Formation'>Audit & Formation</option>
                                    <option value='MATÉRIEL-PROFESSIONNEL'>MATÉRIEL PROFESSIONNEL</option>
                                    <option value='ACHAT-VENTE'>ACHAT - VENTE</option>
                                    <option value='Immobilier'>Immobilier</option>
                                    <option value='Véhicules'>Véhicules</option>
                                    <option value='Electronique-Média'>Electronique-Média</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SelectType">Type Annonceur</label>
                                <select class="form-control" id="SelectType">
                                    <option value=''>-Aucun-</option>
                                    <option value='Particulier'>Particulier</option>
                                    <option value='Entreprise'>Entreprise</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"  aria-hidden="true"></i> Rechercher</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="list-group bg-light row">
                <p class='font-weight-bold p-3'>Recherche par Catégorie</p>
                <button type="button" class="list-group-item list-group-item-action">
                    <a class="nav-link" href="/announce/category/recrutement">Récrutement</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a class="nav-link" href="/announce/category/services">Services</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a class="nav-link" href="/announce/category/conseils">Conseils</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a class="nav-link" href="/announce/category/audit-formation">Audit & Formation</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a class="nav-link" href="/announce/category/materiel-professionnel">MATÉRIEL PROFESSIONNEL</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a class="nav-link" href="/category/achat-vente">ACHAT - VENTE</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a class="nav-link" href="/category/immobilier">Immobilier</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a class="nav-link" href="/category/vehicules">Véhicules</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a class="nav-link" href="/category/electronique-media">Electronique-Média</a></button>
            </div>
        </div>

        <?if(isset($categories)):?>

            <div class='col-lg-6 px-4'>
                <div class='row'>
                    <div class='col-6'>
                        <h3 class='font-weight-bold row'><?=$categories[0]->category?></h3>
                    </div>

                    <div class='col-6'>
                        <form action="">
                            <div class="form-group">
                                <select class="form-control" id="filter">
                                    <option value=''>De A a Z</option>
                                    <option value='' selected>Dernier Ajout</option>
                                    <option value='price-asc'>Prix (du moins cher au plus cher)</option>
                                    <option value='price-desc'>Prix (du plus cher au plus moins)</option>
                                    <option value='view'>Les plus vues</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class='row'>

                    <?foreach ($categories as $category):?>

                        <div class="card mb-4" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/150" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class='mb-2'>
                                            <h5 class="card-title"><a href="<?=Router::url("announce/read", ['id' => $category->id, "slug" => $category->slug])?>"'><?=$category->title?></a></h5>
                                            <span class="badge badge-primary">Primary</span>
                                            <span class='font-weight-bold'><?=$category->price.'  '.strtoupper($category->devise)?></span>
                                        </div>

                                        <p class="card-text"><?=$category->description?></p>

                                        <div class='d-flex '>
                                            <p class='mr-4'><i class="fa fa-clock-o" aria-hidden="true"></i>  <span class="text-muted"><?=Helper::time_ago($category->created_at)?></span></p>

                                            <p><i class="fa fa-eye" aria-hidden="true"></i> <span class="text-muted"><?=(new CounterView())->number_views($category->id)?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class='row'>

                            <div class='d-flex'>
                                <p class="text-muted mr-4 ml-2"><i class="fa fa-folder-open" aria-hidden="true"></i> <small class="font-weight-bold"><a href=''><?=$category->category?></a></small></p>

                                <p class="font-weight-bold text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="font-weight-bold"><a href='' class=''><?=$category->city?></a></span></p>
                            </div>
                        </div>

                    <?endforeach;?>

                </div>

            </div>

        <?endif;?>

        <div class='col-lg-3 border'>
            <div class='row'>
                <p class='mx-auto'>Espace publicite</p>
            </div>
        </div>
    </div>
</div>



<?=ExtendsView::extend('footer')?>