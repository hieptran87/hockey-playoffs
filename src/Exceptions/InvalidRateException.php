<?php

/**
 * O2Web\HockeyPlayoffs\Exceptions\InvalidRateException
 *
 * PHP version 7
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.ca>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */

namespace O2Web\HockeyPlayoffs\Exceptions;

use Throwable;

/**
 * A exception that is thrown if a rate does not correspond Naming convention
 *
 * @author    Hiep Tran <tranquyhiep87@gmail.com>
 * @copyright 2022 O2Web <info@o2web.ca>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/hieptran87/hockey-playoffs
 * @link      http://o2web.ca
 */
class InvalidRateException extends \Exception
{
    public const NOT_FOUND_CODE = 1;

    /**
     * Construct the exception. Note: The message is NOT binary safe.
     *
     * @param string         $message  [optional] The Exception message to throw.
     * @param int            $code     [optional] The Exception code.
     * @param null|Throwable $previous [optional] The previous throwable used for the exception chaining.
     */
    public function __construct($message = "", $code = self::NOT_FOUND_CODE, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
