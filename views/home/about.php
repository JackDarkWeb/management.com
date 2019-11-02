<?$title_for_site = 'About us'?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => 'A Propos de Nous'])?>

<div class='container py-5'>
    <div class='row'>
        <div class='col-lg-6'>
            <img src="/public/images/nastuh-abootalebi-yWwob8kwOCk-unsplash.jpg" class='img-fluid' alt="">
        </div>

        <div class='col-lg-6 text-center mt-5'>
            <h3 class='mb-5 font-weight-bold'>Qui nous sommes?</h3>
            <p style='font-size: 20px;'>Management consulting international est une entreprise de services et conseils en management. Nous leur  fournissons des services d'audit, de management et de conseils stratégiques sur l'ensemble de leurs objectifs.</p>
        </div>
    </div>

    <div class='row py-5'>
        <div class='col-lg-6 text-center mt-5 order-last order-lg-first'>
            <h3 class='mb-5 font-weight-bold'>Ce que nous faisons</h3>
            <p style='font-size: 20px;'>Management consulting international est spécialisé dans le conseil stratégique pour les chefs d'entreprise, 
Intégrant les disciplines d'audit, de la communication stratégique, des relations avec les investisseurs, du conseil numérique, de la diversité et de l'inclusion, du conseil en gestion, du conseil en risques physiques et cybernétiques, du conseil financier, du conseil en gouvernance d'entreprise,  recrutement, formation, montage de business plan, les états financiers et divers ( immobilier et mobilier)</p>
        </div>

        <div class='col-lg-6 order-first order-lg-last'>
            <img src="/public/images/dane-deaner-_-KLkj7on_c-unsplash.jpg" class='img-fluid' alt="">
        </div>
    </div>
</div>

<?=ExtendsView::extend('footer')?>
