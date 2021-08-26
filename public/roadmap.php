<?php $page_title = "Roadmap";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<br>
	
	
		These items are planned for the future. <a href="feedback.php">Feedback</a> is appreciated.<br>
		Links that you will see on this page will be to sample (non-functioning, not tied to anything) versions of what I am working on. Some items have tool tips to describe their funciton. At this time I 
		do not have dates for these features. Some are much farther along than others. Some are quicker to create than others. All development is being done on my own time (not TRU time) so that slows things down too, as I like my personal time.<br>
		Page layouts may differ in the sample/preview items, as some of these were part of my original development of a much larger IT operations system. I stripped Device Tracker out of that system as it was a priority need 
		and modifying that system would have taken longer than rolling out device tracker as its own entity (this is why many things seem incomplete, they were part of a larger plan).
		As I continue to refine the system, I will continue to improve the look/feel/functionality of the existing parts.<br>
		If you see something that does not look/feel/function correctly; there will be a feedback form soon.
		<hr class='preview-divider'>
		<div class='container'>
			<h3>Roadmap items:</h3>
			<ul>
				<li><a href="preview-client_device_add.php">Client Device Tracking</a> - If we are storing client devices (ex: 4G internet devices)</li>
				<li>Loaner Device Tracking - TRU equipment that is loaned to a client</li>
				<li>TRU Equipment Tracker - TRU equiment that is in use by an employee</li>
				<li>SSL Request Form - When an SSL certificate is needed, there is some info required to properly fill out the requests</li>
				<li>SSL Tracker - Dates of renewal, reminder alerts and previous information used (such as SSL type and email used to authenticate)</li>
				<li>In Depot Form - When a system is brought into the TRU Depot, it needs to be tracked so information is not lost</li>
				<li>In Depot Report - Report showing what is In Depot, who it is assigned to, why it is here, and how long</li>
				<li>New PC Setup Form - Both Generic and client specific</li>
				<li>User Dashboard - Customizable dashboard that will include alerts, and widgets to accomplish your tasks (this will take me a while)</li>
				<li>Follow Up Notifications - There are many reasons we need to follow up with clients. This form will help you track that more effectively</li>
				<li><a href="preview-LaborEstimator.php">Project Estimation Form</a> - Linked to Work Order Form and Purchase Request Form</li>
				<li><a href="preview-NewWorkOrder.php">Work Order Form</a> - Linked to Project Esitmation Form and Purchase Request Form</li>
				<li>Knowledge Base - Searchable Knowledge Base. Not work notes, but actual KB. Classified and indexed by Company (ex: Abobe), Product (ex: Acrobat), and problem description</li>
				<li><a href="preview-projectboard.php">Project Status Board</a> - A more dynamic version of the current Project Status Spreadsheet</li>
				<li>Inventory Tracker - Use something out of inventory, track it to client (maybe project and job), auto count down as used. Allows MGR/SR override on counts. Tracks re-order points.</li>
				<li>Transactional Reporting</li>
				<li>Tasks - This would tie directly to TRUApp Timesheets, and ConnectWise Automate (this is FAR down the line). It would also allow the scheduling of tasks with calendar integration. I have a lot of ideas to make this easy and efficient.</li>
				<li><a href="preview-sysconfig.php">System Administration</a> - This page would allow multiple options to be set by an Admin user. This is meant to prevent static configurations.</li>
				<li>Project Scheduler - Once a project is approved, a PM/PL would select the team members for the project, and hit schedule. This would compare the free/busy time 
				on their calendar, and propse times based on the Most likely estimates from the Estimator.</li>
				<li><a href="client_list.php">Client Edit</a> - Be able to Enable and Disable clients. Disabled clients will change the status of all devices to "Return to Client" and a report will be generated.</li>
				<li>PDF Reports - Setup all reports to be able to be PDFs and emailed. </li>
			</ul>
		</div>
		<p>It is my eventual intent/hope to tie crossing informaiton back into TRUApp Timesheets. I want to prevent duplicate entry, or information existing in isolated places.</p>
	</div>
	
<?php include("footer.php"); ?>