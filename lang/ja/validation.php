<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーションの言語行
    |--------------------------------------------------------------------------
    |
    | 次の言語行には、バリデータクラスで使用されるデフォルトの
    | エラーメッセージが含まれています。これらのルールの一部には、
    | サイズルールなどの複数のバージョンがあります。
    | ここでこれらの各メッセージを自由に調整してください。
    |
    */
    'password_reset' => [
        'exists' => '入力されたメールアドレスのアカウントが存在しません',
        'password_format_error' => '入力したパスワードが不正です',
        'password_mismatch_error' => 'パスワードとパスワード・確認が不一致です',
        'token_invalid' => 'このパスワードリセットトークンは無効です',
    ],
    'login' => [
        'password' => '入力したパスワードが不正です'
    ],
    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':attributeを承認するように、:otherが:valueである必要があります。',
    'active_url' => ':attributeには有効なURLを指定してください。',
    'after' => ':attributeには:date以降の日付を指定してください。',
    'after_or_equal' => ':attributeには:dateかそれ以降の日付を指定してください。',
    'alpha' => ':attributeには英字のみからなる文字列を指定してください。',
    'alpha_dash' => ':attributeには英数字・ハイフン・アンダースコアのみからなる文字列を指定してください。',
    'alpha_num' => ':attributeには英数字のみからなる文字列を指定してください。',
    'array' => ':attributeには配列を指定してください。',
    'before' => ':attributeには:date以前の日付を指定してください。',
    'before_or_equal' => ':attributeには:dateかそれ以前の日付を指定してください。',
    'between' => [
        'numeric' => ':attributeには:min〜:maxまでの数値を指定してください。',
        'file' => ':attributeには:min〜:max KBのファイルを指定してください。',
        'string' => ':attributeには:min〜:max文字の文字列を指定してください。',
        'array' => ':attributeには:min〜:max個の要素を持つ配列を指定してください。',
    ],
    'boolean' => ':attributeには真偽値を指定してください。',
    'confirmed' => 'パスワードと再パスワードが不一致です',
    'current_password' => 'パスワードが間違っています。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'declined' => ':attributeを拒否してください。',
    'declined_if' => ':otherがvalueであれば、:attributeを拒否する必要があります。',
    'different' => ':attributeには:otherとは異なる値を指定してください。',
    'digits' => ':attributeは:digits文字で入力してください。',
    'digits_between' => ':attributeは:min文字以上:max文字以下で入力してください',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeに指定された値は重複しています。',
    'email' => 'メールアドレスが不正です',
    'ends_with' => ':attributeは、:valuesのいずれかで終了する必要があります。',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeには値が必要です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
        'array' => ':attributeには:valueより多くのアイテムが必要です。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeには:value以上のアイテムが必要です。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file' => ':attributeは:valueキロバイトより小さくなければなりません。',
        'string' => ':attributeは:value文字より小さくなければなりません。',
        'array' => ':attributeには:valueより少ないアイテムが必要です。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeには:value以下のアイテムが必要です。',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => ':attributeは:maxより大きくてはいけません。',
        'file' => ':attributeは:maxキロバイトを超えてはいけません。',
        'string' => ':attributeは:max文字を超えてはいけません。',
        'array' => ':attributeには:max個を超えるアイテムを含めることはできません。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min' => [
        'numeric' => ':attributeは:minより小さくてはいけません。',
        'file' => ':attributeは:minキロバイトより小さくてはいけません。',
        'string' => ':attributeは:min文字より小さくてはいけません。',
        'array' => ':attributeには少なくとも:min個のアイテムが必要です。',
    ],
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeは無効な形式です。',
    'numeric' => ':attributeは数字を入力してください。',
    'password' => [
        'letters' => ':attribute少なくとも1文字が含まれていなければなりません',
        'mixed' => ':attribute少なくとも大文字と小文字を1つずつ含める必要があります',
        'numbers' => ':attribute少なくとも1つの数値が含まれていなければなりません',
        'symbols' => ':attributeには少なくとも1つのシンボルが必要です',
        'uncompromised' => '指定された :attribute は、データリークに登場しました。別の:attributeを選択してください',
        'format_error' => "パスワードには数字とアルファベットをそれぞれ1文字以上 含めるようにしてください",
        'format_error_length' => 'パスワードは8文字以上12文字以内で設定してください',
        'confirmed' => 'パスワードとパスワード・確認が不一致です',
        'letters' => '入力したパスワードが不正です',
        'numbers' => '入力したパスワードが不正です',
        'same' => 'パスワードと再パスワードが不一致です',
    ],
    'present' => ':attributeが存在する必要があります。',
    'prohibited' => ':attributeは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeは禁止されています。',
    'prohibited_unless' => ':otherが:valuesにない限り、:attributeは禁止されています。',
    'prohibits' => ':attributeフィールドは、:otherが存在することを禁止します。',
    'regex' => ':attributeは無効な形式です。',
    'required' => ':attributeを入力してください',
    'required_array_keys' => 'attribute フィールドには、以下のエントリを含める必要があります。:values。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valueではない場合、:attributeは必須です。',
    'required_with' => ':valuesのうち一つでも存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesのうち全て存在する場合、:attributeは必須です。',
    'required_without' => ':valuesのうちどれか一つでも存在していない場合、:attributeは必須です。',
    'required_without_all' => ':valuesのうち全て存在していない場合、:attributeは必須です。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:sizeキロバイトでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeには:sizeが含まれている必要があります。',
    ],
    'starts_with' => ':attributeは:valuesのいずれかで始まる必要があります。',
    'string' => ':attributeは文字列でなければなりません。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeはすでに使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは無効な形式です。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',
    'password' => [
        'format_error' => "※パスワードには数字とアルファベットをそれぞれ1文字以上",
        'format_error_length' => '※パスワードは8文字以上12文字以内で設定してください',
        'required_confirmed' => 'パスワード確認を入力してください',
        'same' => 'パスワードと再パスワードが不一致です',
        'confirmed' => 'パスワードとパスワード・確認が不一致です',
    ],
    'withdrawal' => [
        'reason' => "退会理由を選択してください",
        'reasonDetail' => "退会理由を教えてください",
    ],
    'confirmed_password_required' => 'パスワード確認を入力してください',
    'input_error' => '入力したパスワードが不正です',
    'same_password' => '入力されたパスワードは、以前のパスワードと同じです',
    'exist_select' => ' :attributeを選択してください',
    'telephone.invalid' => '電話番号は無効な形式です。',
    'img_validation' => [
        'mimes' => ':attributeはjpg, pngタイプのファイルでなければなりません。',
        'file' => ':attributeには:max KBのファイルを指定してください。',
    ],


    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーションの言語行
    |--------------------------------------------------------------------------
    |
    | ここでは、「attribute.rule」という規則を使用して行に名前を付けて、
    | 属性のカスタム検証メッセージを指定できます。 これにより、特定の属性ルールに
    | 特定のカスタム言語行をすばやく指定できます。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性
    |--------------------------------------------------------------------------
    |
    | 次の言語行を使用して、属性プレースホルダーを「email」ではなく「E-Mail Address」などの
    | 読みやすいものに置き換えます。 これは単にメッセージをより表現力豊かにするのに役立ちます。
    |
    */

    'attributes' => [
    ],

];
