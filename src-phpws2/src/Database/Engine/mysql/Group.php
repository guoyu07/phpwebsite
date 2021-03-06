<?php

namespace phpws2\Database\Engine\mysql;

/**
 *
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @package phpws2
 * @license http://opensource.org/licenses/lgpl-3.0.html
 */
class Group extends \phpws2\Database\Group {

    public function allowedType($type)
    {
        return in_array($type, array(GROUP_BASE, GROUP_ROLLUP));
    }

    /**
     *
     * @return string
     * @throws \Exception If the wrong group type is set
     */
    public function __toString()
    {
        // GROUP_BASE leaves this as null
        $type = null;

        if ($this->type == GROUP_ROLLUP) {
            $type = ' WITH ROLLUP';
        } elseif ($this->type != GROUP_BASE) {
            throw new \Exception('Unknown group type');
        }

        $fields = implode(',', $this->fields);

        return "GROUP BY $fields$type";
    }

}

