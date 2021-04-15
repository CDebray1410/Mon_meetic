<header>
    <h1>My Meetic</h1>
    <nav>
        <?php if ($menu == 0) {
            ?>
            <ul>
                <li><a href="index.php?action=inscriptionForm" class="page__nav__noroll">Inscription</a></li>
                <li><a href="index.php?action=connectionForm" class="page__nav__noroll">Connexion</a></li>
            </ul>
            <?php
        } else { ?>
            <ul class="page__nav">
                <li class="dropdown">
                <span>Navigation</span>
                <ul class="dropdown__content">
                <?php
                if (!isset($_SESSION['first_name'])) {
                    ?>
                    <li><a href="index.php?action=inscriptionForm" class="page__nav__link">Inscription</a></li>
                    <li><a href="index.php?action=connectionForm" class="page__nav__link">Connection</a></li>
                    <?php
                } else {
                    ?>
                        <li><a href="index.php?action=my_account" class="page__nav__link">Mon compte</a></li>
                        <li><a href="index.php?action=researchForm" class="page__nav__link">Rechercher</a></li>
                        <li><a href="index.php?action=chatroom" class="page__nav__link">Chatroom</a></li>
                        <li class="text_center"><a href="index.php?action=disconnect" class="page__nav__link"><img src="public/images/disconnect.png" alt="disconnect button"></a></li>
                    <?php
                }
                ?>
                </ul>
                </li>
            </ul>
        <?php } ?>
    </nav>
</header>