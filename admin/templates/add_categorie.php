<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">Ajouter</h1>
    <section class="d-flex justify-centent-between gap-5 w-100">
    <div class="w-50">
        <h2 class="mb-5">Ajouter une catégorie</h2>
        <form action="index.php?action=addCategorie" method="POST">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label for="formFile" class="form-label">Ajouter une image à la catégorie</label>
            <input class="form-control mb-3" type="file" id="formFile">
            <input type="text" class="form-control mb-3" placeholder="Nom de l'image" name="picName">
            <button class="btn btn-primary" type="submit" name="addCategorie" >Ajouter</button>
        </form>
    </div>
    <div class="w-50">
        <h2 class="mb-5">Ajouter une sous-catégorie</h2>
        <form action="" method="POST">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label class="form-label">Catégorie parente</label>
            <select class="form-select mb-3" aria-label="Default select example">
            <?php
            foreach($categories as $categorie){?>
                <option><?=$categorie;?></option>
            <?php
            }
            ?>
            </select>
            <button class="btn btn-primary" type="submit" name="addSCategorie" >Ajouter</button>
        </form>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>