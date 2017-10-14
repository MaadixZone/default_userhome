<?php

namespace Drupal\default_userhome\Controller;

use Drupal\Core\Session\AccountInterface;
use Drupal\Component\Utility\Crypt;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\user\Form\UserPasswordResetForm;
use Drupal\user\UserDataInterface;
use Drupal\user\UserInterface;
use Drupal\user\UserStorageInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DefaultUserhomeController extends ControllerBase {

  private $userdata;

  public function __construct(){

    $this->userdata = \Drupal::currentUser();
  }

  /**
   * Redirects users to their user pages from any other page.
   * 
   *
   * This controller assumes that it is only invoked for authenticated users.
   * This is enforced for the 'user.page' route with the '_user_is_logged_in'
   * requirement.
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   *   Returns a redirect to the profile of the currently logged in user.
   */
  public function redirectUserHome() {
    return $this->redirect('view.order_items.page_1', ['user' => $this->userdata->id()]);
  }
}

