<?php
    //Si le membre possède une image, on l'affiche
    if (file_exists('auth-photos/'.$id.'.jpg')){
    echo '<img class="avatar" style="float:left;" alt="avatar" src="auth-photos/'.$id.'.jpg"/>';
    }
    ?>
    <ul>
    <li><a href="auth-user.php">Accueil</a></li>
    <li><a href="auth-modifier.php">Modifier votre profil</a></li>
    <?php
    //partie visible que par l'admin
    if($statut==1){
    echo '<li><a href="auth-admin.php">Administration</a></li>';
    }
    ?>
    <li><a href="index.php?dec=close">Déconnexion</a></li>
    </ul>
 
    <div class="ok">Bienvenu « <?php echo utf8_encode($pseudo);?> ». Identifiant : « <?php echo $id;?> »</div>