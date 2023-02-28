<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">ACCUEIL</h1>
    <h2 class="mb-5">Ajouter une sous-catégorie</h2>
        <form action="../controllers/add_Scategorie.php" method="POST">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label class="form-label">Catégorie parente</label>
            <select class="form-select mb-3" aria-label="Default select example">
            <?php
            foreach($categories as $categorie){?>
                <option><?=$categorie['name'];?></option>
            <?php
            }
            ?>
            </select>
            <button class="btn btn-primary" type="submit" name="addSCategorie" >Ajouter</button>
        </form>

<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>