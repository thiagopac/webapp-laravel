<?php

$binance_explorer_url = env("BINANCE_EXPLORER_URL");
$smart_contract_address = env("SMART_CONTRACT_ADDRESS");

return array(

    'main'          => array(
        // Root level
        array(
            'title' => 'MAIN',
            'path'  => '',
        ),
    ),

    // Horizontal menu
    'horizontal'    => array(

        // Visão Geral
        array(
            'title'   => 'Visão geral',
            'role'    => 'Cliente',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    array(
                        'title' => 'Carteira',
                        'icon'  => '<i class="las la-wallet fs-1"></i>',
                        'path'  => 'general/wallet',
                    ),

                    array(
                        'title' => 'Saldo por ativos',
                        'icon'  => '<i class="las la-boxes fs-1"></i>',
                        'path'  => 'general/balance',
                    ),

                    array(
                        'title' => 'Extrato de utilização',
                        'icon'  => '<i class="las la-receipt fs-1"></i>',
                        'path'  => 'general/statement',
                    ),

                ),
            ),
        ),

        // Operações
        array(
            'title'      => 'Operações',
            'role'       => 'Cliente',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    array(
                        'title' => 'Converter',
                        'icon'  => '<i class="las la-exchange-alt fs-1"></i>',
                        'path'  => 'operations/convert',
                    ),

                    array(
                        'title'      => 'Comercializar',
                        'icon'  => '<i class="las la-shopping-cart fs-1"></i>',
                        'attributes' => array("data-kt-menu-trigger" => "click"),
                        'classes'    => array('item' => 'menu-accordion'),
                        'sub'        => array(
                            'class' => 'menu-sub-accordion',
                            'items' => array(
                                array(
                                    'title'  => 'Compra',
                                    'path'   => 'operations/negotiate/purchase',
                                    'icon' => theme()->getSvgIcon("demo2/media/icons/duotune/arrows/arr071.svg", "svg-icon-2"),
                                ),
                                array(
                                    'title'  => 'Venda',
                                    'path'   => 'operations/negotiate/sale',
                                    'icon' => theme()->getSvgIcon("demo2/media/icons/duotune/arrows/arr071.svg", "svg-icon-2"),
                                ),
                            ),
                        ),
                    ),

                    array(
                        'title' => 'Sacar',
                        'icon'  => '<i class="las la-money-check-alt fs-1"></i>',
                        'path'  => 'operations/withdraw',
                    ),

                    array(
                        'title' => 'Plano mensal',
                        'icon'  => '<i class="las la-calculator fs-1"></i>',
                        'path'  => 'operations/plan',
                    ),
                ),
            ),
        ),

        // Conta de luz
        array(
            'title'      => 'Conta de luz',
            'role'       => 'Cliente',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    array(
                        'title' => 'Histórico de faturas',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/general/gen012.svg", "svg-icon-2"),
                        'icon'  => '<i class="las la-history fs-1"></i>',
                        'path'  => 'bill/history',
                    ),

                    array(
                        'title' => 'Pagar conta de luz',
                        'icon'  => '<i class="las la-money-bill-wave fs-1"></i>',
                        'path'  => 'bill/pay',
                    ),

                    array(
                        'title' => 'Titularidade de contas',
                        'icon'  => '<i class="las la-map-marked-alt fs-1"></i>',
                        'path'  => 'bill/ownership',
                    ),
                ),
            ),
        ),

        // Suporte
        array(
            'title'      => 'Suporte',
            'role'       => 'Cliente',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'hide'       => true,
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(

                    array(
                        'title' => 'Central de ajuda',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/general/gen011.svg", "svg-icon-2"),
                        'path'  => 'support/topics',
                    ),

                    array(
                        'title' => 'Tutoriais',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/social/soc007.svg", "svg-icon-2"),
                        'path'  => 'support/tutorials',
                    ),

                    array(
                        'title' => 'Perguntas frequentes',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/communication/com007.svg", "svg-icon-2"),
                        'path'  => 'support/faq',
                    ),

                    array(
                        'title' => 'Custos e taxas',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/finance/fin001.svg", "svg-icon-2"),
                        'path'  => 'support/fees',
                    ),

                    array(
                        'title' => 'Fale conosco',
                        'icon'  => theme()->getSvgIcon("demo2/media/icons/duotune/communication/com010.svg", "svg-icon-2"),
                        'path'  => 'support/contact',
                    ),
                ),
            ),
        ),

        // Controle e gestão
         array(
             'title'      => 'Controle e gestão',
             'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
             'permission' => 'view-menu-manage-transactions',
             'attributes' => array(
                 'data-kt-menu-trigger'   => "click",
                 'data-kt-menu-placement' => "bottom-start",
             ),
             'sub'        => array(
                 'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                 'items' => array(
                     array(
                         'title'      => 'Controle de transações',
                         'path'       => 'manage/transactions',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-manage-transactions',
                     ),
                     array(
                         'title'      => 'Log de atividades',
                         'path'       => 'manage/activities',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-activities-log',
                     ),
                     array(
                         'title'      => 'Log de sistema',
                         'path'       => 'manage/system',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-system-log',
                     ),
                     array(
                         'title'      => 'Controle de usuários',
                         'path'       => 'manage/users',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-manage-users',
                     ),
                     array(
                         'title'      => 'Controle de perfis',
                         'path'       => 'manage/roles',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-manage-roles',
                     ),
                     array(
                         'title'      => 'Controle de permissões',
                         'path'       => 'manage/permissions',
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                         'permission' => 'access-screen-manage-permissions',
                     ),
                     array(
                         'title'      => 'Token holders',
                         'path'       => "$binance_explorer_url/token/tokenholderchart/$smart_contract_address",
                         'new-tab'     => true,
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                     ),
                     array(
                         'title'      => 'Token transfers',
                         'path'       => "$binance_explorer_url/token/$smart_contract_address",
                         'new-tab'     => true,
                         'bullet'     => '<span class="bullet bullet-dot"></span>',
                     ),
                 ),
             ),
         ),

    ),
);
