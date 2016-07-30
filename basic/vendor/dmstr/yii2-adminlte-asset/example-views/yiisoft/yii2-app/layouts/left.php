<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
<!--                <p>ABG Projekt Manager</p>-->
                <p><?php echo Yii::$app->user->username; ?></p>
                <span><?php

                if (Yii::$app->user->identity) {
                    $roles = Yii::$app->user->identity->getRoles()->all();

                    echo "Rollen: ";
                    foreach ($roles as $key => $role) {
                        echo $role->name . (count($roles) != ($key+1) ? ',' : ''); 
                    }
                }

                ?></span>

            </div>
        </div>

        <!-- search form -->

        <?php
        use webvimark\modules\UserManagement\components\GhostMenu;
        use webvimark\modules\UserManagement\UserManagementModule;
        use webvimark\modules\UserManagement\models\User;
        /*

        echo GhostMenu::widget([
            'encodeLabels'=>false,
            'activateParents'=>true,
            'items' => [
                [
                    'label' => 'Backend routes',
                    'items'=>UserManagementModule::menuItems()
                ],
                [
                    'label' => 'Frontend routes',
                    'items'=>[
                        ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                        ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                        ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                        ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                        ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                        ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                    ],
                ],
            ],
        ]);
        */
        ?>
        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [

                    //['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    //['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                    [
                        'label' => 'Benutzer Verwaltung',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'visible' => User::canRoute('/user-management/user/index', true),
                        'items'=>UserManagementModule::menuItems(),
                        'items' => [
                            ['label' => UserManagementModule::t('back', 'Users'), 'icon' => 'fa fa-angle-double-right', 'url' => ['/user-management/user/index']],
                            ['label' => UserManagementModule::t('back', 'Roles'), 'icon' => 'fa fa-angle-double-right', 'url' => ['/user-management/role/index']],
                            ['label' => UserManagementModule::t('back', 'Permissions'), 'icon' => 'fa fa-angle-double-right', 'url' => ['/user-management/permission/index']],
                            ['label' => UserManagementModule::t('back', 'Permission groups'), 'icon' => 'fa fa-angle-double-right', 'url' => ['/user-management/auth-item-group/index']],
                            ['label' => UserManagementModule::t('back', 'Visit log'), 'icon' => 'fa fa-angle-double-right', 'url' => ['/user-management/user-visit-log/index']],
                        ]
                    ],
                    [
                        'label' => 'Benutzer Profile',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [
                            ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                            ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                            ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                            ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                        ],
                    ],


                    
                    ['label' => 'Firmen', 'icon' => 'fa fa-building text-red', 'url' => ['/firma/index']],
                    ['label' => 'Projekte', 'icon' => 'fa fa-dashboard text-aqua','url' => ['/projekt/index']],
                    ['label' => 'Teileigentumseinheiten', 'icon' => 'fa fa-home text-green','url' => ['/haus/index']],
                    ['label' => 'Käufer', 'icon' => 'fa fa-users text-yellow', 'url' => ['/kaeufer/index']],
                    ['label' => 'Datenblätter', 'icon' => 'fa fa-file-text text-blue','url' => ['/datenblatt/index']],
                   
                    [
                        'label' => 'Einstellungen',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Einheitstypenverwaltung', 'icon' => 'fa fa-file-code-o', 'url' => ['/einheitstyp/index'],],
                            
                            
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
