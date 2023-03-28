<?php $title = "Ajouter"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5"><a href="../public/index.php?page=sub_category" class="btn btn-secondary me-3">Retour</a>ACCUEIL</h1>
    <h2 class="mb-5">Ajouter une sous-catégorie</h2>
        <form action="index.php?page=validate_add_scategory" method="POST">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label class="form-label">Catégorie parente</label>
            <select class="form-select mb-3" aria-label="Default select example" name='id_cat'>
            <?php
            foreach($categories as $categorie){?>
                <option value='<?=$categorie['id']?>'><?=$categorie['name'];?></option>
            <?php
            }
            ?>
            </select>
            <button class="btn btn-primary" type="submit" name="addSCategorie" >Ajouter</button>
        </form>
        <h3> <?= $msg ?></h3>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>