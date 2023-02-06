<?php

namespace App\Helpers;

class ConstantHelper
{

    //for app config
    public const CONFIG_APP_NAME = 'app.name';
    public const CONFIG_APP_URL_DEFAULT = 'http://localhost';
    public const CONFIG_DB_HOST_DEFAULT = '127.0.0.1';
    public const CONFIG_GITLAB_FINAL_COMMAND = 'gitlab:final';
    public const CONFIG_COMMON_UNLINK_COMMAND = 'common:unlink';
    public const CONFIG_COMMON_NOTIFICATIONS_DOMAIN = 'localhost.net';
    public const BUYER_REWARD = 0.05;
    public const MAX_FILE_SIZE_KB = 5000;
    public const MAX_ANY_FILE_SIZE_KB = 25000;


    //for validation
    public const STRING_MAX_12 = 'max:12';
    public const STRING_MAX_14 = 'max:14';
    public const STRING_MAX_15 = 'max:15';
    public const STRING_MAX_255 = 'max:255';
    public const STRING_MAX_50 = 'max:50';
    public const STRING_MAX_55 = 'max:55';
    public const STRING_MAX_63 = 'max:63';
    public const STRING_MAX_40 = 'max:40';
    public const STRING_MAX_500 = 'max:500';
    public const STRING_MAX_510 = 'max:510';
    public const STRING_MAX_2048 = 'max:2048';
    public const INT_MAX_40 = 'max:40';
    public const INT_MAX_400 = 'max:400';
    public const INT_MAX_1000 = 'max:1000';
    public const INT_MAX_2000 = 'max:2000';
    public const INT_MAX_100000 = 'max:100000';
    public const INT_MAX_1000000 = 'max:1000000';
    public const INT_MIN_0 = 'min:0';
    public const INT_MIN_1 = 'min:1';
    public const INT_MIN_2 = 'min:2';
    public const INT_MIN_25 = 'min:25';
    public const DOUBLE_MIN_01 = 'min:0.1';
    public const DOUBLE_MIN_001 = 'min:0.01';
    public const DOUBLE_MIN_005 = 'min:0.05';
    public const NUMERIC_MAX_MILLION = 'max:1000000';
    public const IMAGE_MIMES = 'mimes:jpeg,jpg,pjpeg,png,webp';
    public const FILES_MIMES = 'mimes:jpg,jpeg,png,webp,gif,pdf,csv,xls,xlsx,xml,doc,docx,txt,rtf,log,odt,md';
    public const IMAGE_FILES_MIMES = 'mimes:jpg,jpeg,png';
    public const IMAGE_MAX_FILE_SIZE = 'max:' . self::MAX_FILE_SIZE_KB;
    public const MAX_FILE_SIZE = 'max:' . self::MAX_ANY_FILE_SIZE_KB;
    public const REGEX_DIGITS_AND_LATIN = 'regex:^[a-zA-Z0-9]+$^';
    public const VALIDATION_MESSAGE_ATTRIBUTE_IS_INVALID = ':attribute is invalid.';
    public const MYSQL_INT_MIN = 'min:-2147483648';
    public const MYSQL_INT_MAX = 'max:2147483647';
    public const MYSQL_INT_UNSIGNED_MAX = 'max:4294967295';
    public const INT_VALUE_1 = 1;
    public const INT_VALUE_2 = 2;
    public const INT_VALUE_40 = 40;
    public const INT_VALUE_400 = 400;
    public const INT_VALUE_1000 = 1000;
    public const INT_VALUE_2000 = 2000;
    public const INT_VALUE_1000000 = 1000000;
    public const DOUBLE_VALUE_001 = 0.01;
    public const DOUBLE_VALUE_005 = 0.05;
    public const VALUE_ZERO = 0;
    public const MIN_ZERO = 'min:0';
    public const REQUIRED_IF_TYPE = 'required_if:type,';
    public const REQUIRED_IF_CREATE = 'required_if:isCreate,true';
    public const MAX_LENGTH_2048 = 2048;

    //abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890~!@#$%^&()_-+=~` /.*>
    public const SKU_PATTERN = '/^[a-zA-Z0-9\~\.\!\@\#\$\%\^\&\(\)\_\-\+\=\~\`\ \*\/\>]+$/';
    public const SKU_PREG_REPLACE_PATTERN = '/[^a-zA-Z0-9\~\.\!\@\#\$\%\^\&\(\)\_\-\+\=\~\`\ \*\/\>]+$/';


    //for languages
    public const MESSAGE_LAST_UPDATED = 'Last Updated';
    public const MESSAGE_FIRST_NAME = 'First Name';
    public const MESSAGE_LAST_NAME = 'Last Name';
    public const CANNOT_FIND_PO_WITH_ID = 'Cannot find purchase order with id';

    //for API/unit tests
    public const MESSAGE_GIVEN_DATA_INVALID = 'The given data was invalid.';
    public const MESSAGE_UNPROCESSABLE_ENTITY = 'Unprocessable Entity';


    //for API urls
    public const URL_ACTION_EMAIL_RESEND = '/email/resend';

    //other
    public const THUMB_IMAGE_WIDTH_200 = 200;
    public const THUMB_IMAGE_HEIGHT_200 = 200;
    public const ACL_PUBLIC_READ = 'public-read';
    public const ACL_PRIVATE = 'private';
    public const FILE_ALIAS_ITEMS = 'items';
    public const FILE_ALIAS_FILES = 'files';
    public const RESPONSE_ALIAS_CREATED = 'created';
    public const RESPONSE_ALIAS_ERRORS = 'errors';
    public const DATE_TIME_FORMAT_ALIAS = 'm/d/Y H:i:s A';

    public const TEST_SERIAL_STRING = '0123456789abcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * @return string
     */
    public static function getFullNameQuery(): string
    {
        $fullNameSearch = "concat(first_name, ' ', last_name)";
        if (env('APP_ENV') === 'testing') {
            $fullNameSearch = "first_name || ' ' || last_name";
        }

        return $fullNameSearch;
    }
}
