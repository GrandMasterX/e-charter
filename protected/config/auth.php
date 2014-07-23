<?php
return array(
    User::ROLE_GUEST => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Гость',
        'bizRule' => null,
        'data' => null
    ),
    User::ROLE_CLIENT => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Клиент',
        'bizRule' => null,
        'data' => null
    ),
    User::ROLE_MANAGER => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Менеджер',
        'children' => array(
            User::ROLE_CLIENT,
        ),
        'bizRule' => null,
        'data' => null
    ),
    User::ROLE_ADMIN => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => array(
            User::ROLE_MANAGER,
        ),
        'bizRule' => null,
        'data' => null
    ),
);
