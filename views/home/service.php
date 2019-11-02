<?$title_for_site = 'Nos Services'?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => 'Nos Services'])?>

    <section class='' id='our-services'>
        <div style='background: rgba(0,0,0,0.3)' class='py-5'>
            <div class='container'>
                <div class=''>
                    <h2 class='text-uppercase font-weight-bold text-white text-center'>Nos Services</h2>
                    <hr class='w-25 bg-primary my-4' style=''>
                </div>
 

                <div class="card-deck">
                    <div class="card mb-3">
                        <img src="/public/images/1646617.svg" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">AUDIT INTERNE</h5>
                        <p class="card-text text-center">Elle est une activité indépendante et objective qui permet de donner à une organisation une assurance sur le degré de maîtrise de ses opérations, lui apporte ses conseils pour les améliorer, et contribue à créer de la valeur ajoutée.</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <img src="/public/images/imgbin-internal-audit-internal.png" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">ETUDE ECONOMIQUE</h5>
                        <p class="card-text text-center">Elle consiste à réaliser pour des organisations des études, évaluations d’ordre économique et social comme les enquêtes, les études de marché.</p>
                        </div>
                    </div>

                    <div class='w-100 d-lg-none'></div>

                    <div class="card mb-3">
                        <img src="/public/images/icon-accompagne-1-1.png" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">APPUI ET CONSEIL</h5>
                        <p class="card-text text-center">Nous assistons les entreprises et autres en conseil, installation du système comptable.</p>
                        </div>
                    </div>

                    <div class='w-100  d-none d-lg-block'></div>

                    <div class="card mb-3">
                        <img src="/public/images/Queoval-Formation-Icon.png" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">FORMATION</h5>
                        <p class="card-text text-center">Nous sommes spécialisés dans la formation en gestion et finance. La formation en management, entreprenariat, logiciel comptable, plan d’affaires (business plan).</p>
                        </div>
                    </div>

                    <div class='w-100 d-lg-none'></div>
                    
                    <div class="card mb-3">
                        <img src="/public/images/oved-je-cherche-un-emploi.png" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">RECRUTEMENT</h5>
                        <p class="card-text text-center">Il consiste à recruter pour les organisations du personnel (employés, stagiaires). Nous sommes également spécialisés dans le placement d’autres types de personnel  </p>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <img src="/public/images/256-256-127fcc1580aab7e738bb360e83168a9d.png" class="card-img-top h-25 w-25 mx-auto mt-3" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">CONCEPTION ET MONTAGE</h5>
                        <p class="card-text text-center">Nous sommes spécialisés dans la conception de mini logiciel comptable adapté aux activités commerciales, agropastorales. Nous sommes également spécialisés dans le montage des plans d’affaires, projets, établissement des Etats financiers </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='py-5' id='flyer-contact' style='background: #0B173B;'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-6 border border-light pb-4 mb-4'>
                    <div class='row my-4'>
                        <h3 class='text-center mx-auto text-white'>Besoin d'un conseil, d'un accompagnement ? Nous sommes là!</h3>
                    </div>
                    <div class='row'>
                    <p class='text-center text-white mx-auto'>Nous restons toujours à votre disposition</p>
                    </div>

                    <div class='row'>
                        <a href='/contact' class='btn btn-md p-md-2 px-md-4 btn-outline-info mx-auto font-weight-bold'>Contactez-nous maintenant</a>
                    </div>
                </div>
                <div class='col-md-6 border border-light pb-4 mb-4'>
                    <div class='row my-4'>
                        <h3 class='text-center mx-auto text-white'>A la recherche d'une opportunité d'affaire ou d'un besoin particulier ?</h3>
                    </div>
                    <div class='row'>
                    <p class='text-center text-white mx-auto'>Consultez des milliers d'annonces maintenant</p>
                    </div>

                    <div class='row'>
                        <a href='/announce/recent' class='btn btn-md py-md-2 px-md-4 btn-outline-info mx-auto font-weight-bold'>Consulter les annonces</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?=ExtendsView::extend('footer')?>