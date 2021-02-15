
                                        <?php foreach ($stock as $data)
    								{
                                      $stock_no = $data->stock_no;
                                      $section = $data->section;
                                      $thickness = $data->thickness;
                                      $color = $data->color;
                                      $rate = $data->rate;
                                      $discount = $data->discount;
                                      $net_amount = $data->net_amount; 
                                      $rem_qty = $data->rem_qty;
                                      $date_c   = $data->date;
                                      $sizein_ft = $data->sizein_ft; 
                                      $entered_by = $data->entered_by;



                                      

?>
                                            <tr>
                                                <td>
                                                    <?php echo $stock_no;?>
                                                </td>
                                                <td>
                                                    <?php echo $section;?>
                                                </td>
                                                <td>
                                                    <?php echo $thickness;?>
                                                </td>
                                                <td>
                                                    <?php echo $color;?>
                                                </td>
                                                <td>
                                                    <?php echo $sizein_ft;?>
                                                </td>
                                            
                                                <td>
                                                    <?php echo $rem_qty;?>
                                                </td>
                                          </tr>
                                            <?php
    }

  ?> 
