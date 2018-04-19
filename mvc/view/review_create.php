<div class="centerform">

<?php

$form = new Form('/user/doReview');

echo $form->text()->label('Marke')->name('marke');
echo $form->text()->label('Modell')->name('modell');
echo $form->text()->label('Ihre Rückmeldung (max. 1000)')->name('review');

echo "<p>Fügen Sie hier das Bild ihres Autos ein</p>";
echo $form->image()->label('')->name('sendreview');

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Review erstellen')->name('sendreview');

$form->end();
?>

</div>
