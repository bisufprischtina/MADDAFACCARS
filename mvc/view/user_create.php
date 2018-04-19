<div id="user-create">
<?php

$form = new Form('/user/doCreate');

echo $form->text()->label('Benutzername')->name('username')->required(true);
echo $form->text()->label('Mail')->name('email')->required(true);
echo $form->password()->label('Passwort')->name('password')->required(true);

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Benutzer erstellen')->name('send');

$form->end();


?>
</div>


