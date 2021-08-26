<?php $page_name = "Change Log";?>
<?php $actionPage = "createBackupDevice.php";?>
<?php include("./layouts/framing.php"); ?>
<br>
	
<div class="main-form col-sm-3">
	<h5>Legend</h5>
	<ul class="no-bullet" id="change-log-legend">
		<li>* = Change</li>
		<li>+ = New Feature</li>
		<li>- = Bug Fix</li>
		<li>! = Known Bug</li>
		<li>$ = Temorarily Disabled</li>
		<li># = Removed</li>
	</ul>
</div>
<hr class='hr-changelog'>
<div class='container'>
	<h3>Change Log Index:</h3>
	<a href="#log10">2019.08.09</a>; <a href="#log10">2019.04.26</a>; <a href="#log9">2019.03.15</a>; <a href="#log8">2019.02.15</a>; <a href="#log7">2019.02.08</a>; <a href="#log6">2019.02.01</a>; <a href="#log5">2019.01.31</a>; <a href="#log4">2019.01.29</a>; <a href="#log3">2018.11.11</a>; <a href="#log2">2018.11.04</a>; <a href="#log1">2018.10.14</a>
	<hr class='hr-changelog'>
	<div id="log11">
		<h5>2019.08.09</h5>
		+ Added Client Management Section. This allows for clients to be set as Active or Inactive. Allows you to edit or create locations.<br>
		+ Within Client Management, added listing for All Clients, Active Clients, Inactive Clients. <br>
		+ Added Clients section. This provides a list of all active clients. Provides a list of locations for that client. Allows locations to be edited and added from within the client.<br>
		# Removed the Open in New tab automatically for the User Management.<br>
		- Fixed permission level display. User Mangement previously showed Permissions as a number. They now have the roles listed. These positional names are currently hard-coded and need to be moved to variables.<br>
		+ Returned Feature: Now labeled Feedback/Support. This is available on all pages.<br>
		+ Inactive Client Devices Report.<br>
		+ Moved new user add to modal (feedback?).<br>
		- Fixed some of the result messages not showing up.<br>
	</div>
	<hr class='hr-changelog'>
	<div id='log10'>
		<h5>2019.04.26</h5>
		* All SQL Code now PDO and tested for SQL Injection<br>
		* Significant background code structural changes to improve dynamic configuration.<br>
		* Visual Changes: Significant visual changes<br>
		* Manager Override: Manager searches by device SN, or Name.<br>
		+ User Specific Default Pages. Modifyable on new user creation, and when editing a user.<br>
		- Profile Edit: Changing your password is working. It now has a separate form.<br>
		$ Feedback: Will be recreated as Contact Support on footer of each page.<br>
		* Create Device: When creating a device, the create device page will return with the client already selected.<br>
		* Create Client: When creating a client the New Loction page will load with the new client already selected.<br>
		* Locations: If you added a new location to an existing client, a new Location page will load with the client already selected.<br>
		# Device List: Not needed in current form. Will be recreated a client specific, or status specific report. <br>
		$ Roadmap: This will return.<br>
		+ Added Sub-Units to Database. Not yet accessible. Inent: Sub-units are not locations. Instead that are business units.<br>
		+ Added Service Providers to the Database. Not yet accessible. Intent: Service Providers are 3rd parties that provide additional services such as an ISP, phone company, printer company, etc.<br>
		+ Add Client Device Management to the database. Not yet accessible.<br>
		* Changed JQuery from 3.3.1 to 3.4.0 due to CVE-2019-11358 <br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log9'>
		<h5>2019.03.15</h5>
		* Visual Changes: Continued minor visual changes.<br>
		* Manager Override: Feature has returned and more effecitve. Management level personnel can now override who has the device, and it's status.<br>
		$ User Edit: Removed the PERMISSION portion from the User Edit due to the permission not displaying properly.<br>
		* Feedback: Changed the Rich Text Editor application to summernote. Image attachment now works.<br>
		+ Locations: Added the ability to input locations into the databse. This is needed for future features. Locations are physical address locations, such as 2525 Blueberry Rd. Suite 206 etc. (For now, all users have access to add locations)<br>
		* Reogranized the menu to group items more logically.<br>
		* Device List: This feature has returned for managment level. This allows Managment personnel to edit existing devices (if incorrect info is entered) or direct access to Manager Override.<br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log8'>
		<h5>2019.02.15</h5>
		* Visual Changes: Continued minor visual changes.<br>
		* Code Clean Up: Significant code clean up. This will have no effect on user function. Though each change has been tested, there could be unforeseen issues. Please report any issue via <a href="feedback.php">Feedback</a>.<br>
		- Feedback: Left the debug turned on for the feedback page. Emails were sending, but users saw the debug log. Debug has now been disabled.<br>
		+ Feedback: Changed the text input to an open source Rich Text Editor. Do not use the Insert Image. It does not work at this time. It won't break anything (Vicki), it will walk you through the steps of adding an image 
		but will not actually do anything.<br>
		+ Feedback: Though this is invisible to the user, added a dynamic entry of users email for reply to when a notification is sent. Previously, it assumed an email address of username@texrus.com. 
		Now the system pulls the email address from the database. This is planning for future features, and actively implemented.<br>
		+ Feedback: Added option for Change Request.<br>
		+ Create User: Email Address, Desk Phone, and Cell Phone fields have been added.<br>
		- New Client: The new client page was sending users back to the login page when creating new clients.<br>
		+ Profile Edit: Email address, desk phone and cell phones are now available fields. <br>
		! Profile Edit: When editing, you must enter a password otherwise the password will be updated to invalid information.<br>
		+ User Edit: Email address, desk phone and cell phones are now available fields. <br>
		! User Edit: When editing, you must enter a password otherwise the password will be updated to invalid information.<br>
		! User Edit: When editing a user, if you do not CHANGE the permission, it will blank their permissions (set to 0), even if they already have a valid permission.<br>
		! User Edit: Permission does not display the active permission for the user, instead it shows the first permission in the list (1-Engineer).<br>
		* Permission: Modified permission handling to be role based instead of rank based. Previous configuration provided a weight to the permission (Engineer = 1, Manager = 3). 
		Therefore permissions were set to say if permission was less than x, denied. New permissions keep the # format, but are now are just an assignment. So new roles can be added, and rights will be given to the role. (true role based rights not implemented)<br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log7'>
		<h5>2019.02.08</h5>
		* Visual Changes: Significant visual style changes, background to grey (#CBCBCB), various button and input area changes.<br>
		* Create Device: Changed page tite to match menu. Reorganized page to put the client as the first option. Added manual status adjustment if SR. Engineer or higher.<br>
		# Create Device - MGR: Removed, and merged into Create Device. Manually setting status has limited visibilty.<br>
		* Device Search: Changed minor display "In" now = In-depot, "Out" now = Out to client. This was changed in preparation for new features.<br>
		+ Device Search: Added the ability to search by Device type. This was changed in preparation for new features.<br>
		+ Device Search: Added the view of Device Type. This was changed in preparation for new features.<br>
		+ Preview-System Administration: <span class='roadmap'>Roadmap Item.</span> This will be intended for admin editable configuration items (such as email server configuration, specific notification destinations, etc.).<br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log6'>
		<h5>2019.02.01</h5>
		+ Changelog: Created the changelog page so people can quickly see the status<br>
		+ Feedback: Created a feedback form that will send an email for bug reports or new feature requests<br>
		# Bug Report: became redundant with Feedback form<br>
		# Bug Fix: became redundant with Feedback form <br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log5'>
		<h5>2019.01.31</h5>
		+ Roadmap: Added the roadmap to the menu system. This will help to keep people informed of new features <br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log4'>
		<h5>2019.01.29</h5>
		+ Create Device - MGR: For the users with permission, there is a new option in the menu.<br>
		This new form allows users to add devices with some additional options.<br>
		The form looks mostly the same, but adds the ability to set the status. The status options are: <br>
		In <br>
		Out <br>
		Frozen <br>
		Frozen/Out <br>
		Retired <br>
		$ Manager Override (This will return soon, and never really functioned as intended)<br>
		# Device List - This was essentially a duplicate of Device Report, so I removed the duplication. <br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log3'>
		<h5>2018.11.11</h5>
		+ User Edit - User Edit is now working as planned. You can edit a user's permission level, name, password, or username. You must be a permission level of Manager to do this.<br>
		+ Device Edit - Device edit is now working as planned. You can edit device name, serial number, or client that the device belongs to.<br>
		+ Device Management Override - Allow managers to change a device's in/out status, as well as freeze or retire devices.<br>
		+ NAVBar Menu - Only shows options to which the user has permission.<br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log2'>
		<h5>2018.11.04</h5>
		* On the New Device Page: Enter is now treated as Tab. This should minimize accidental entry of new devices being added to the wrong clients (most commonly 10th and M Seafoods). At this time, this has only been applied to The New Device page.<br>
		<a href="#top">Top</a>
	</div>
	<hr class='hr-changelog'>
	<div id='log1'>
		<h5>2018.10.14</h5>
		* I lightened the background a little. I just didn't like the pure black. I am going to stick with the dark theme, but solid black was a bit much. It is a minor change in shade, 
		you might not even notice.<br>

		+ Bug Fix: This is not an actual bug fix, but a reporting tool. I wanted to add the ability for people to report bugs to me. In the Menu, you will now see "Bug Fix". For now, it is a simple form. Just provide me a description of what you were doing, and how it does not work right.
		DO NOT use the bug report for feature requests. Only use this form for things that do not work. Though everything I am testing is working for me (or it would not be there), you may find something.<br>
		+Bug Report: Shows you reported bugs, who reported them, my resolutions, and the date the issue was reported.<br>
		<a href="#top">Top</a>
	</div>
</div>

<?php include ("./layouts/bottom_framing.php");?>