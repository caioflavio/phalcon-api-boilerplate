<?php
use Phalcon\Mvc\Micro\Collection as MicroCollection;
use ApiAuth\Controller\UsersController;

$userRoute = new MicroCollection();
$userRoute->setHandler("\ApiAuth\Controller\UsersController");
$userRoute->setLazy(true);
$userRoute->setPrefix('/user');

/* Payload
    {
        "username" : (string)
        "webhook_url" : (string)
    }
   Expected Return
    {
        "id" : (int),
        "token_id": (int),
        "username": (string),
        "secret_ket": (string),
        "created_at": (date),
        "updated_at": (date),
        "active": (int)
    }
*/
$userRoute->post('/new', 'new');

/* Payload
    {
        "secret_key" : (string)
    }
   Expected Return
    {
        "id" : (int),
        "user_id": (int),
        "token": (string),
        "expires_at": (date),
        "created_at": (date),
        "updated_at": (date),
        "active": (int)
    }
*/
$userRoute->put('/activate', 'activate');

$userRoute->get('/acl/test/{secret_key}/{token}', 'test', 'Users.tests');

$phalconMicro->mount($userRoute);