<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>ABG Projekt Manager</p>

            </div>
        </div>

        <!-- search form -->
        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    
                    
                    
                    ['label' => 'Firmen', 'icon' => 'fa fa-building text-red', 'url' => ['firma/index']],
                    ['label' => 'Projekte', 'icon' => 'fa fa-dashboard text-aqua','url' => ['projekt/index']],
                    ['label' => 'Objekte', 'icon' => 'fa fa-home text-green','url' => ['haus/index']],
                    ['label' => 'Datenblätter', 'icon' => 'fa fa-file-text text-blue','url' => ['datenblatt/index']],
                    ['label' => 'Käufer', 'icon' => 'fa fa-users text-yellow', 'url' => ['kaeufer/index']],
                    [
                        'label' => 'Einstellungen',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Einheitstypenverwaltung', 'icon' => 'fa fa-file-code-o', 'url' => ['einheitstyp/index'],],
                            
                            
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
