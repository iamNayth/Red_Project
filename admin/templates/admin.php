<?php $title = "Admin"; 
$msg = "";?>
<?php ob_start(); ?>
    <h1 class="mb-5">ADMIN</h1>
    <h2 class="mb-5">Tout les admins</h2>
    <table class="table mb-5" style="margin-top: 15px; width:100%">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th class="col-2 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach($admins as $admin){?>
        <tr class="table-striped">
            <td><?=$admin['id']?></td>
            <td><?=$admin['nickname']?></td>
            <td><?=$admin['email']?></td>
            <td><a href="index.php?page=admin&id=<?php echo $admin['id']?>" class="btn btn-danger w-100" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));">Supprimer</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<h2 class="mb-5">Ajouter</h2>
<form action="../controllers/admin.php" method="POST">
    <label class="form-label">Nickname</label>
    <input type="text" class="form-control mb-3" placeholder="Nom" name="nickname">
    <label class="form-label">Email</label>
    <input type="email" class="form-control mb-3" placeholder="name@exemple.com" name="email">
    <label class="form-label">Mot de passe</label>
    <input type="password" class="form-control mb-3" placeholder="Mot de passe" name="password">
    <button class="btn btn-primary" type="submit" name="addAdmin">Ajouter</button>
</form>
<?= $msg ?>
<?php $content = ob_get_clean();

require('../templates/layout.php');?>