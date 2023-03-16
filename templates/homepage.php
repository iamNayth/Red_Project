<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    
<section id="infos" class="position-relative">
    <div class="container-fluid" id="logo-background">
        <div class="row">
            <div class="col-4 d-flex flex-column ps-5 pe-5 gap-5">
                <div class="d-flex align-items-center gap-3 h-25">
                    <img src="../admin/assets/icons/logo-info.svg" class="h-50">
                    <img src="../admin/assets/icons/logotype-white.svg">
                </div>
                <p class="mont fs-4 text-light">Chez Soltech, nous mettons un point d’honneur à ce que nos relations avec nos clients se passe de manière excellente tout au long du processus d’achat.</p>
                <span class="mont fs-3 fw-bold text-light mb-5">C'est pourquoi :</span>
                <div class="w-100 d-flex justify-content-center align-items-center mt-5"><button class="lex">Contactez-nous</button></div>
            </div>
            <div class="col-8">
                <div class="row">

                    <div class="col-6 d-flex justify-content-center flex-column align-items-center">
                        <div class=""><img src="../assets/img/illustration1.png"></div>
                        <p class="mont text-light text-center">Nous évaluons et analysons avec minutie la courbe de prix de nos produit afin de toujours pouvoir proposer le meilleur prix à nos clients.</p>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-center">
                        <div class=""><img src="../assets/img/illustration2.png"></div>
                        <p class="mont text-light text-center">Nous collaborons avec nous équipes et nos partenaires afin d’assurer la meilleure qualité possible de nos produit et qu’ils soient livré sous des délais éclair.</p>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-center">
                        <div class=""><img src="../assets/img/illustration3.png"></div>
                        <p class="mont text-light text-center">Nous avons fait appel au meilleur graphiste et développeur que cette planète à jamais porté afin de concevoir le graal du site e-commerce pour vous offrir la meilleur expérience possible.</p>
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column align-items-center">
                        <div class=""><img src="../assets/img/illustration4.png"></div>
                        <p class="mont text-light text-center">Nous avons choisis le leader du marcher de la livraison à domicile afin de vous livrer le plus rapidement e t le plus efficacement possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>