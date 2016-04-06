<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Authentication\Adapter\DbTable,
    Zend\Session\Container as SessionContainer,
    Zend\View\Model\ViewModel,
    Auth\Model\User,
    Auth\Form\Login,
    Auth\Auth\Adapter\Twitter as AuthTwitter;

class LoginController extends AbstractActionController
{
    public function loginAction()
    {
        $authService = $this->serviceLocator->get('auth_service');
        if ($authService->hasIdentity()) {
            // if not log in, redirect to login page
            return $this->redirect()->toRoute('admin');
        }

        $form = new Login;
        $loginMsg = array();
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if (!$form->isValid()) {
                // not valid form
                return new ViewModel(array(
                    'title' => 'Log In',
                    'form' => $form
                ));
            }

            $dbAdapter = $this->serviceLocator->get('Zend\Db\Adapter\Adapter');
            $loginData = $form->getData();
            $authAdapter = new DbTable($dbAdapter, 'user', 'username', 'password', 'MD5(?)');
            $authAdapter->setIdentity($loginData['username'])
                ->setCredential($loginData['password']);
            $authService = $this->serviceLocator->get('auth_service');
            $authService->setAdapter($authAdapter);
            $result = $authService->authenticate();
            if ($result->isValid()) {
                // set id as identifier in session
                $userId = $authAdapter->getResultRowObject('id')->id;
                $authService->getStorage()
                    ->write($userId);
                return $this->redirect()->toRoute('admin');
            } else {
                $loginMsg = $result->getMessages();
            }
        }

        return new ViewModel(array('title' => 'Log In',
            'form' => $form,
            'loginMsg' => $loginMsg
        ));
    }

    public function logoutAction()
    {
        $authService = $this->serviceLocator->get('auth_service');
        if (!$authService->hasIdentity()) {
            // if not log in, redirect to login page
            echo ('redirect');
            return $this->redirect()->toUrl('/login');
        }

        $authService->clearIdentity();
        $form = new Login();
        $viewModel = new ViewModel(array('loginMsg' => array('Pomyślnie wylogowano!'),
            'form' => $form,
            'title' => 'Log out'
        ));
        $viewModel->setTemplate('auth/login/login.phtml');
        return $viewModel;
    }

    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Auth\Model\UserTable');
        }

        return $this->userTable;
    }
}
