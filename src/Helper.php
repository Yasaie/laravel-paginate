<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-07-15
 */

namespace Yasaie\Paginate;


class Helper
{
    /**
     * @package paginate
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $items
     * @param $current
     * @param $perPage
     *
     * @return \stdClass
     */
    public static function paginate(&$items, $current, $perPage)
    {
        $items = $items instanceof \Illuminate\Support\Collection ? $items : collect($items);
        $page = new \stdClass();
        $page->current = $current ?: 1;
        $page->perPage = $perPage;
        $page->items_count = count($items);
        $page->count = (int)ceil($page->items_count / $page->perPage);

        $items = $items->forPage($page->current, $page->perPage);
        return $page;
    }
}