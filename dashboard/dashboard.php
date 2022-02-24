<?php include("dashboardstyle.php"); ?>
<?php include("dashboardscript.php"); ?>

<style type="text/css">
      .dashboard-container{
          margin:0 auto;
          padding:  0;
          width:100%;
          
          background:#Fcc;
          height:700px;
          overflow:hidden;
          overflow-y:auto;
        }
        thead tr th{
          border-bottom:1px solid red;
          background:black;
          color:white;
        }

@media screen and (max-width: 500px) {
      .dashboard-container{
         width:100%;
      }
}
</style>
<div class="row" style="margin:auto; width:100%; background:white; padding-top:40px;">
   <label class="col-sm-3" >Search</label>
    <input type="text" class="col-sm-8 input-sm" placeholder="Search here..." id="txtsearchinquiry" onkeyup="loadTbl();"/>
</div>
<section class="dashboard-container">
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body collapse show">
        <table data-height="" class="table table-bordered">
          <thead style="position:sticky; top:0; ">
            <tr>
              
              <th>User Code</th>
              <th>FullName</th>
              <th>Email</th>
              <th>Contact No.</th>
              <th>Date</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody id="tblsample">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</section>

<?php include('edit/edit.php') ?>
