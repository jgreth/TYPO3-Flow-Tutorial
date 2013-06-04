<?php
namespace JPG\Usertest\Controller;

/**
 * LoginController
 *
 * Handles all stuff that has to do with the login
 */
use TYPO3\FLOW\Annotations as FLOW;
use TYPO3\FLOW\Mvc\Controller\ActionController;

class LoginController extends \TYPO3\Flow\Mvc\Controller\ActionController {

    /**
     * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
     * @Flow\inject
     */
    protected $authenticationManager;

    /**
     * @var \TYPO3\Flow\Security\AccountRepository
     * @Flow\inject
     */
    protected $accountRepository;

        /**
     * @var \TYPO3\Flow\Security\AccountFactory
     * @Flow\inject
     */
    protected $accountFactory;

	/**
	 * @var \TYPO3\Flow\Security\Context
	 */
	protected $securityContext;

	/**
	 * Injects the security context
	 *
	 * @param \TYPO3\Flow\Security\Context $securityContext The security context
	 * @return void
	 */
	public function injectSecurityContext(\TYPO3\Flow\Security\Context $securityContext) {
	    $this->securityContext = $securityContext;
	}

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
	    // example how to access account informations
	    $account = $this->securityContext->getAccount();
	    // \TYPO3\Flow\var_dump($account);
	}

    /**
     * @throws \TYPO3\Flow\Security\Exception\AuthenticationRequiredException
     * @return void
     */
    public function authenticateAction() {
        try {
            $this->authenticationManager->authenticate();
            $this->addFlashMessage('Successfully logged in.');
            $this->redirect('index', 'Login');
        } catch (\TYPO3\Flow\Security\Exception\AuthenticationRequiredException $exception) {
			$this->addFlashMessage('Wrong username or password.');
            $this->addFlashMessage($exception->getMessage());
            throw $exception;
        }
    }

    /**
     * @return void
     */
    public function registerAction() {
        // do nothing more than display the register form
    }

    /**
     * save the registration
     * @param string $name
     * @param string $pass
     * @param string $pass2
     */
    public function createAction($name, $pass, $pass2) {

		$defaultRole = array('JPG.Usertest:Visitor');
        $authenticationProviderName = 'DefaultProvider';

        if($name == '' || strlen($name) < 3) {
            $this->addFlashMessage('Username too short or empty');
            $this->redirect('register', 'Login');
        } else if($pass == '' || $pass != $pass2) {
            $this->addFlashMessage('Password too short or does not match');
            $this->redirect('register', 'Login');
        } else {

            // create a account with password an add it to the accountRepository
            // For Roles etc see Policy.yaml
            $account = $this->accountFactory->createAccountWithPassword($name, $pass, $defaultRole, $authenticationProviderName);
            $this->accountRepository->add($account);

            // add a message and redirect to the login form
            $this->addFlashMessage('Account created. Please login.');
            $this->redirect('index');
        }

        // redirect to the login form
        $this->redirect('index', 'Login');
    }

    public function logoutAction() {
        $this->authenticationManager->logout();
        $this->addFlashMessage('Successfully logged out.');
        $this->redirect('index', 'Login');
    }

}