<?php

/**
 * Description of CommonVariabels
 *
 * @author Rohmad
 */
class CommonVariabels
{
    
    // Reserved icons
    public static $HOME_ICON = '../icons/home.png';
    public static $BACK_ICON = '../icons/back.png';
    public static $ADD_ICON = '../icons/add-icon.png';
    public static $EDIT_ICON = '../icons/edit-content.jpg';
    public static $LOGOUT_ICON = '../icons/logout.png';
    public static $APPROVE_ICON = '../icons/approve.png';
    public static $DETAIL_ICON = '../icons/detail.jpg';
    public static $DELETE_ICON = '../icons/block.png';
    
    // defaults
    public static $DEFAULT_USER_ICON = '../uploads/user/default.jpg';
    public static $DEFAULT_IMAGE_ICON = '../uploads/images/default.jpg';
    
    //sessions
    public static $LOGIN_STATUS = 'status';
    public static $CURRENT_USER = 'user';
    public static $PREVILEGE = 'previlege';
    public static $PREVILEGES = array(1 => 'Super User', 0 => 'Common User', -1 => 'Freezed');
    
    // users
    public static $ADMIN = 1;
    public static $USER = 0;
    public static $BLOCKED = -1;
}

?>
