REMINDERS:

- Always use the blade template in <script> tags
- Always add the execute() in the try{} of a query function

ADMIN - add/delete users 
AIC - production report
BM - weekly report
COR - track/avail/view
DIC - production report
OM - weekly report

TO DO:
-Password error trapping
-Personal information module error trapping
-Availing module – 2nd drop down should be disabled first if 1st drop down is not filled up	
-Error message in input types should be confirmed automatically to user
-Arrival and departure error trapping
- ADD INPUT FILTERING AND ERROR-TRAPPING FOR AGENT MODULE

3/17/2017 2:12am
- Polished the scripts in the admin module.

3/17/2017 12:27am
- Changed the admin module functions into one.

3/16/2017 6:29am
- Added Delete User function to Admin Module.

3/16/2017 5:38am
- Changed the sweetalert message to snackbar notifications except the logout alert.

3/16/2017 5:01am
- Added Add User function to Admin Module

3/16/2017 1:47am
- Added an Error 404 page for undefined routes.

3/16/2017 12:46am
- Disabled the SMTP function of the Mail class [hosting site]

3/15/2017 3:35am
- Weekly Report Function finished

3/12/2017
- Uploaded website to internet

3/12/2017 4:39
- Updated Create account UI
- Updated Admin UI 

3/9/2017 7:13am
- The Production Report for Domestic-in-Charge is now functional w/ print.

3/9/2017 7:01am
- The Production Report for Accounting-in-Charge is now functional w/ print.

3/9/2017 3:53am
- The footer is hidden in the About tab.

3/9/2017 3:49am
- Replaced the Project tab with About tab.

3/9/2017 2:52am
- After creating an account, the user is authenticated and automatically logged-in.

3/9/2017 2:08am
- Forgot Password Function fully working with email verification and database connection.

3/8/2017 2:13am
- Changed the input type of the Track Module to "text" and added the pattern attribute. The textbox only accepts 5 digit numbers greater than 00000.

3/6/2017 5:46pm
- When text is entered in the Corporate fields in the Account Module, it is cleared when the Individual user is selected.

3/6/2017 5:09pm
- Contact number field has a 7-11 digit limit.

3/6/2017 4:43pm
- Set the character limit of email, username, and password fields to 50,25,20 respectively.

3/6/2017 4:34pm
- First and Last Name fields now have a character limit of 25.

3/6/2017 4:27pm
- Changed the input type for password and confirm password field in Create Account Module from "text" to "password".

3/6/2017 4:20pm
- Changed the "single user" label to "Individual" of the user type in Create Account Module.

3/6/2017 2:48pm
- Removed the username field in the Forgot Password function.

3/6/2017 2:47pm
- Replaced the default mail() with the phpMailer library. Added Mail class.

3/5/2017 11:00pm
- Fixed the redirection of change password function in user/corporate modules.

3/04/2017 2:14pm
- Corp and User Avail Okay

3/4/2017 5:18am
- Added the print functionality for weekly report(BM module) and production report(AIC and DIC Module)

3/4/2017 4:58am
- Removed the username field from the Change Password function

3/4/2017 3:26am
- Fixed the error-trapping of the Create Account function.

3/4/2017 1:30am
- The Create Account Module is now connected to the database and working.

3/4/2017 1:25am
- The "/create-account" will no longer open a new tab.

3/3/2017 10:30pm
- The corporate fields is disabled by default unless the user selects "corporate" as user type.

3/3/2017 8:53pm
- Changed the url of the Create Account Module from "/avail" to "/create-account"

3/3/2017 8:15pm
-Fixed and connected the dropdowns in the Avail function of User/Corporate Module

3/3/2017 3:08pm
- Removed track page in Admin module
- Added track page in Agent module
- Added change password for employees/clients in Admin module
- Added "Save As PDF" button for BM,AIC,DIC module


3/3/2017 2:35am
- Removed Client_info table
- Added municipalities/cities for Origin and Destination
- Updated Table data in Past Transaction

3/3/2017 1:10am
- Updated AIC module (production report)
- Added Drop-down for package type (user module in availing)
- Added Drop-down User and corporate Origin and destination (user module in availing)

3/2/2017 12:10pm
- Fixed User Avail
- Only one account creation instead of two


3/1/2017 11:25pm
- Fixed the print module for past transactions for user and corporate accounts.


2/28/2017 10:12pm
- Paki ayos yung dalawang print module na ginawa ko haha walang output na lumalabas 
  kung ano yung laman ng PASTTRANSACTIONS ng user o ng corporate ayun lang din nakalagay don parang yung nasa naunang print gegeg GLHF! 

2/28/2017 9:18pm
- Added corporate module (no queries)
- Added user module (no queries)
- Same content for corporate and user  

2/28/2017 4:58pm
- UPDATED DATABASE
- Pictures of Project page (okay)
- Create an account from track to Log-In page (okay)
- Forgot Password module (no query)
- Individual and corporate clients have an account 

2/24/2017 11:50am
- The agent module is now connected to the database.

2/24/2017 10:45am
- The track result module is now connected to the database.

2/24/2017 5:54am
- Updated the UI and Database.

2/24/2017 1:40am
-The user can only input specific characters into the 'username' field of the login module.

2/24/2017 12:56am
-The user can only input correct name patterns into the 'name' field of the contact module.

2/23/2017 10:02pm
- Sanitized all the superglobal variables and added the "acm_" prefix.

2/23/2017 8:15pm
- Changed the input type into number for tracking number. Also removed the spinners for that input type.

2/22/2017 3:47am
- Added filtering in mail sending for security purposes.

2/22/2017 3:12am
- There is a confirmation that will alert the user if the email is successfully sent or not.

2/22/2017 1:00am
- The print tab automatically closes when the print popup closes.

2/20/2017 11:48pm
- The system can now send email to the company.

2/16/2017 8:10pm 
- Finished the mail function but not yet integrated into the system