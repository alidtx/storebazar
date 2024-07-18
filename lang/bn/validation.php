<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute অবশ্যই গ্রহণ করতে হবে।',
    'accepted_if' => ':attribute অবশ্যই গ্রহণ করতে হবে যখন :অন্যান্য হয় :value',
    'active_url' => ':attribute একটি বৈধ URL নয়।',
    'after' => ':attribute অবশ্যই :date এর পরে একটি তারিখ হতে হবে৷',
    'after_or_equal' => ':attribute অবশ্যই :date এর পরে বা তার সমান হতে হবে৷',
    'alpha' => ':attribute শুধুমাত্র অক্ষর থাকতে হবে।',
    'alpha_dash' => ':attribute শুধুমাত্র অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে হবে।',
    'alpha_num' => ':attribute শুধুমাত্র অক্ষর এবং সংখ্যা থাকতে হবে।',
    'array' => ':attribute একটি অ্যারে হতে হবে।',
    'before' => ':attribute অবশ্যই :date এর আগে একটি তারিখ হতে হবে।',
    'before_or_equal' => ':attribute অবশ্যই :date এর আগে বা সমান একটি তারিখ হতে হবে।',
    'between' => [
        "array" => ":attribute এর মধ্যে থাকতে হবে :min এবং :max আইটেম।",
        "file" => ":attribute অবশ্যই :min এবং :max কিলোবাইটের মধ্যে হতে হবে৷",
        "numeric" => ":attribute অবশ্যই :min এবং :max এর মধ্যে হতে হবে।",
        "string" => ":attribute অবশ্যই :min এবং :max অক্ষরের মধ্যে হতে হবে।",
    ],
    "boolean" => ":attribute ক্ষেত্রটি সত্য বা মিথ্যা হতে হবে।",
    "confirmed" => ":attribute নিশ্চিতকরণ মেলে না।",
    "current_password" => "পাসওয়ার্ডটি ভূল.",
    "date" => ":attribute একটি বৈধ তারিখ নয়।",
    "date_equals" => ":attribute অবশ্যই :date এর সমান একটি তারিখ হতে হবে।",
    "date_format" => ":attribute বিন্যাস :ফর্ম্যাটের সাথে মেলে না।",
    "declined" => ":attribute অবশ্যই প্রত্যাখ্যান করতে হবে।",
    "declined_if" => ":attribute অবশ্যই প্রত্যাখ্যান করতে হবে যখন :অন্যান্য হয় :মান।",
    "different" => ":attribute এবং :other আলাদা হতে হবে।",
    "digits" => ":attribute অবশ্যই :ডিজিটের সংখ্যা হতে হবে।",
    "digits_between" => ":attribute অবশ্যই :min এবং :max সংখ্যার মধ্যে হতে হবে।",
    "dimensions" => ":অ্যাট্রিবিউটের অবৈধ চিত্রের মাত্রা রয়েছে।",
    "distinct" => ":attribute ক্ষেত্রের একটি ডুপ্লিকেট মান আছে।",
    "doesnt_end_with" => ":attribute নিম্নলিখিত: :values এর একটি দিয়ে শেষ নাও হতে পারে।",
    "doesnt_start_with" => ":attribute নিম্নলিখিতগুলির একটি দিয়ে শুরু নাও হতে পারে: :values৷",
    "email" => ":attribute একটি বৈধ ইমেল ঠিকানা হতে হবে।",
    "ends_with" => ":attribute অবশ্যই নিম্নলিখিতগুলির একটি দিয়ে শেষ হতে হবে: :values৷",
    "enum" => "নির্বাচিত :attribute অবৈধ।",
    "exists" => "নির্বাচিত :attribute অবৈধ।",
    "file" => ":attribute একটি ফাইল হতে হবে।",
    "filled" => ":attribute ক্ষেত্রের একটি মান থাকতে হবে।",
    'gt' => [
        "array" => ":attribute-এ অবশ্যই :value আইটেম এর থেকে বেশি থাকতে হবে।",
        "file" => ":attribute অবশ্যই :value কিলোবাইটের চেয়ে বেশি হতে হবে।",
        "numeric" => ":attribute অবশ্যই :value এর থেকে বড় হতে হবে।",
        "string" => ":attribute অবশ্যই :value অক্ষরের চেয়ে বড় হতে হবে।",
    ],
    'gte' => [
        "array" => ":attribute-এর অবশ্যই :value আইটেম বা তার বেশি থাকতে হবে।",
        "file" => ":attribute অবশ্যই :value কিলোবাইটের থেকে বড় বা সমান হতে হবে।",
        "numeric" => ":attribute অবশ্যই :value এর থেকে বড় বা সমান হতে হবে।",
        "string" => ":attribute অবশ্যই :value অক্ষরের চেয়ে বড় বা সমান হতে হবে।",
    ],
    "image" => ":attribute একটি ইমেজ হতে হবে।",
    "in" => "নির্বাচিত :attribute অবৈধ।",
    "in_array" => ":attribute ক্ষেত্রটি :other মধ্যে বিদ্যমান নেই।",
    "integer" => ":attribute একটি পূর্ণসংখ্যা হতে হবে।",
    "ip" => ":attribute একটি বৈধ আইপি ঠিকানা হতে হবে।",
    "ipv4" => ":attribute একটি বৈধ IPv4 ঠিকানা হতে হবে।",
    "ipv6" => ":attribute একটি বৈধ IPv6 ঠিকানা হতে হবে।",
    "json" => ":attribute একটি বৈধ JSON স্ট্রিং হতে হবে।",
    "lowercase" => ":attribute ছোট হাতের হতে হবে।",
    'lt' => [
        "array" => ":attribute এর থেকে কম :value আইটেম থাকতে হবে।",
        "file" => ":attribute অবশ্যই :value কিলোবাইটের চেয়ে কম হতে হবে।",
        "numeric" => ":attribute অবশ্যই :value-এর চেয়ে কম হতে হবে।",
        "string" => ":attribute অবশ্যই :value অক্ষরের চেয়ে কম হতে হবে।",
    ],
    'lte' => [
        "array" => ":attribute অবশ্যই :value আইটেমের বেশি থাকা উচিত নয়।",
        "file" => ":attribute অবশ্যই :value কিলোবাইটের থেকে কম বা সমান হতে হবে।",
        "numeric" => ":attribute অবশ্যই :value এর থেকে কম বা সমান হতে হবে।",
        "string" => ":attribute অবশ্যই :value অক্ষরের চেয়ে কম বা সমান হতে হবে।",
    ],
    'mac_address' => ':attribute একটি বৈধ MAC ঠিকানা হতে হবে।',
    'max' => [
        "array" => ":attribute-এ অবশ্যই :max এর বেশি আইটেম থাকতে হবে না।",
        "file" => ":attribute অবশ্যই :max kilobytes-এর থেকে বেশি হওয়া উচিত নয়৷",
        "numeric" => ":attribute অবশ্যই :max এর থেকে বেশি হওয়া উচিত নয়।",
        "string" => ":attribute অবশ্যই :max অক্ষরের চেয়ে বেশি হওয়া উচিত নয়৷",
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        "array" => ":attribute কমপক্ষে :min আইটেম থাকতে হবে।",
        "file" => ":attribute অবশ্যই কমপক্ষে :min কিলোবাইট হতে হবে৷",
        "numeric" => ":attribute অন্তত :min হতে হবে।",
        "string" => ":attribute অন্তত :min অক্ষর হতে হবে।",
    ],
    "min_digits" => ":attribute কমপক্ষে :min সংখ্যা থাকতে হবে।",
    "multiple_of" => ":attribute অবশ্যই :value-এর একাধিক হতে হবে।",
    "not_in" => "নির্বাচিত :attribute অবৈধ।",
    "not_regex" => ":attribute বিন্যাসটি অবৈধ।",
    "numeric" => ":attribute একটি সংখ্যা হতে হবে।",
    'password' => [
        "letters" => ":attribute অন্তত একটি অক্ষর থাকতে হবে।",
        "mixed" => ":attribute অন্তত একটি বড় হাতের এবং একটি ছোট হাতের অক্ষর থাকতে হবে।",
        "numbers" => ":attribute অন্তত একটি সংখ্যা থাকতে হবে।",
        "symbols" => ":attribute অন্তত একটি চিহ্ন থাকতে হবে।",
        "uncompromised" => "প্রদত্ত :attribute একটি ডেটা ফাঁসের মধ্যে উপস্থিত হয়েছে। অনুগ্রহ করে একটি ভিন্ন :attribute চয়ন করুন",
    ],
    "present" => ":attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।",
    "prohibited" => ":attribute ক্ষেত্রটি নিষিদ্ধ।",
    "prohibited_if" => ":attribute ক্ষেত্রটি নিষিদ্ধ যখন :অন্যান্য হয় :মান।",
    "prohibited_unless" => ":attribute ক্ষেত্রটি নিষিদ্ধ যদি না :অন্য :মানে থাকে।",
    "prohibits" => ":attribute ক্ষেত্রটি :অন্যকে উপস্থিত হতে নিষেধ করে।",
    "regex" => ":attribute বিন্যাসটি অবৈধ।",
    "required" => ":attribute ক্ষেত্র প্রয়োজন।",
    "required_array_keys" => ":attribute ফিল্ডে অবশ্যই: :values এর জন্য এন্ট্রি থাকতে হবে।",
    "required_if" => ":attribute ফিল্ডের প্রয়োজন হয় যখন :other হয় :value",
    "required_if_accepted" => "যখন :other গৃহীত হয় তখন :attribute ফিল্ডের প্রয়োজন হয়।",
    "required_unless" => ":attribute ক্ষেত্রটি আবশ্যক যদি না :other :values থাকে।",
    "required_with" => "যখন :values উপস্থিত থাকে তখন :attribute ফিল্ডের প্রয়োজন হয়।",
    "required_with_all" => "যখন :values উপস্থিত থাকে তখন :attribute ফিল্ডের প্রয়োজন হয়।",
    "required_without" => "যখন :values উপস্থিত না থাকে তখন :attribute ফিল্ডের প্রয়োজন হয়।",
    "required_without_all" => ":values কোনোটি উপস্থিত না থাকলে :attribute ক্ষেত্রের প্রয়োজন হয়৷",
    'same' => ':attribute এবং :other অবশ্যই মিলবে।',
    'size' => [
        "array" => ":attribute অবশ্যই :size আইটেম থাকতে হবে।",
        "file" => ":attribute অবশ্যই :size কিলোবাইট হতে হবে।",
        "numeric" => ":attribute অবশ্যই :size হতে হবে।",
        "string" => ":attribute অবশ্যই :size অক্ষর হতে হবে।",
    ],
    "starts_with" => ":attribute টি অবশ্যই নিম্নলিখিতগুলির একটি দিয়ে শুরু করতে হবে: :values৷",
    "string" => ":attribute একটি স্ট্রিং হতে হবে।",
    "timezone" => ":attribute একটি বৈধ টাইমজোন হতে হবে।",
    "unique" => ":attribute ইতিমধ্যে নেওয়া হয়েছে।",
    "uploaded" => ":attribute আপলোড করতে ব্যর্থ হয়েছে।",
    "uppercase" => ":attribute বড় হাতের হতে হবে।",
    "url" => ":attribute একটি বৈধ URL হতে হবে।",
    "uuid" => ":attribute অবশ্যই একটি বৈধ UUID হতে হবে।",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
