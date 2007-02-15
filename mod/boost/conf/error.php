<?php
  /**
   * @version $Id$
   * @author Matthew McNaney <mcnaney at gmail dot com>
   */

translate('boost');
$errors[BOOST_ERR_NOT_MODULE]       = _('Object sent to boost was not of the PHPWS_Module class.');
$errors[BOOST_ERR_NO_INSTALLSQL]    = _('Unable to locate SQL import file.');
$errors[BOOST_NO_MODULES_SET]       = _('Modules have not been set.');
$errors[BOOST_FAILED_PRE94_INSTALL] = _('Failed installation of module.');
$errors[BOOST_FAILED_PRE94_UPGRADE] = _('Failed upgrade of module.');
$errors[BOOST_NO_REGISTER_FILE]     = _('Module is missing register file.');
$errors[BOOST_NO_REGISTER_FUNCTION] = _('Module is missing register function.');
$errors[BOOST_FAILED_BACKUP]        = _('Unable to make a backup of a local module file.');
$errors[BOOST_FAILED_LOCAL_COPY]    = _('Failed to copy file to local directory.');
translate();
?>