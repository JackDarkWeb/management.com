<?$title_for_site = 'Dashboard'?>

<?if(isset($this->request->action) && $this->request->action === 'dashboard'):?>

    <?=ExtendsView::extend('nav-dashboard', ['title_for_page' => 'Dashboard'])?>

<?else:?>

    <?=ExtendsView::extend('nav-page', ['title_for_page' => 'Dashboard'])?>

<?endif;?>

<div class='container-fluid'>

    <div class='row'>
        <div class='col-md-3 bg-light py-5 font-weight-bold'>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active btn-outline-primary" id="v-pills-home-tab" data-toggle="pill"
                   href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Creer une
                    annonce</a>

                <a class="nav-link btn-outline-primary" id="v-pills-profile-tab" data-toggle="pill"
                   href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                   aria-selected="false">Profile</a>

                <a class="nav-link btn-outline-primary" id="v-pills-messages-tab" data-toggle="pill"
                   href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages
                    <span class="badge badge-success"><?=$count?></span></a>

                <a class="nav-link btn-outline-primary" id="v-pills-settings-tab" data-toggle="pill"
                   href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Liste
                    des annonces <span class="badge badge-success"><?=count($announces)?></span></a>

                <a class="nav-link btn-outline-primary" id="v-pills-messages-tab" data-toggle="pill"
                   href="#v-pills-categories" role="tab" aria-controls="v-pills-messages" aria-selected="false">Categories </a>
            </div>
        </div>

        <div class='col-md-9 my-5 px-5'>

            <div class="tab-content row" id="v-pills-tabContent">
                <div class="tab-pane fade show active col-12" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <div class='row'>
                        <div class='col-sm-10 offset-sm-1 col-md-8 offset-md-2'>
                            <h2 class='row py-5'>Creer une annonce</h2>
                            <div class='row'>

                                <form method="post" class='col-12 mb-5' action='/admin/store' enctype="multipart/form-data">
                                    <p class='font-weight-bold'>Détails de l'annonce</p>
                                    <hr>

                                    <div class="form-group">
                                        <label for="inputAddress">Titre *</label>
                                        <input type="text" name="title" id="title" class="form-control" id="inputAddress"
                                               placeholder="Titre de l'annonce" value="<?=$this->post('title')?>">

                                        <span class="text-danger error-title font-italic"><?= $this->error("title")?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exSelect">Categorie *</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value=''>-Choisir une categorie-</option>
                                            <option value=''>EMPLOI</option>
                                            <option value=''>SERVICES</option>
                                            <option value=''>Cours & Formation</option>
                                            <option value=''>MATÉRIEL PROFESSIONNEL</option>
                                            <option value=''>ACHAT - VENTE</option>
                                            <option value=''>Immobilier</option>
                                            <option value=''>Véhicules</option>
                                            <option value=''>Electronique-Média</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="SelectType">Type Annonceur</label>
                                        <select name="type" id="type" class="form-control" id="SelectType">
                                            <option value=''>-Aucun-</option>
                                            <option value=''>Particulier</option>
                                            <option value=''>Entreprise</option>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputPrice">Prix</label>
                                            <input type="text" name="price" id="price" class="form-control" id="inputPrice">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDevise">Devise</label>
                                            <select name="devise" id="devise" class="form-control">
                                                <option value='' selected>CFA</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ControlTextarea">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" style="<?= ($this->error('description')) ? "border-color : red" : ''?>"></textarea>
                                    </div>

                                    <p class='font-weight-bold'>Details Contact</p>
                                    <hr>

                                    <div class="form-group">
                                        <label for="inputAddress">Addresse</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                               placeholder="1234 Rue principal">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="InputCountry">Pays</label>
                                            <select name="country" class="form-control" id="country">
                                                <option value=''>-Choisir un pays-</option>
                                                <option value=''>Benin</option>
                                                <option value=''>Mali</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Ville</label>
                                            <select id="inputState" class="form-control">
                                                <option>-Choisir une vile-</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone">Numero de telephone *</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               placeholder="Votre numero de telephone">
                                    </div>

                                    <p class='font-weight-bold'>Media</p>
                                    <hr>

                                    <div class="form-row" id='mediaFile'>
                                        <div class='form-group col-auto'>
                                            <input type="file" name="file[]" class="form-control-file" id="ControlFile1">
                                            <label for='ControlFile1'><i class="fa fa-plus" style='font-size: 70px;'
                                                                         aria-hidden="true"></i></label>
                                        </div>
                                        <div class='form-group col-auto'>
                                            <input type="file" name="file[]" class="form-control-file" id="ControlFile2">
                                            <label for='ControlFile2'><i class="fa fa-plus" style='font-size: 70px;'
                                                                         aria-hidden="true"></i></label>
                                        </div>
                                        <div class='form-group col-auto'>
                                            <input type="file" name="file[]" class="form-control-file" id="ControlFile3">
                                            <label for='ControlFile3'><i class="fa fa-plus" style='font-size: 70px;'
                                                                         aria-hidden="true"></i></label>
                                        </div>
                                        <div class='form-group col-auto'>
                                            <input type="file" name="file[]" class="form-control-file" id="ControlFile4">
                                            <label for='ControlFile4'><i class="fa fa-plus" style='font-size: 70px;'
                                                                         aria-hidden="true"></i></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                J'accepte les termes and conditions
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" name="share" class="btn btn-primary mb-5"><i class="fa fa-plus"
                                                                                          aria-hidden="true"></i>
                                        Publier l'annonce
                                    </button>
                                    <button type="reset" class="btn btn-danger mb-5">Annuler</button>
                                    <button type="submit" class="btn btn-dark mb-5">Enregister</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                    <div class="d-inline">
                        <p>
                            <img src="<?=assets('images.profile')?>" style="width:30px; height: 30px; border-radius: 50%">
                            <strong>Root (<?=$_SESSION['email']?>)</strong><br/>
                        </p>
                    </div>
                </div>

                <!-- Messages -->
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                    <?foreach ($messages as $message):?>
                        <div class=" mt-5 row">

                            <div class="content-message-contact mt-4">

                                <div class="d-inline">
                                    <p>
                                        <img src="<?=assets('images.profile')?>" style="width:30px; height: 30px; border-radius: 50%">
                                        <strong><?=$message['first'].' '.$message['last'].' '.'('.$message['email'].')'?></strong><br/>
                                        <span><?=$message['message']?></span><br/>
                                        <i class="text-primary"><?=$message['date']?></i>
                                    </p>
                                </div>
                                <span class="row btn btn-success" style="font-size: medium; cursor: pointer" id="answer" value="<?=$message['id']?>">Repondre</span>
                            </div>

                            <!-- Form answer message -->
                            <div class='col-lg-6 offset-lg-3 d-none mt-4 form-<?=$message['id']?>'>

                                <div class="result"></div>

                                <?= ($this->message_flash('message')) ? $this->message_flash('message') : ''?>
                                <div class='row '>
                                    <form method="post" class='col-12' action='' id="form-contact-<?=$message['id']?>">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="first_name" id="first-name" class="form-control first-name-<?=$message['id']?>" placeholder="Votre Prenom" value="">
                                                <span class="text-danger error-first-name font-italic font-"><?= $this->error("first_name")?></span>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="last_name" id="last-name" class="form-control last-name-<?=$message['id']?>" placeholder="Votre Nom" value="">
                                                <span class="text-danger error-last-name font-italic"><?= $this->error("last_name")?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label ></label>
                                            <input type="email" name="email" class="form-control email-<?=$message['id']?>" id="email" placeholder="name@example.com" value="">
                                            <span class="text-danger error-email font-italic"><?= $this->error("email")?></span>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control subject-<?=$message['id']?>" id="subject" placeholder="Quel est le sujet du message?" value="">
                                            <span class="text-danger error-subject font-italic"><?= $this->error("subject")?></span>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder='Votre Message' id="message" rows="3" style="<?= ($this->error('message')) ? "border-color : red" : ''?>"></textarea>
                                        </div>

                                        <button type="submit"  name="submit" class='btn btn-dark text-uppercase px-4'>Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>

                </div>

                <!-- All announces -->


                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                     aria-labelledby="v-pills-settings-tab">

                    <?foreach ($announces as $announce):?>
                        <div class="card ">
                            <h5 class="card-header"><?=$announce->category?></h5>
                            <div class="card-body">
                                <h5 class="card-title"><?=$announce->title?></h5>
                                <p class="card-text"><?=$announce->description?></p>


                                <a href="#" class="btn btn-danger text-uppercase font-weight-bold delete" id="delete" onclick="return confirm('Voulez-vous vraiment supprimer ? ')">Supprimer</a>
                                <a href="<?=$announce->active?>" class="btn btn-success text-uppercase font-weight-bold active"><?=(($announce->active == 1)? 'Publier' : 'Désactiver')?></a>
                                <a href="#" class="btn btn-secondary text-uppercase font-weight-bold edit">Editer</a>
                            </div>
                        </div><br/>
                    <?endforeach;?>

                </div>



                <div class="tab-pane fade" id="v-pills-categories" role="tabpanel"
                     aria-labelledby="v-pills-messages-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                               role="tab" aria-controls="pills-home" aria-selected="true">AUDIT INTERNE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                               role="tab" aria-controls="pills-profile" aria-selected="false">ETUDE ECONOMIQUE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                               role="tab" aria-controls="pills-contact" aria-selected="false">FORMATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                               aria-controls="pills-home" aria-selected="true">APPUI ET CONSEIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                               role="tab" aria-controls="pills-profile" aria-selected="false">RECRUTEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                               role="tab" aria-controls="pills-contact" aria-selected="false">CONCEPTION ET
                                MONTAGE</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="card ">
                                <h5 class="card-header">ID annonce</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment (Titre)</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to
                                        additional content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Repellendus aspernatur perspiciatis ipsam laudantium? Iste a illo
                                        quisquam ipsa assumenda quis tempora qui iure sapiente, ipsam cum minima,
                                        nihil, cumque nulla. (Description)</p>

                                    <a href="#" class="btn btn-danger  font-weight-bold">Supprimer</a>
                                    <a href="#" class="btn btn-success  font-weight-bold">Publier</a>
                                    <a href="#" class="btn btn-secondary  font-weight-bold">Editer</a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <div class="card ">
                                <h5 class="card-header">ID annonce</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment (Titre)</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to
                                        additional content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Repellendus aspernatur perspiciatis ipsam laudantium? Iste a illo
                                        quisquam ipsa assumenda quis tempora qui iure sapiente, ipsam cum minima,
                                        nihil, cumque nulla. (Description)</p>

                                    <a href="#" class="btn btn-danger  font-weight-bold">Supprimer</a>
                                    <a href="#" class="btn btn-success  font-weight-bold">Publier</a>
                                    <a href="#" class="btn btn-secondary  font-weight-bold">Editer</a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                             aria-labelledby="pills-contact-tab">
                            <div class="card ">
                                <h5 class="card-header">ID annonce</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment (Titre)</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to
                                        additional content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Repellendus aspernatur perspiciatis ipsam laudantium? Iste a illo
                                        quisquam ipsa assumenda quis tempora qui iure sapiente, ipsam cum minima,
                                        nihil, cumque nulla. (Description)</p>

                                    <a href="#" class="btn btn-danger  font-weight-bold">Supprimer</a>
                                    <a href="#" class="btn btn-success  font-weight-bold">Publier</a>
                                    <a href="#" class="btn btn-secondary  font-weight-bold">Editer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=assets('js.dashboard')?>"></script>

<?=ExtendsView::extend('footer')?>

