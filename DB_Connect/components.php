<?php 
function inputElement($icon, $type,$placeholder, $name, $value) {
  $element ="
  <div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\">$icon</div>
    </div>
      <input type='$type' class=\"form-control\" name='$name' id='$name' value='$value' placeholder='$placeholder'> 
      
</div>
";

echo $element;
}

function inputElement2($icon, $type,$placeholder, $name, $value) {
  $element ="
  <div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\">$icon</div>
    </div>
      <input type='$type' class=\"form-control\" name='$name' id='$name' value='$value' placeholder='$placeholder' disabled> 
      
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

function inputElement1() {
  $element ="
  <div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\"></div>
    </div>
      <select id=\"unit\" name=\"unit\" onchange=\"showDiv()\">
        <option value=\"\"Selected>Mines Name</option>
        <option value=\"KRB\" >Kiriburu</option>
        <option value=\"MBR\">Meghahatuburu</option>
        <option value=\"BOL\" >Bolani</option>
        <option value=\"BAR\" >Barsua</option>
        <option value=\"TAL\" >Taldih</option>
        <option value=\"KAL\" >Kalta</option>
        <option value=\"GUA\" >Gua</option>
        <option value=\"MPR\" >Chiria</option>
        <option value=\"KTR\" >Kuteshwar</option>
      </select>
</div>
";

echo $element;
}


function inputElement3() {
  $element ="
  <div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\"></div>
    </div>
      <select id=\"cust\" name=\"cust\">
        <option value=\"\"Selected>Destination</option>
        <option value=\"BSL\" >BSL</option>
        <option value=\"DSP\">DSP</option>
        <option value=\"RSP\" >RSP</option>
        <option value=\"ISP\" >ISP</option>
        <option value=\"BSP\" >BSP</option>
        <option value=\"PMSB\" >PMSB</option>
        <option value=\"ESCL\" >ESCL</option>
        <option value=\"OTH\" >OTH</option>
      </select>
</div>
";

echo $element;
}