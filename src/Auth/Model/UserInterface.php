<?php
/**
 * Cross Applicant Management
 *
 * @filesource
 * @copyright (c) 2013 Cross Solution (http://cross-solution.de)
 * @license   GPLv3
 */

/** Auth model */
namespace Auth\Model;

use Core\Model\ModelInterface;

/**
 * User model interface 
 */
interface UserInterface extends ModelInterface
{
    /**
     * Sets the email.
     * 
     * @param string $email
     */
    public function setEmail($email);
    
    /**
     * Gets the email
     * 
     * @return string
     */
    public function getEmail();
    
    /**
     * Sets the first name
     * 
     * @param string $name
     */
    public function setFirstName($name);
    
    /**
     * Gets the first name
     *
     * @return string
     */
    public function getFirstName();
    
    /**
     * Sets the last name
     *
     * @param string $name
     */
    public function setLastName($name);
    
    /**
     * Gets the last name
     *
     * @return string
     */
    public function getLastName();
    
    /**
     * Sets the display name
     *
     * @param string $name
     */
    public function setDisplayName($name);
    
    /**
     * Gets the display name
     *
     * @return string
     */
    public function getDisplayName();
    
    /**
     * Sets the profile info from Hybridauth
     * 
     * @param array $profile
     */
    public function setProfile(array $profile);
    
    /**
     * Gets the profile info from Hybridauth
     * 
     * @return array
     */
    public function getProfile();
    
}