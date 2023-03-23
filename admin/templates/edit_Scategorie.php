<?php $title = "Modifier"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">MODIFIER</h1>
    <h2 class="mb-5"><a href="../public/index.php?page=sub_categorie" class="btn btn-secondary me-3">Retour</a>Modifier la sous-catégorie</h2>
        <form action="../public/index.php?page=validate_edit_subCategorie&id=<?php echo $subcategorie['id']?>" method="POST">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name" value=<?=$subcategorie['name']?>>
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"><?=$subcategorie['description']?></textarea>
            <label class="form-label">Catégorie parente</label>
            <select class="form-select mb-3" aria-label="Default select example" name='id_cat'>
            <?php
            foreach($categories as $categorie){?>
                <option value='<?=$categorie['id']?>'><?=$categorie['name'];?></option>
            <?php
            }
            ?>
            </select>
            <button class="btn btn-primary" type="submit" name="addSCategorie">Valider</button>
        </form>
        <?= $msg ?>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>