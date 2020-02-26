<?php
require "header.php";

 ?>




       <div class="">
         <div class="card">
             <div class="card-header">
             <strong>Download Excel File</strong>
         </div>
         
            <div class="card-body card-block">
                 <form action="xls.php" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="hf-email" class=" form-control-label">Select File:</label>
                        </div>
             
                       <div class="col-12 col-md-6">
                        	<select name="select_file" class= "form-control" required="required"> 
                        		<option value="">Select File to download</option>
                        		<option value='1'>Approved Agents List</option>
                        		<option value="2">Unapproved List</option>
                        		<option value="3">Pending List</option>
                        		
                        	</select>
                    	</div>
                    </div>
                    
                     <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="hf-email" class=" form-control-label">Select Date:</label>
                        </div>
             
                       <div class="col-12 col-md-6">

                        	<input name="date" class= "form-control" placeholder="Use the year-month-day format eg: 2019-02-19" required="required"> 
                        	
                        	
                    	</div>
                    </div>
                </div>
            <div class="row form-group" align="center">
                <div class="col col-md-8">
                <button type="submit" id="btnExport"
                    name='export' value="Download As Excel"
                    class="btn btn-info"><i class="fa fa-download"></i>&nbsp;Download As Excel</button>
            </div>
            
            </div>
            <br/><hr/><br/>
            <div class="row form-group" align="center">
                <div class="col-md-10">
                <a href="approveexcel.php" style="color:#006400"><i class="fa fa-download"></i>All Approved List</a>&nbsp;&nbsp;&nbsp;
                <a href="newapplicant.php" style="color:#00008B"><i class="fa fa-download"></i> New Applicant List</a>&nbsp;&nbsp;&nbsp;
                <a href="allreg.php" style="color:#DC143C"><i class="fa fa-download"></i>All Registered List</a>&nbsp;&nbsp;&nbsp;

                

                </div>

            </div>
            </form>
            <div class="card-footer"> </div>
            </div>

          
        </div>
   <?php require "footer.php"; ?>