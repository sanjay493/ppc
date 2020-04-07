<?php 
function inputElement($icon, $type,$placeholder, $name, $value) {
  $element ="
  <div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\">$icon</div>
    </div>
      <input type='$type' class=\"form-control\" name='$name' id=\"inlineFormInputGroup\" value='$value' placeholder='$placeholder'>
      <i class=\"fas fa-check-circle\"></i><i class=\"fas fa-exclamation-circle\"></i>
      <small>Sir, You Missed me! </small>
</div>
";

echo $element;
}

function buttonElement($btnid, $styleclass, $text, $name,$attr){
  $btn="
  <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
  ";
  echo $btn;
}

