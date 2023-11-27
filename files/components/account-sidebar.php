<header>
    <nav>
        <div class="user-group">
            <i class="da-icon da-icon--circle-user"></i>
            <p><?php echo $username; ?></p>
            <i class="da-icon da-icon--ellipsis-vertical"></i>
            <div class="popup__inner">
                <a class="link" href="<?= $path ?>admin/logout.php">
                    <i class="da-icon da-icon--right-from-bracket"></i>
                    <p>Logout</p>
                </a>
            </div>
        </div>
        <div class="link-group">
            <a class="link <?php if($page['name']=="dashboard") { echo 'active';} ?>" href="<?= $path ?>admin/content/dashboard.php">
                <i class="da-icon da-icon--house"></i>
                <p>Overview</p>
            </a>
            <a class="link <?php if($page['name']=="analytics") { echo 'active';} ?>" href="<?= $path ?>admin/content/analytics.php">
                <i class="da-icon da-icon--chart-simple"></i>
                <p>Analytics</p>
            </a>
            <a class="link <?php if($page['name']=="projects") { echo 'active';} ?>" href="<?= $path ?>admin/content/projects.php">
                <i class="da-icon da-icon--diagram-project"></i>
                <p>Projects</p>
            </a>
            <a class="link <?php if($page['name']=="settings") { echo 'active';} ?>" href="<?= $path ?>admin/content/settings.php">
                <i class="da-icon da-icon--gear"></i>
                <p>Settings</p>
            </a>
        </div>
    </nav>
</header>