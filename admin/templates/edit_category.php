<?php $title = "Modifier"; ?>
<?php ob_start();?>

    <h1 class="mb-5"><a href="../public/index.php?page=category" class="btn btn-secondary me-3">Retour</a>Modifier</h1>
    <h3 class="text-success"><?=$msg?></h3>
    <section class="d-flex justify-centent-between gap-5 w-100">
    <div class="w-50">
        <h2 class="mb-5">Modifier une catégorie</h2>
        <form action="../public/index.php?page=validate_edit_category&id=<?php echo $categorie['id']?>" method="POST" enctype="multipart/form-data">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name" value=<?=$categorie['name']?>>
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"><?=$categorie['description']?></textarea>
            <label for="formFile" class="form-label">Changer l'image</label>
            <input class="form-control mb-3" type="file" name="picture">
            <button class="btn btn-primary" type="submit" name="editCategorie">Valider</button>
        </form>
        <?= $msg ?>
    </div>
    <div class="w-50">
    </div>
    
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>