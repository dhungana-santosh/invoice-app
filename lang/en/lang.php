<?php

return [
    'app_name' => 'Invoice App',
    'user_name' => 'Test User',
    'side_bar'=>[
        'page_name' => 'Invoice'
    ],
    'top_bar'=>[],
    'footer'=>[
        'version' => 'Version',
        'copyright' => 'Copyright',
        'rights_text' => 'All rights reserved.'
    ],
    'pages' => [
        'login' => [
            'sign_in_text' => 'Sign in to start your session',
            'sign_in_button' => 'Sign In',
            'email' => 'Email',
            'password' => 'Password'
        ],
        'invoice_list' => [
            'title' => 'Invoice List',
            'bread_crumb' => [
                'invoice' => 'Invoice',
                'list' => 'List'
            ],
            'search' => 'Search',
            'table' => [
                'invoice_number' => 'Invoice Number',
                'customer' => 'Customer',
                'carried_over' => 'Carried Over',
                'total_purchase' => 'Total Purchase',
                'current_amount' => 'Current Amount',
                'action' => 'Action',
                'view_action' => 'View'
            ]
        ],
        'invoice_preview' => [
            'title' => 'Preview Invoice',
            'bread_crumb' => [
                'invoice' => 'Invoice',
                'preview' => 'preview'
            ],
            'invoice_title' => 'Invoice',
            'download' => 'Download PDF',
            'deadline' => 'Deadline:',
            'customer_no' => 'Customer No',
            'postal_code' => 'Postal Code:',
            'phone_number' => 'TEL:',
            'bank_name' => 'Bank:',
            'account_number' => 'Account No:',
            'registration_number' => 'Registration No:',
            'thank_you_text' => 'Thank you for every time.',
            'thank_you_text2' => 'We hereby submit the following request.',
            'notice_text' => '*Indices are subject to reduced tax rates.',
            'notice_symbol' => '*',
            'table_1' => [
                'last_billed_amount' => 'Last Billed Amount',
                'deposit_amount' => 'Deposit Amount',
                'carry_over' => 'Carry Over',
                'purchase_amount' =>'Purchase Amount',
                'consumption_amount' => 'Consumption Amount',
                'purchase_total' => 'Purchase Total',
                'current_billing_amount' => 'Current Billing Amount',
            ],
            'table_2'=> [
                'voucher_date' => 'Voucher Date',
                'voucher_no' => 'Voucher No',
                'item_code' => 'Item Code',
                'item_name' => 'Item Name',
                'quantity' => 'Quantity',
                'unit' => 'Unit',
                'unit_price' => 'Unit Price',
                'purchase_price' => 'Purchase Price',
            ],
            'total'=> 'Total',
            'target_tax' => 'Target Tax',
            'consumption_tax' => 'Consumption Tax'
        ]

    ],
    'bank_name' => 'Resona Holdings',
    'test' => 'Test',
    'logout' => 'Logout'

];