<?php
return array(
    '' => array(
        'title'       => 'Index',
        'description' => '',
        'view'        => 'index',
        'layout'      => array(
            'page-title' => array(
                'description' => true,
                'breadcrumb'  => false,
            ),
        ),
        'assets'      => array(
            'custom' => array(
                'js' => array(),
            ),
        ),
    ),

    'login'           => array(
        'title'  => 'Login',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-in/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'register'        => array(
        'title'  => 'Register',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-up/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'forgot-password' => array(
        'title'  => 'Forgot Password',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/password-reset/password-reset.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),

    'manage' => array(
        'transactions'  => array(
            'title'  => 'Controle de transações',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'js/custom/modals/master-modal.js',
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/transactions/manage-transaction.js',
                    ),
                ),
            ),
        ),
        'transaction'  => array(

            '*' => array(
                'title'  => 'Controle de transação',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/modals/master-modal.js',
                            'js/custom/transactions/manage-transaction.js',
                        ),
                    ),
                ),
            ),

        ),
        'activities'  => array(
            'title'  => 'Log de atividades',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
        'system' => array(
            'title'  => 'Log de sistema',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
        'users' => array(
            'title'  => 'Controle de usuários',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/modals/master-modal.js',

                    ),
                ),
            ),
        ),
        'roles' => array(
            'title'  => 'Controle de perfis',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/modals/master-modal.js',

                    ),
                ),
            ),
        ),
        'permissions' => array(
            'title'  => 'Controle de permissões',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/modals/master-modal.js',

                    ),
                ),
            ),
        ),
    ),

    'general' => array(

        'wallet' => array(
            'title'  => 'Carteira',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'balance' => array(
            'title'  => 'Saldo por ativos',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'statement' => array(
            'title'  => 'Extrato de utilização',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

    ),

    'operations' => array(

        'convert' => array(
            'title'  => 'Converter',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/operations/operation-input-handler.js',
                    ),
                ),
            ),
        ),

        'negotiate' => array(
            'purchase' => array(
                'title'  => 'Comercializar',
                'assets' => array(
                    'custom' => array(
                        'js' => array(
                            'js/custom/operations/operation-input-handler.js',
                        ),
                    ),
                ),
            ),
            'sale' => array(
                'title'  => 'Comercializar',
                'assets' => array(
                    'custom' => array(
                        'js' => array(
                            'js/custom/operations/operation-input-handler.js',
                        ),
                    ),
                ),
            ),
        ),

        'withdraw' => array(
            'title'  => 'Sacar',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/operations/operation-input-handler.js',
                    ),
                ),
            ),
        ),

        'plan' => array(
            'title'  => 'Plano mensal',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

    ),

    'bill' => array(

        'history' => array(
            'title'  => 'Histórico de faturas',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),

        'pay' => array(
            'title'  => 'Pagar conta de luz',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
            'method' => array(
                'title'  => '',
                'assets' => array(
                    'custom' => array(
                        'js' => array(
                            ''
                        ),
                    ),
                ),
            ),
        ),

        'ownership' => array(
            'title'  => 'Titularidade de contas',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/modals/master-modal.js',
                        'js/custom/modals/delete-confirmation-modal.js',
                    ),
                ),
            ),
        ),

    ),

    'support' => array(

        'topics' => array(
            'title'  => 'Central de ajuda',
            'layout'      => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb'  => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'tutorials' => array(
            'title'  => 'Tutoriais',
            'layout'      => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb'  => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'faq' => array(
            'title'  => 'Perguntas frequentes',
            'layout'      => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb'  => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'fees' => array(
            'title'  => 'Custos e taxas',
            'layout'      => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb'  => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'contact' => array(
            'title'  => 'Fale conosco',
            'layout'      => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb'  => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

    ),

    'account' => array(

        'overview' => array(
            'title'  => 'Resumo da conta',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                    ),
                ),
            ),
        ),

        'settings' => array(
            'title'  => 'Configurações',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/account/settings/profile-details.js',
                    ),
                ),
            ),
        ),

        'security' => array(
            'title'  => 'Segurança',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/account/settings/signin-methods.js',
                        'js/custom/modals/two-factor-authentication.js',
                    ),
                ),
            ),
        ),

        'banking' => array(
            'title'  => 'Dados bancários',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/modals/master-modal.js',
                        'js/custom/modals/delete-confirmation-modal.js',
                    ),
                ),
            ),
        ),

        'payment' => array(
            'title'  => 'Métodos de pagamento',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/modals/master-modal.js',
                        'js/custom/modals/delete-confirmation-modal.js',
                    ),
                ),
            ),
        ),

        'policies' => array(
            'title'  => 'Termos e declarações',
            'assets' => array(
                'custom' => array(
                    'js' => array(

                    ),
                ),
            ),
        ),

    ),
);
