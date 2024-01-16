<?php

return [
    'app_name' => 'インボイスアプリ',
    'user_name' => 'テストユーザー',
    'side_bar'=>[
        'page_name' => 'インボイス'
    ],
    'top_bar'=>[],
    'footer'=>[
        'version' => 'バージョン',
        'copyright' => '著作権',
        'rights_text' => '無断転載を禁じます。'
    ],
    'pages' => [
        'login' => [
            'sign_in_text' => 'サインインしてセッションを開始する',
            'sign_in_button' => 'サインイン',
            'email' => 'Eメール',
            'password' => 'パスワード'
        ],
        'invoice_list' => [
            'title' => '請求書リスト',
            'bread_crumb' => [
                'invoice' => 'インボイス',
                'list' => 'リスト'
            ],
            'search' => '検索',
            'table' => [
                'invoice_number' => 'インボイス番号',
                'customer' => 'お客様',
                'carried_over' => 'キャリーオーバー',
                'total_purchase' => '購入総額',
                'current_amount' => '現在の金額',
                'action' => 'アクション',
                'view_action' => '表示'
            ]
        ],
        'invoice_preview' => [
            'title' => '請求書のプレビュー',
            'bread_crumb' => [
                'invoice' => 'インボイス',
                'preview' => 'プレビュー'
            ],
            'invoice_title' => 'インボイス',
            'download' => 'PDFダウンロード',
            'deadline' => '締め切り:',
            'customer_no' => '顧客番号',
            'postal_code' => '郵便番号:',
            'phone_number' => 'TEL:',
            'bank_name' => '銀行:',
            'account_number' => '口座番号:',
            'registration_number' => '登録番号:',
            'thank_you_text' => '毎回ありがとう。',
            'thank_you_text2' => 'ここに、以下の要請を提出する。',
            'notice_text' => '※印は軽減税率対象',
            'notice_symbol' => '※',
            'table_1' => [
                'last_billed_amount' => '最終請求額',
                'deposit_amount' => '預金額',
                'carry_over' => 'キャリーオーバー',
                'purchase_amount' =>'購入金額',
                'consumption_amount' => '消費量',
                'purchase_total' => '購入合計',
                'current_billing_amount' => '現在の請求額',
            ],
            'table_2'=> [
                'voucher_date' => 'バウチャー日付',
                'voucher_no' => 'クーポン番号',
                'item_code' => '商品コード',
                'item_name' => '項目名',
                'quantity' => 'Quantity',
                'unit' => '数量',
                'unit_price' => '単価',
                'purchase_price' => '購入価格',
            ],
            'total'=> '合計',
            'target_tax' => 'ターゲット税',
            'consumption_tax' => '消費税'
        ]

    ],
    'bank_name' => 'りそなホールディングス',
    'test' => 'テスト',
    'logout' => 'ログアウト'
];