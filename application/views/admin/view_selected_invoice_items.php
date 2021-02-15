
<?php 
   $get_remaining_credit = 0 ;
      
  foreach ($get_remaining_balance as $data)
   {

      $main_i_credit = $data->main_i_credit;
      $main_i_debit = $data->main_i_debit;
      $main_invoice_date = $data->main_invoice_date;
      if ($main_i_debit != 0 ){
          $get_remaining_credit += $main_i_debit;
      }else{
         $get_remaining_credit -= $main_i_credit;
    }
  }
?>
<?php if (!empty($invoices)) { ?>
                <div class="col-md-12">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Stock ID</th>
                              <th scope="col">Section</th>
                              <th scope="col">Gage</th>
                              <th scope="col">color</th>
                              <th scope="col">Size</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Total</th>
                              <th scope="col">Rate</th>
                              <th scope="col">D %</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                            <tbody >
<?php 
 $count=0; $invoice_price_total =0;
         foreach ($invoices as $data)
               {
                $invoice_id = $data->invoice_id;
                $stock_no = $data->stock_no;
                $section = $data->section;
                $thickness = $data->thickness;
                $color = $data->color;
                $rate = $data->rate;
                $discount = $data->discount;
                $net_amount = $data->net_amount;
                $remarks = $data->remarks; 
                $date_c   = $data->date;
                $sizein_ft = $data->sizein_ft; 
                $entered_by = $data->entered_by;
                $customer_id = $data->customer_id;
                $customer_name = $data->customer_name;
                $customer_city = $data->customer_city;
                $invoice_qty = $data->invoice_qty;
                $ft_invoice = $data->ft_invoice;
                $invoice_price = $data->invoice_price;
                $invoice_discount = $data->invoice_discount;
                $main_i_debit = $data->main_i_debit;
                
                $invoice_price_total += $invoice_price; 
                $count++;
                        
                        ?>       
                            <tr>
                              <td><?php echo $count;?></td>
                              <td><?php echo $stock_no;?></td>
                              <td><?php echo $section;?></td>
                              <td><?php echo $thickness;?></td>
                              <td><?php echo $color;?></td> 
                              <td><?php echo $ft_invoice;?></td>
                              <td><?php echo $invoice_qty;?></td>
                              
                              <td><?php echo $ft_invoice*$invoice_qty;?></td>
                              <td><?php echo $rate;?></td>
                              
                              <td><?php echo $invoice_discount;?></td>
                              <td><?php echo $invoice_price;?></td>
                              <?php if ($count == 1){  ?>
                              <td>     
                                <?php  echo form_open_multipart('Admin/delete_invoice_stock')?>
                                <form action="Admin/delete_invoice_stock/">
                                <input type="hidden" class="form-control" name="main_invoice_id" value="<?php echo $main_invoice_id;?>">
                                <input type="hidden" name="customer_id" value="<?php echo $customer_id ;?>">
                                <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>">
                                <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                                </form>
          
                              </td>
                             <?php }else{
                             ?>
                              <td>     
                              
                                </td>
                             <?php 
                             } ?>
                          </tr>
                           <?php } ?>
                          <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  
                                  <td></td>
                                  <td>Total</td>
                                  <td><?php echo $invoice_price_total;?></td>
                                  <td></td>
                                  
                          
                                </tr>
                                     <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td> 
                                   
                                  <td colspan="3" style="text-align:right">Previous balance</td>
                                    
                                  <td><?php echo $get_remaining_credit;?></td>
                                  <td></td>
                                  
                          
                                </tr>
                                    <tr> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td> 
                                   
                                  <td colspan="3" style="text-align:right">Sub Total  </td>
                                    
                                  <td><?php echo $get_remaining_credit + $invoice_price_total;?></td>
                                  <td></td>
                                  
                          
                                </tr>
                                <tr>
                                  <td></td> 
                                  <td></td> 
                                  <td></td> 
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td> 
                                  <td></td>
                                  <?php if($main_i_debit == 0){ ?>
                                   <td>
                                 
                                          <?php  echo form_open_multipart('Admin/add_balance')?>        
                                        <input type="hidden" class="form-control" name="main_i_total_payment" value="<?php echo $invoice_price_total; ?>">
                                        <input type="hidden" class="form-control" name="main_invoice_id" value="<?php echo $main_invoice_id;?>">
                                        <div class="form-group" style=" display: inline-block; margin-top: 4px;">
                                          <input type="hidden" class="form-control" name="main_i_debit" placeholder="0" value="0" required  style="width:60px;">
                                        </div>
                                        <div class="form-group ">
                                            <input type="submit" class="btn btn-success" value="Print Invoice" style="margin-top: -4px;">
                                        </div>
                                        <?php echo form_close(); ?>
                                    </td>
                                   <?php }else{ ?>
                                   <td>
                                                <?php echo $main_i_debit; ?>  
                                       </td>
                                    <?php } ?>
                               </tr>
                             
                             
               </tbody>
                          
                        </table>
                           <?php } ?>