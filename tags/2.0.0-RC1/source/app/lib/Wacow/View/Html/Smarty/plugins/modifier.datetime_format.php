<?php
/**
 * Smarty plugin
 *
 * Output formated datetime.
 *
 * Examples:
 * <code>
 * <% $createDateTime|datetime_format:'Y-m-d' %>
 * </code>
 *
 * @package     Wacow_View
 * @subpackage  Wacow_View_Html_Smarty
 * @version     $Id$
 */

/**
 * smarty_modifier_datetime_format
 *
 * @param string $string
 * @param string $format
 * @param bool $currentDateTime
 * @return string
 */
function smarty_modifier_datetime_format($string, $format, $currentDateTime = true)
{
    if ($string) {
        $datetime = date($format, strtotime($string));
    } elseif ($currentDateTime) {
        $datetime = date($format);
    } else {
        $datetime = '';
    }
    return $datetime;
}