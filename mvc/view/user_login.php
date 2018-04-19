<?php

$form = new Form('/user/login');


echo $form->text()->label('Benutzername')->name('username');
echo $form->password()->label('Passwort')->name('password');

echo $form->submit()->label('login')->name('send');
$form->end();
?>