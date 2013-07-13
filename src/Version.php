<?php
/**
 * Nweb Image 0.1
 *
 * This script is protected by copyright. It's use, copying, modification
 * and distribution without written consent of the author is prohibited.
 *
 * @category    Nweb
 * @package     Image
 * @author      Krzysztof Kardasz <krzysztof@kardasz.eu>
 * @copyright   Copyright (c) 2013 Krzysztof Kardasz
 * @license     http://www.gnu.org/licenses/lgpl-3.0.txt  GNU Lesser General Public
 * @version     0.1-dev
 * @link        https://github.com/nwebcode/framework
 * @link        http://framework.nweb.pl
 */

namespace Nweb\Image;

/**
 * Informacje o wersji
 *
 * @category    Nweb
 * @package     Image
 * @author      Krzysztof Kardasz <krzysztof@kardasz.eu>
 * @copyright   Copyright (c) 2013 Krzysztof Kardasz
 * @version     0.1-dev
 */
class Version
{
    /**
     * Wersja oprogramowania
     */
    const VERSION = '0.1.0';

    /**
     * Najnowsza dostępna wersja
     *
     * @var string
     */
    protected static $_latestVersion;

    /**
     * Porównanie wersji
     *
     * @param  string  $version wersja
     * @return integer [-1 older, 0 identical, +1 newer]
     */
    public static function compareVersion ($version)
    {
        return version_compare(strtolower($version), strtolower(self::VERSION));
    }

    /**
     * Zwraca najnowszą dostępną wersję oprogramowania
     *
     * @return string
     */
    public static function getLatestVersion ()
    {
        if (null === self::$_latestVersion) {
            self::$_latestVersion = 'not available';
            $handle = fopen('http://image.nweb.pl/api/latest-version', 'r');
            if (false !== $handle) {
                self::$_latestVersion = stream_get_contents($handle);
                fclose($handle);
            }
        }
        return self::$_latestVersion;
    }
}