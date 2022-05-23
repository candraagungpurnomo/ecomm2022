<?php 
     $id               = $invoice->no_nota; 
   
     if($this->input->post('is_submitted')){ 
          $date             = set_value('date'); 
          $due_date         = set_value('due_date'); 
          $status           = set_value('status'); 
     } else { 
          $date             = $invoice->tgl_jual; 
          $due_date         = $invoice->due_date; 
          $status           = $invoice->status; 
     } 
?> 

<!DOCTYPE html>
<html lang="en">
	<head>
    <?php $this->load->view('user/_partials/head') ?>
	</head>
	<body>
		<?php $this->load->view('user/_partials/navbar') ?>
        <div style="min-height: 60vh">
            <div class="col-10 m-auto pt-2">
               <h1>Konfirmasi Pembayaran</h1> 
                    <div><?= validation_errors() ?></div> 
                    <?= form_open_multipart('order/update_bayar/'.$id, ['class'=>'form-horizontal']) ?> 
                         
                    <div class="form-group"> 
                         <label  class="col-sm-2  control-label">Invoice Id</label> 
                         <div class="col-sm-10"> 
                              <input  type="text"  class="form-control"  name="id"  value="<?php echo $id; ?>" disabled> 
                         </div> 
                    </div>

                    <div class="form-group"> 
                         <label   class="col-sm-2   control-label"> Date</label> 
                         <div class="col-sm-10"> 
                         <input type="text" class="form-control" name="date" value="<?php echo $date; ?>" readonly> 
                         </div> 
                    </div> 
                                             
                    <div class="form-group"> 
                         <label  class="col-sm-2  control-label">Due Date</label> 
                         <div class="col-sm-10"> 
                              <input type="text" class="form-control" name="due_date"  value="<?php echo $due_date; ?>" readonly> 
                         </div> 
                    </div> 
                                        
                    <div class="form-group"> 
                         <label class="col-sm-2  control-label">Status</label> 
                         <div class="col-sm-10"> 
                              <input type="text" class="form-control" name="status" value="<?php echo $status; ?>" readonly> 
                         </div> 
                    </div> 
                                        
                    <div class="form-group"> 
                         <label class="col-sm-2  control-label">Payment Image</label> 
                         <div class="col-sm-10"> 
                              <input type="file" class="form-control" name="userfile" > 
                         </div> 
                    </div> 
                                        
                    <div class="form-group"> 
                         <div class="col-sm-offset-2 col-sm-10"> 
                              <button type="submit" class="btn btn-default"> Save </button> 
                         </div> 
                    </div> 
                                        
                         <?= form_close() ?> 
                              </div> 
                              <div class="col-md-1"></div> 
            </div>
        </div>
		<?php $this->load->view('user/_partials/footer') ?>
		<?php $this->load->view('user/_partials/js') ?>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
                $('#dataTable').DataTable();
            } );
		</script>

	</body>

</html>