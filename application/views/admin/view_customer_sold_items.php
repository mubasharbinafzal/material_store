 <?php
 $this->load->view('index/header'); ?>
 <br>
<?php 
  $this->load->view('admin/main_menu');
 ?>
 <div class="container" style="margin-top: 20px;">
  
  <h1>Sold Items </h1>
  <br>
 
  
  <table id="customer_table" class="table" style="width:100%">
        <thead>
            <tr>
              <th>Invoice id</th>
                <th>Issued by</th>  
                <th>Cstmr id</th>  
                <th>Stock no</th>
                <th>section</th>
                <th>Gage</th>
                <th>Clr</th>
                <th>Rate</th>
                <th>Size</th> 
                <th>Qty</th>   
                <th>%</th> 
                
                <th>Gate Pass</th> 
                <th>Amount</th>       

            </tr>
        </thead>
        <tbody>
                <?php if(count($customers_invoice)):
          $count = $this->uri->segment(3);
     ?>
 
    <?php $price_total = 0; $qty = 0; foreach ($customers_invoice as $invoice):

                  $main_invoice_id  = $invoice->main_invoice_id;
                   $invoice_writer  = $invoice->invoice_writer;
                   $invoice_stock_no  = $invoice->invoice_stock_no;
                   $customer_id  = $invoice->customer_id;
                   $invoice_qty  = $invoice->invoice_qty;
                   $ft_invoice  = $invoice->ft_invoice;
                   $invoice_discount  = $invoice->invoice_discount;
                   $invoice_price  = $invoice->invoice_price;

                   $section  = $invoice->section;
                   $thickness  = $invoice->thickness;
                   $color  = $invoice->color;
                   $rate = $invoice->rate;
                   $gate_pass_no = $invoice->gate_pass_no;
                   $qty += $invoice_qty;
                   $price_total+=$invoice_price;    
      ?>
      <tr>
        <td><?php echo $main_invoice_id; ?></td>
        <td><?php echo $invoice_writer; ?></td>
        
        <td><?php echo $customer_id; ?></td>
        <td><?php echo $invoice_stock_no; ?></td>
        <td><?php echo $section; ?></td>
        <td><?php echo $thickness; ?></td>
        <td><?php echo $color; ?></td>
        <td><?php echo $rate; ?></td>
        <td><?php echo $ft_invoice; ?></td>
        <td><?php echo $invoice_qty; ?></td>
        
        <td><?php echo $invoice_discount; ?></td>
        <td><?php echo $gate_pass_no; ?></td>
        <td><?php echo number_format($invoice_price); ?></td>
        
      </tr>

            
           
               <?php endforeach; ?>
   <?php else: ?>
    <tr>
      <td colspan="3">Not data avalible</td>
    </tr>
   <?php endif; ?>

        </tbody>

<thead>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>QTY</td>
        <td><b><?php echo number_format($qty); ?></b></td>
        <td></td>
        <td>Amount</td>
        <td><b><?php echo number_format($price_total); ?></b></td>
      </tr>
      </thead>

    </table>
  </div>
<?php echo $this->pagination->create_links(); ?>
  <?php $this->load->view('index/footer'); ?>


