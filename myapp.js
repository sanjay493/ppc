$(".btnedit").click((e) => {
  let textValues = displayData(e);
  //console.log(textValues);
  console.log(unit);

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
  const td = $("tbody tr td");
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

$(".prodnedit").click((e) => {
  let textValues = displayData(e);

  let id = $("input[name*='id']");
  let rpt_date = $("input[name*='rpt_date']");
  let unit = $("select[name='unit']");
  let dept_rm = $("input[name*='dept_rm']");
  let cont_rm_fg = $("input[name*='cont_rm_fg']");
  let dept_ob = $("input[name*='dept_ob']");
  let cont_ob_fg = $("input[name*='cont_ob_fg']");
  let cont_rm_darea = $("input[name*='cont_rm_darea']");
  let cont_ob_darea = $("input[name*='cont_ob_darea']");
  let lump_darea = $("input[name*='lump_darea']");
  let fines_darea = $("input[name*='fines_darea']");
  let cont_rm_p = $("input[name*='cont_rm_p']");
  let cont_ob_p = $("input[name*='cont_ob_p']");
  let lump_p = $("input[name*='lump_p']");
  let fines_p = $("input[name*='fines_p']");
  let screen_input = $("input[name*='screen_input']");
  let dept_lump = $("input[name*='dept_lump']");
  let dept_fines = $("input[name*='dept_fines']");
  let drill = $("input[name*='drill']");
  let bin_lump_stock = $("input[name*='bin_lump_stock']");
  let bin_fines_stock = $("input[name*='bin_fines_stock']");
  let ground_lump_stock = $("input[name*='ground_lump_stock']");
  let ground_fines_stock = $("input[name*='ground_fines_stock']");

  id.val(textValues[0]);
  rpt_date.val(textValues[1]);
  unit.val(textValues[2]);
  dept_rm.val(textValues[3]);
  cont_rm_fg.val(textValues[4]);
  dept_ob.val(textValues[5]);
  cont_ob_fg.val(textValues[6]);
  cont_rm_darea.val(textValues[7]);
  cont_ob_darea.val(textValues[8]);
  lump_darea.val(textValues[9]);
  fines_darea.val(textValues[10]);
  cont_rm_p.val(textValues[11]);
  cont_ob_p.val(textValues[12]);
  lump_p.val(textValues[13]);
  fines_p.val(textValues[14]);
  screen_input.val(textValues[15]);
  dept_lump.val(textValues[16]);
  dept_fines.val(textValues[17]);
  drill.val(textValues[22]);
  bin_lump_stock.val(textValues[23]);
  bin_fines_stock.val(textValues[24]);
  ground_lump_stock.val(textValues[25]);
  ground_fines_stock.val(textValues[26]);

  console.log(textValues[2]);
  unitcheck(textValues[2]);
});
