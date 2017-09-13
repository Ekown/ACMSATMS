<?php

//this is where all the routes are defined

// <----------------- FRONT-END ROUTES ------------------->

//get request router for the home page
$router->get('','PagesController@home');

$router->get('about', 'PagesController@viewAbout');

$router->get('contact', 'PagesController@contact');

$router->post('contact','PagesController@email');

$router->get('track', 'PagesController@track');

$router->get('create-account','PagesController@viewCreateAccount');

$router->post('create-account','PagesController@createAccount');

$router->post('check-email','AjaxController@checkEmails'); //MASTER ERON

$router->post('check-company-name','AjaxController@checkCompanyName'); //MASTER ERON

$router->post('check-username','AjaxController@checkUsername');

$router->post('check-password','AjaxController@checkPassword');

$router->post('check-oldpassword','AjaxController@checkOldPassword'); //MASTER ERON (6/23)

$router->get('forgot-password','PagesController@viewForgotPassword');

$router->get('confirm_email','PagesController@viewConfirmEmail');

$router->post('forgot-password/'.session_id(),'PagesController@forgotPassword');

$router->get('forgot-password/'.$_SESSION['acm_shuffle_url'],'PagesController@viewResetPassword');

$router->post('forgot-password/'.$_SESSION['acm_shuffle_url'],'PagesController@resetPassword');

$router->get('activate-account/'.$_SESSION['acm_shuffle_url'],'PagesController@activateAccount'); //master eron

$router->post('result', 'PagesController@result');

//get request router for the login page
$router->get('login', 'PagesController@login');

//post request router for the login page
$router->post('login', 'LoginController@authenticate');

// <----------------- BACK-END ROUTES ------------------->

//ADMIN ROUTES
$router->get('administrator/index', 'BackendController@admin_index');

$router->get('administrator/add-employee', 'BackendController@viewAdminAddemployee');

$router->post('administrator/add-employee', 'BackendController@adminAddemployee');

$router->get('administrator/delete-employee', 'BackendController@viewAdminDeleteemployee');

$router->post('administrator/delete-employee', 'BackendController@adminDeleteemployee');

//AGENT ROUTES
$router->get('agent/search', 'BackendController@agent_search');

$router->post('agent/search', 'BackendController@agentResult');

$router->get('agent/index','BackendController@agent_index');

$router->post('agent/update','BackendController@agentUpdate');

$router->post('agent/getProvinces','BackendController@agentGetProvinces'); //master eron 

//CORPORATE ROUTES
$router->get('corporate/past-transactions', 'BackendController@corporatePastTransactions');

$router->get('corporate/track', 'BackendController@corporate_track'); //track

$router->post('corporate/avail', 'BackendController@postCorporateAvail'); //avail

$router->get('corporate/avail', 'BackendController@corporate_avail'); //avail

$router->post('corporate/track', 'BackendController@corporateResult'); //track

$router->get('corporate/contact', 'BackendController@corpocontact'); // emil //6/2

$router->post('corporate/contact','BackendController@corpoemail'); // emil //6/2

//$router->post('corporate/avail', 'BackendController@corporateAvail'); Roldan


//USER ROUTES (UNUSED)
$router->get('user/avail', 'BackendController@user_avail');

$router->get('user/track', 'BackendController@user_track');

$router->get('user/past-transactions', 'BackendController@userPastTransactions');


//ACCOUNTING-IN-CHARGE ROUTES
$router->get('accounting-in-charge/index','BackendController@aic_index');

$router->get('accounting-in-charge/transaction','BackendController@aic_transaction');

$router->post('accounting-in-charge/transaction','BackendController@aicInvoiceExpenses');

$router->post('accounting-in-charge/prodreport/result','BackendController@aic_result');


//BRANCH MANAGER ROUTES
$router->get('branch-manager/index','BackendController@branch_index');

$router->post('branch-manager/weekreport/result','BackendController@branchWeeklyreport');


//DOMESTIC-IN-CHARGE ROUTES
$router->get('domestic-in-charge/index','BackendController@dic_index');

$router->post('domestic-in-charge/prodreport/result','BackendController@dic_result');

$router->get('domestic-in-charge/production-report','BackendController@domestic_prodreport');


//OPERATIONS MANAGER ROUTES
$router->get('operations-manager/index','BackendController@operations_index');

$router->get('operations-manager/transreport','BackendController@operations_transreport');

$router->post('operations-manager/weekreport/result','BackendController@operationsWeeklyReport');


//CHANGE PASSWORD ROUTES
$router->get('changepass','BackendController@viewchangepass');

$router->post('changepass','BackendController@changepass');

// $router->post('check-email', 'AjaxController@checkPassword')

//get request router for logging out
$router->get('logout', 'BackendController@logout');

// <--------------- PRINT ROUTES ------------------->


$router->get('administrator/print/track',
	'PagesController@printTrackResult');	

$router->get('corporate/print/pasttransactions',
	'BackendController@printCorporatePastTransactions');

$router->get('user/print/pasttransactions',
	'BackendController@printUserPastTransactions');

$router->get('accounting-in-charge/print/prodreport','BackendController@printProdreportAIC');

$router->get('domestic-in-charge/print/prodreport','BackendController@printProdreportDIC');

$router->get('branch-manager/print/weekly-report','BackendController@printWeeklyReport');

$router->get('operations-manager/print/weekly-report','BackendController@printWeeklyReport');