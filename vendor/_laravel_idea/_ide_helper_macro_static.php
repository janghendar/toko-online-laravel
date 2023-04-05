<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace Illuminate\Http {
    
    /**
     * @method static array validate(array $rules, ...$params)
     * @method static array validateWithBag(string $errorBag, array $rules, ...$params)
     * @method static bool hasValidSignature($absolute = true)
     * @method static bool hasValidRelativeSignature()
     * @method static string sanitize_html($value)
     * @method static mixed custom_html($value)
     */
    class Request {}
}

namespace Illuminate\Routing {
    
    /**
     * @method static $this role($roles = [])
     * @method static $this permission($permissions = [])
     */
    class Route {}
}

namespace Illuminate\Support {
    
    /**
     * @method static $this debug()
     */
    class Collection {}
}

namespace Illuminate\Support\Facades {
    
    /**
     * @method static void emailVerification()
     * @method static void auth($options = [])
     * @method static void resetPassword()
     * @method static void confirmPassword()
     */
    class Route {}
}