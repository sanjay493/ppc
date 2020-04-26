function showDiv() {
  let select1 = document.getElementById("unit");
  unitcheck(select1.value);
}
function unitcheck(unit) {
  switch (unit) {
    case "KRB":
    case "GUA":
      console.log(unit);
      document.getElementById("dept_mines").style.display = "block";
      document.getElementById("div_darea").style.display = "none";
      document.getElementById("div_p").style.display = "none";
      document.getElementById("screen_input_div").style.display = "none";
      document.getElementById("screen").style.display = "block";
      document.getElementById("dept_area").innerHTML = "Excavation Activity";
      document.getElementById("dept_lump").placeholder = "Lump";
      document.getElementById("dept_fines").placeholder = "Fines";
      document.getElementById("cont_rm_fg").placeholder = "Cont. ROM";
      document.getElementById("cont_ob_fg").placeholder = "Cont OB";
      document.getElementById("bin").style.display = "block";
      document.getElementById("bin_fines_div").style.display = "block";

      break;
    case "MBR":
      document.getElementById("dept_mines").style.display = "block";
      document.getElementById("div_darea").style.display = "none";
      document.getElementById("div_p").style.display = "none";
      document.getElementById("screen").style.display = "block";
      document.getElementById("screen_input_div").style.display = "none";
      document.getElementById("dept_area").innerHTML = "Excavation Activity";
      document.getElementById("dept_lump").placeholder = "Lump";
      document.getElementById("dept_fines").placeholder = "Fines";
      document.getElementById("cont_rm_fg").placeholder = "Cont. ROM";
      document.getElementById("cont_ob_fg").placeholder = "Cont OB";
      document.getElementById("bin").style.display = "none";
      break;

    case "BAR":
      document.getElementById("bin").style.display = "block";
      document.getElementById("dept_mines").style.display = "block";
      document.getElementById("div_darea").style.display = "none";
      document.getElementById("div_p").style.display = "none";
      document.getElementById("screen_input_div").style.display = "none";
      document.getElementById("bin_fines_div").style.display = "none";
      document.getElementById("screen").style.display = "block";
      document.getElementById("dept_area").innerHTML = "Excavation Activity";
      document.getElementById("dept_lump").placeholder = "Lump";
      document.getElementById("dept_fines").placeholder = "Fines";
      document.getElementById("cont_rm_fg").placeholder = "Cont. ROM";
      document.getElementById("cont_ob_fg").placeholder = "Cont OB";
      break;
    case "TAL":
    case "MPR":
    case "KAL":
      // console.log(select1.value);
      document.getElementById("div_darea").style.display = "block";
      document.getElementById("div_p").style.display = "none";
      document.getElementById("dept_mines").style.display = "none";
      document.getElementById("bin").style.display = "none";
      document.getElementById("cont_area_heading").innerHTML =
        " Excavation & Transport  Activity";
      document.getElementById("lump_darea").placeholder = "Lump Transportation";
      document.getElementById("fines_darea").placeholder =
        "Fines Transportation";
      document.getElementById("screen").style.display = "none";

      //document.getElementById("div-darea").style.display = "Block";
      break;

    case "BOL":
      document.getElementById("div_darea").style.display = "block";
      document.getElementById("div_p").style.display = "block";
      document.getElementById("dept_mines").style.display = "block";
      document.getElementById("bin").style.display = "block";
      document.getElementById("screen").style.display = "block";
      document.getElementById("dept_area").innerHTML = "F&G Area";
      document.getElementById("screen_input_div").style.display = "block";
      document.getElementById("bin_fines_div").style.display = "block";
      document.getElementById("cont_area_heading").innerHTML = " D Area";
      document.getElementById("lump_darea").placeholder = "Lump";
      document.getElementById("fines_darea").placeholder = "Fines";

      break;
  }
}
