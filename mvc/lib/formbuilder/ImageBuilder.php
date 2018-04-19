<?php

class ImageBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('label');
        $this->addProperty('name');
        $this->addProperty('value', null);
    }

    public function build()
    {
        $result = '<div class="form-group">';
        $result .= "    <label class=\"col-md-2 control-label\" for=\"textinput\">{$this->label}</label>";
        $result .= '    <div class="col-md-4">';
        $result .= '    <div class="hidethisshit">';
        $result .= '    <p>Datei auswählen</p>';
        $result .= "         <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" class=\"hide_file\">";
        $result .= '    </div>';
        $result .= "         <input type=\"submit\" value=\"Bild Hochladen\" name=\"submit\" class=\"btn btn-primary\">";
        $result .= '    </div>';
        $result .= '</div>';

        return $result;
    }
}


//echo "<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
//    Select image to upload:
//    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
//    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
//</form>";