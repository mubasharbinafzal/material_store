
<?php
$config=[

       'customer_validate'=>[
                                [
                          	            'field' => 'customer_name',
										'label' => 'customer name',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'customer_city',
										'label' => 'Customer City',
										'rules' => 'required'
                                ],
                                 [
                         	            'field' => 'customer_phone',
										'label' => 'customer Phone',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'customer_date',
										'label' => 'customer Date',
										'rules' => 'required'
                                ]
        ],
        
        'stock_validation'=>[
                                [
                         	            'field' => 'section',
										'label' => 'Section',
										'rules' => 'required'
                                ],
                                [
                          	            'field' => 'thickness',
										'label' => 'Thickness',
										'rules' => 'required'
                                ],
                                
                                [
                         	            'field' => 'color',
										'label' => 'Color',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'sizein_ft',
										'label' => 'Size in ft',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'rem_qty',
										'label' => 'Remaing Qty',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'discount',
										'label' => 'Discount',
										'rules' => 'required'
                                ],
                       
                                [
                         	            'field' => 'net_amount',
										'label' => 'Net_amount',
										'rules' => 'required'
                                ],
                        
                                
                                [
                         	            'field' => 'date',
										'label' => 'Date',
										'rules' => 'required'
                                ],
                             
                                [
                         	            'field' => 'gate_pass_no',
										'label' => 'Gate pass no',
										'rules' => 'required'
                                ],
                               
        ],
            'invoice_validate'=>[
                                [
                         	            'field' => 'customer_id',
										'label' => 'customer_id',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'stock_no',
										'label' => 'Section',
										'rules' => 'required'
                                ],
                                 [
                         	            'field' => 'qty',
										'label' => 'quantity',
										'rules' => 'required'
                                ],
                                
                                [
                         	            'field' => 'invoice_discount',
										'label' => 'Discount',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'invoice_writer',
										'label' => 'Invoice Writer',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'main_invoice_id',
										'label' => 'Main invoice id',
										'rules' => 'required'
                                ]
                                
                            
        ],
                          'generate_invoice'=>[
                                [
                         	            'field' => 'customer_id',
										'label' => 'customer_id',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'main_invoice_date',
										'label' => 'Date',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                            'generate_ledger'=>[
                                [
                         	            'field' => 'customer_id',
										'label' => 'customer_id',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'to_date',
										'label' => 'Start Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'from_date',
										'label' => 'End Date',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                                'ledger_stock'=>[
                                
                                [
                         	            'field' => 'to_date',
										'label' => 'Start Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'from_date',
										'label' => 'End Date',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                               'payment_customer'=>[
                                [
                         	            'field' => 'customer_id',
										'label' => 'customer_id',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'date',
										'label' => 'Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'p_type',
										'label' => 'Payment Type',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'rupess',
										'label' => 'Rupess',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'p_c_Description',
										'label' => 'Description',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                              'payment_stock'=>[
                                
                                [
                         	            'field' => 'date',
										'label' => 'Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'p_type',
										'label' => 'Payment Type',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'rupess',
										'label' => 'Rupess',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 's_l_description',
										'label' => 'Description',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                             'entered_stock'=>[
                                [
                         	            'field' => 'gate_pass',
										'label' => 'Gate pass',
										'rules' => 'required'
                                ]
                            ]
                            ,
                            'report_stock'=>[
                                [
                         	            'field' => 'to_date',
										'label' => 'Start Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'from_date',
										'label' => 'End Date',
										'rules' => 'required'
                                ]
                              
                               
                            ],
                             'invoice_report'=>[
                                [
                         	            'field' => 'to_date',
										'label' => 'Start Date',
										'rules' => 'required'
                                ],
                                [
                         	            'field' => 'from_date',
										'label' => 'End Date',
										'rules' => 'required'
                                ]
                              
                               
                            ]

];

?>