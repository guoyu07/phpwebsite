<?php
/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 */
namespace contact;

/**
 *
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @license http://opensource.org/licenses/lgpl-3.0.html
 */
class Module extends \Module implements \SettingDefaults
{

    public function __construct()
    {
        parent::__construct();
        $this->setTitle('contact');
        $this->setProperName('Contact');
    }

    public function getController(\Request $request)
    {
        $cmd = $request->shiftCommand();
        if ($cmd == 'admin' && \Current_User::allow('contact')) {
            $admin = new \contact\Controller\Admin($this);
            return $admin;
        } else {
            \Current_User::requireLogin();
        }
    }

    public function runTime(\Request $request)
    {
    }

    public function getSettingDefaults()
    {
        // ContactInfo
        $settings['room_number'] = '';
        $settings['building'] = '';
        $settings['street'] = '';
        $settings['post_box'] = '';
        $settings['city'] = '';
        $settings['state'] = '';
        $settings['zip'] = '';
        
        // Offsite
        $settings['links'] = '';
        
        // Map
        $settings['image'] = '';
        $settings['map_link'] = '';
        
        return $settings;
    }

}

?>