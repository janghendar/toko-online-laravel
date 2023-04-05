<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace Illuminate\Http {
    
    /**
     * @method array validate(array $rules, ...$params)
     * @method array validateWithBag(string $errorBag, array $rules, ...$params)
     * @method bool hasValidSignature($absolute = true)
     * @method bool hasValidRelativeSignature()
     * @method string sanitize_html($value)
     * @method mixed custom_html($value)
     */
    class Request {}
}

namespace Illuminate\Routing {
    
    /**
     * @method $this role($roles = [])
     * @method $this permission($permissions = [])
     */
    class Route {}
}

namespace Illuminate\Support {
    
    /**
     * @method $this debug()
     */
    class Collection {}
}

namespace Illuminate\Support\Facades {
    
    /**
     * @method void emailVerification()
     * @method void auth($options = [])
     * @method void resetPassword()
     * @method void confirmPassword()
     */
    class Route {}
}