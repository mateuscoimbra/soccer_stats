<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/site/index" class="brand-link">
        <img src="/images/owl_stats.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">OWL STATS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?='data:image/jpeg;base64,' . Yii::$app->user->identity->img ?>" class="img-circle elevation-2" alt="User Image"/>
            </div>
            <div class="info">
                <a href="/user/view?id=<?=Yii::$app->user->id?>" class="d-block"><?= !empty(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : "Unauthenticated" ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Player', 'url' => ['/player/index'], 'iconStyle' => 'fas fa-running'],
                    ['label' => 'Soccer match', 'url' => ['/soccer-match/index'], 'iconStyle' => 'far fa-futbol'],
                    ['label' => 'Events soccer match', 'url' => ['/event-soccer-match/index'], 'iconStyle' => 'fas fa-retweet'],
                    [
                        'label' => 'Corporate base',
                        'icon' => 'database',
                        'items' => [
                            ['label' => 'Player position', 'iconStyle' => 'far', 'iconClassAdded' => 'text-secondary', 'url' => ['/player-position/index']],
                            ['label' => 'Types events', 'iconStyle' => 'far', 'iconClassAdded' => 'text-primary', 'url' => ['/types-soccer-match-events/index']],
                            ['label' => 'Club', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger', 'url' => ['/club/index']],
                            ['label' => 'League/competition', 'iconClass' => 'nav-icon far fa-circle text-warning', 'url' => ['/league-competition/index']],
                            ['label' => 'Stadium', 'iconStyle' => 'far', 'iconClassAdded' => 'text-success', 'url' => ['/stadium/index']],
                            ['label' => 'Country', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['/country/index']],
                        ]
                    ],
                    [
                        'label' => 'User management',
                        'icon' => 'fas fa-user-cog',
                        'items' => [
                            ['label' => 'User', 'url' => ['/user/index'], 'iconStyle' => 'fas fa-user-shield'],
                            ['label' => 'Permissions', 'url' => ['/user-permission/permission'], 'iconStyle' => 'fas fa-user-lock'],
                            ['label' => 'Profile', 'url' => ['/user-permission/profile'], 'iconStyle' => 'fas fa-users-cog'],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>