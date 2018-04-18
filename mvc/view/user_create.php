<?php

$form = new Form('/user/doCreate');

echo $form->text()->label('Benutzername')->name('username');
echo $form->text()->label('Mail')->name('email');
echo $form->text()->label('Passwort')->name('password');

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Benutzer erstellen')->name('send');

$form->end();
