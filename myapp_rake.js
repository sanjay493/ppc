$(".btnedit").click((e) => {
  let textValues = displayData(e);
  console.log(textValues);

  let id = $("input[name*='md_id']");
  let rpt_date = $("input[name*='rpt_date']");
  let unit = $("select[name*='unit']");
  let rake_no = $("input[name*='rake_no']");
  let raketype = $("input[name*='raketype']");
  let wg_l = $("input[name*='wg_l']");
  let wg_f = $("input[name*='wg_f']");
  let cust = $("input[name*='cust']");
  let nature = $("input[name*='nature']");
  let arrival = $("input[name*='arrival']");
  let placement = $("input[name*='placement']");
  let lcompletion = $("input[name*='lcompletion']");
  let ldgtime = $("input[name*='ldgtime']");
  let l_qty = $("input[name*='l_qty']");
  let f_qty = $("input[name*='f_qty']");
  let rr_no = $("input[name*='rr_no']");

  id.val(textValues[0]);
  rpt_date.val(textValues[1]);
  unit.val(textValues[2]);
  rake_no.val(textValues[3]);
  raketype.val(textValues[4]);
  wg_l.val(textValues[5]);
  wg_f.val(textValues[6]);
  cust.val(textValues[7]);
  nature.val(textValues[8]);
  arrival.val(textValues[9]);
  placement.val(textValues[10]);
  lcompletion.val(textValues[11]);
  ldgtime.val(textValues[12]);
  l_qty.val(textValues[13]);
  f_qty.val(textValues[14]);
  rr_no.val(textValues[15]);
});

function displayData(e) {
  let id = 0;
  let td = $("tbody tr td");
  let textValues = [];
  for (const value of td) {
    if (value.dataset.id == e.target.dataset.id) {
      //console.log(e.target.dataset.id);
      //console.log(value);

      textValues[id++] = value.textContent;
    }
  }
  return textValues;
}
