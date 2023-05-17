<?php

return [
    '/' => 'Home@index',
    '/user/create' => 'User@create',
    '/user/[a-z0-9]+' =>'User@index',
    '/user/[a-z0-9]+/name/[a-z]+' =>'User@show'
];


