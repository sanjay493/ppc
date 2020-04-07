$(".btnedit").click(e=>{
let textValues = displayData(e);
console.log(textValues);

let id = $("input[name*='md_id']");
let rpt_date = $("input[name*='rpt_date']");
let unit = $("input[name*='unit']");
let rake_no = $("input[name*='rake_no']");
let raketype = $("input[name*='raketype']");
let wg_l = $("input[name*='wg_l']");
let wg_f = $("input[name*='wg_f']");
let arrival = $("input[name*='arrival']");
let placement = $("input[name*='placement']");
let lcompletion = $("input[name*='lcompletion']");
let ldgtime = $("input[name*='ldgtime']");
let cust = $("input[name*='cust']");
let l_qty = $("input[name*='l_qty']");
let f_qty = $("input[name*='f_qty']");

id.val(textValues[0]);
rpt_date.val(textValues[1]);
unit.val(textValues[2]);
rake_no.val(textValues[3]);
raketype.val(textValues[4]);
wg_l.val(textValues[5]);
wg_f.val(textValues[6]);
arrival.val(textValues[7]);
placement.val(textValues[8]);
lcompletion.val(textValues[9]);
ldgtime.val(textValues[10]);
cust.val(textValues[11]);
l_qty.val(textValues[12]);
f_qty.val(textValues[13]);
});

function displayData(e){
    let id=0;
    const td =$("tbody tr td");
    let textValues = [];
    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            console.log(e.target.dataset.id);
            //console.log(value);

            textValues[id++] = value.textContent;
        }
    }
    return textValues;
}


const form = document.getElementById("form");
const rpt_date = document.getElementById('rpt_date');
const unit = document.getElementById('unit');
const rake_no = document.getElementById('rake_no');
const raketype = document.getElementById('raketype');
const placement = document.getElementById('placement');
const lcompletion = document.getElementById('lcompletion');
const ldgtime = document.getElementById('ldgtime');
const cust = document.getElementById('cust');
const wg_f = document.getElementById('wg_f');
const wg_l = document.getElementById('wg_l');
const l_qty = document.getElementById('l_qty');
const f_qty = document.getElementById('f_qty');


form.addEventListener('create', (e)=>{
    console.log('click');
    e.preventDefault();
    checkInput();
});

function checkInput(){
    const rpt_date = rpt_date.value.trim();
    const unit = unit.value.trim();
    const rake_no = rake_no.value.trim();
    const raketype =raketype.value.trim();
    const arrival =arrival.value.trim();
    const placement = placement.value.trim();
    const lcompletion = lcompletion.value.trim();
    const ldgtime =ldgtime.value.trim();
    const cust =cust.value.trim();
    const wg_f = wg_f.value.trim();
    const wg_l = wg_l.value.trim();
    const l_qty = l_qty.value.trim();
    const f_qty = f_qty.value.trim();

    if(rpt_date == ' '){
              setErrorfor(rpt_date, "Report Date can't be blank");
    }else{
          setSuccessfor(rpt_date);
    }
}

function setErrorfor(input, message){
    const formInputGroup =input.parentElement;
    const small =formInputGroup.QuerySelector('small');
    small.innerText = message;
    formInputGroup.className = 'input-group error';

}
function setSuccessfor(input, message){
    const formInputGroup =input.parentElement;
    formInputGroup.className = 'input-group success';

}