
<?php include("../test/DB_Connect/header.php"); ?>

<div class="container">
<form action="" method="POST" id="myForm" onload="showDiv()">
<div class="container">
<div class="row py-2 justify-content-center">
<div class="col-md-2 input-group" hidden><?php inputElement("","text","ID", "id",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date*", "rpt_date",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement1(); ?></i></div>
</div>
<div class="row justify-content-center justify-content-around">
<div class="col-md-3 input-group" id="dept_mines" >
            <div>
                <h5 id="dept_area">F & G Area</h5>
                <?php inputElement("Dpt. RM","int","Dept. ROM", "dept_rm",""); ?>
                <?php inputElement("Dpt OB","int","Dept. OB", "dept_ob",""); ?> 
                <?php inputElement("Cont RM","int","Cont ROM F & G Area", "cont_rm_fg",""); ?> 
                <?php inputElement("Cont OB","int","Cont OB F & G Area", "cont_ob_fg",""); ?>
            </div>
          </div>

 <div class="col-md-2 input-group"  id="div_darea">
        <div>
        <h5 id="cont_area_heading"> D Area</h5>
        <?php inputElement("RM","int","ROM", "cont_rm_darea",""); ?> 
          <?php inputElement("OB","int","OB", "cont_ob_darea",""); ?> 
          <?php inputElement("L","int","Lump", "lump_darea",""); ?> 
          <?php inputElement("F","int","Fines", "fines_darea",""); ?> 
          </div>
  </div>

  <div class="col-md-2 input-group" id="div_p" >
          <div>
        <h5 id="contp">Panposh</h5>
          <?php inputElement("RM","int","ROM", "cont_rm_p",""); ?> 
          <?php inputElement("OB","int","OB", "cont_ob_p",""); ?> 
          <?php inputElement("L","int","Lump", "lump_p",""); ?> 
          <?php inputElement("F","int","Fines", "fines_p",""); ?> 
        </div>
  </div>


  <div class="col-md-2 input-group"  id="screen">
          <div>
        <h5> Dept Screening</h5>
        <div id="screen_input_div"><?php inputElement("SCR","int","Enter Screen Input", "screen_input",""); ?> </div>
          <?php inputElement("L","int","Dept Lump Production", "dept_lump",""); ?> 
          <?php inputElement("F","int","Dept Fines Production", "dept_fines",""); ?> 
          </div>
   </div>
   <div class="col-md-3 input-group" >
   <h5> Stocks</h5>
           
               <div><?php inputElement("Drill","int","Drill", "drill",""); ?></div>
            <div class="bin" id="bin"> 
                      <?php inputElement("B L","int","Bin Lump Stock", "bin_lump_stock",""); ?>
                      <div id="bin_fines_div"> <?php inputElement("B F","int","Bin Fines Stock", "bin_fines_stock",""); ?></div>
            </div>
            <div class="ground"> 
                <?php inputElement("G L","int","Ground Lump Stock", "ground_lump_stock",""); ?>
                <?php inputElement("G F","int","Ground Fines Stock", "ground_fines_stock",""); ?> 
            </div>
 </div>
 </div>
</div>
  <hr>
  <div class="form-row  justify-content-center">
<div class="form-group  mr-5"><button type="submit" name="addProdn" class="btn btn-primary" >Submit Records</button></div>
<div class="form-group  mr-5"><button type="submit" name="getProductionData" class="btn btn-primary" >Get Records</button></div>
<div class="form-group"><button type="submit" name="updateProduction" class="btn btn-primary">Update Record</button></div>
</div>
<div>
<div>
</form>


<div id="display_data"></div>
<div class="d-flex table-data">
 <table class="table table-striped table-light sm-table">
 <thead class="thead-dark">
 <tr>
 <th>ID</th>
 <th>Date</th>
 <th>Mines</th>
 <th style="display:none;" >Dept ROM</th>
 <th style="display:none;">Cont ROM F&G</th>
 <th style="display:none;">Dept OB</th>
 <th style="display:none;">Cont ROM F&G</th>
 <th style="display:none;">D Area ROM</th>
 <th style="display:none;">D Area OB</th>
 <th style="display:none;">Lump Darea</th>
 <th style="display:none;">Fines Darea</th>
 <th style="display:none;">Panpos ROM</th>
 <th style="display:none;">Panpos OB</th>
 <th style="display:none;">Lump Panpos</th>
 <th style="display:none;">Fines Panpos</>
<th  style="display:none;">Screen Input</th>
<th  style="display:none;">Dept Lump</th>
<th  style="display:none;">Dept Fines</>
 <th>Total ROM</th>
 <th>Total OB</th>
 <th>Total Lump</th>
 <th>Total Fines</th>
 <th>Drill</th>
 <th>Bin Lump Stock</th>
 <th>Bin Fines Stock</th>
 <th>Ground Lump Stock</th>
 <th>Ground Fines Stock</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 <?php 
if(isset($_POST['getProductionData'])){
  $result =getProductionData();
  $trom=0;
  if($result){
    while($row=mysqli_fetch_assoc($result)){
    ?>
   <tr>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['rpt_date']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['unit']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_rm']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_fg']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_ob']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_fg']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['lump_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['fines_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['lump_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['fines_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['screen_input']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_lump']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_fines']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_rm'] +$row['cont_rm_fg']+$row['cont_rm_darea']+$row['cont_rm_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_ob'] +$row['cont_ob_fg']+$row['cont_ob_darea']+$row['cont_ob_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_lump'] +$row['lump_darea']+$row['lump_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_fines'] +$row['fines_darea']+$row['fines_p']); ?></td>
  <td data-id="<?php echo $row['id'];?>"><?php echo $row['drill']; ?></td>
  <td data-id="<?php echo $row['id'];?>"><?php echo $row['bin_lump_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['bin_fines_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['ground_lump_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['ground_fines_stock']; ?></td>
   <td><i class="fas fa-edit prodnedit" id="prodnedit" data-id="<?php echo $row['id'];?>"></i></td>
   </tr>
    <?php
    }
  }
}
 ?>
 </tbody>
 </table>
 </div>
 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
      </body>

</html>