<?$title_for_site = 'Administration'?>

<?=ExtendsView::extend('nav-page', ['title_for_page' => 'Administration'])?>

<div class="">

    <div class="result"></div>
    <?= ($this->message_flash('message')) ? $this->message_flash('message') : ''?>

    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 singin-content px-4">
        <div class="row" style='margin-top: 100px; margin-bottom: 150px;'>
            <div class="col-12 col-md-8 offset-md-2 btn border p-4">



                <div class="row py-4">
                    <h4 class='mx-auto'>Administration </h4>
                </div>
                <div class="row">
                    <p class='mx-auto'>Saisis tes identifiants de connexion.</p>
                </div>
                <div class="row">

                    <form method="post" action="" class="col-sm-12" id="form-login">
                        <div class="form-group row mb-4">
                            <label for="email" class="mr-4">Identifiant</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" name="email_or_phone" class="form-control" id="email" value="<?= $this->post('email_or_phone')?>" placeholder="E-mail ou numéro de téléphone">
                                <span class="text-danger error-email font-italic"><?= $this->error("email_or_phone")?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="">Mot de passe</label>
                            <div class="col-md-8 col-sm-12">
                                <div class='input-group' id="desk">
                                    <input type="password" name="password" class="form-control" id="password" value="<?= $this->post('password')?>" placeholder="Mot de passe">

                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-eye" aria-hidden="true" style="cursor:pointer;" onclick="showHidePassword('#desk #password')"></i><i class="fa fa-eye-slash d-none" aria-hidden="true" style="cursor:pointer;" onclick="showHidePassword('#desk #password')"></i></div>
                                    </div>
                                </div>

                                <span class="text-danger error-password font-italic"><?= $this->error("password")?></span>
                            </div>
                        </div>

                        <div class="singin-btn-validate row">
                            <button type="submit" name="login"  class="btn font-weight-bold btn-primary mx-auto px-4" role="button">Se connecter</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>



<script src="<?=assets('js.admin')?>"></script>

<?=ExtendsView::extend('footer')?>
