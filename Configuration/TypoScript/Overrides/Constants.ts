plugin.tx_jsguestbook{

	settings{

		fields{

			# cat=jsguestbook_fields/enable/0010; type=text; label= Form fields : Selected fields will be reflected in frontend side. [i.e : first_name, last_name, title, email, phone, www, message]. Place fields name with comma separated
			form 		= first_name, last_name, title, email, phone, www, message

			# cat=jsguestbook_fields/enable/0020; type=text; label= Required fields : Selected fields will be reflected in frontend side as Required fields. Place required fielda name with comma separated
			required	= first_name, email, phone
		}
	
		receiver{
			# cat=jsguestbook_receiver/enable/0100; type=boolean; label= Receiver Mail: Enable Email to Receiver
			sendMail	= 1

			# cat=jsguestbook_receiver//0110; type=text; label= Receiver Mail Subject: Subject for mail to receiver overwrites flexform settings 
			subject		= New guestbook Entry

			# cat=jsguestbook_receiver/file; type=string; label= Default Email Template Path :  (e.g. "Email/Receiver.html" this path will be EXT:js_guestbook/Resources/Private/Templates/Email/Receiver.html ) 
			emailTemplate	= Email/Receiver.html

			# cat=jsguestbook_receiver//0120; type=text; label= Receiver Email: Receiver Name overwrites flexform settings (e.g. Receiver Name)
			name		= 

			# cat=jsguestbook_receiver//0130; type=text; label= Receiver Email: Email of the receivers overwrites flexform settings (e.g. receiver@mail.com)
			email		= 

			sender {
				# cat=jsguestbook_receiver//0140; type=text; label= Receiver Sender Name: Sender Name for mail to receiver overwrites flexform settings (e.g. Sender Name) : if blank or {first_name} then it will take it from user name
				name		= {first_name}

				# cat=jsguestbook_receiver//0150; type=text; label= Receiver Sender Email: Sender Email for mail to receiver overwrites flexform settings (e.g. sender@mail.com ) : if blank or {email} then it will take it from user email
				email		= {email}
			}
			noreply {
				# cat=jsguestbook_receiver//0160; type=text; label= Receiver Reply Name: Reply Name for mail to receiver overwrites flexform settings (e.g. noreply Name) 
				name		= noreply

				# cat=jsguestbook_receiver//0170; type=text; label= Receiver Reply Email: Reply Email for mail to receiver overwrites flexform settings (e.g. noreply@your-domain.com)
				email		= noreply@your-domain.com
			}
			body{
				# cat=jsguestbook_receiver//0240; type=boolean; label= Receiver Default Mail Template: If Enable then Default Mail Template will be sent to Receiver. [ i.e. Email/Receiver.html ]
				default		= 1

				# cat=jsguestbook_receiver//0250; type=text; label= Body text for Email to Receiver : sent all user information  (e.g.  {js_guestbook_all} ). If "Receiver Default Mail Template" is disable then following data will sent in mail.
				message		= {js_guestbook_all}
			}
		}

		user{

			# cat=jsguestbook_user/enable/0300; type=boolean; label= User Mail: Enable Email to User
			sendMail	= 1

			# cat=jsguestbook_user//0310; type=text; label= User Mail Subject: Subject for mail to User overwrites flexform settings 
			subject		= Guest book Entry has been added

			# cat=jsguestbook_user/file; type=string; label= Default Email Template Path :  (e.g. "Email/User.html" this path will be EXT:js_guestbook/Resources/Private/Templates/Email/User.html ) 
			emailTemplate	= Email/User.html

			sender {
				# cat=jsguestbook_user//0320; type=text; label= User Sender Name: Sender Name for mail to User overwrites flexform settings (e.g. Sender Name)
				name		= 

				# cat=jsguestbook_user//0330; type=text; label= User Sender Email: Sender Email for mail to User overwrites flexform settings (e.g. sender@mail.com)
				email		= 
			}
			noreply {
				# cat=jsguestbook_user//0340; type=text; label= User Reply Name: Reply Name for mail to User overwrites flexform settings (e.g. noreply Name) 
				name		= noreply
				# cat=jsguestbook_user//0350; type=text; label= User Reply Email: Reply Email for mail to User overwrites flexform settings (e.g. noreply@your-domain.com)

				email		= noreply@your-domain.com
			}
			
			body{
				# cat=jsguestbook_user//0420; type=boolean; label= User Default Mail Template: If Enable then Default Mail Template will be sent to User. [ i.e. Email/User.html ]
				default		= 1

				# cat=jsguestbook_user//0430; type=text; label= Body text for Email to User : sent all user information  (e.g.  {js_guestbook_all} ). If "User Default Mail Template" is disable then following data will sent in mail.
				message		= {js_guestbook_all}
			}
		}

		thanks{
			# cat=jsguestbook_thanks//0500; type=text; label= Message Notification: Message Notification will display at top of the screen after submitting the form
			messageNotification = Thanks you for your response! We will get back to you as soon as possible!

			# cat=jsguestbook_thanks//0510; type=text; label= Page Redirect Link : Page will be redirect after submitting the form
			redirect = 

			# cat=jsguestbook_thanks//0520; type=text; label= Thanks Message : Message will be display after submitting the form
			message				= 
		}

		additional {
			css {
				
				basic{
					# cat=jsguestbook_additional/file; type=string; label= Basic CSS Path
					uri = typo3conf/ext/js_guestbook/Resources/Public/Css/Basic.css
				}

				fancy{
					# cat= jsguestbook_additional/file; type=string; label= Fancy CSS Path
					uri = typo3conf/ext/js_guestbook/Resources/Public/Css/Fancy.css

					# cat=jsguestbook_additional/enable/0600; type=boolean; label= Fancy CSS: Enable Fancy CSS	
					include = 1
				}

				responsive{
					# cat= jsguestbook_additional/file; type=string; label= Responsive CSS Path
					uri = typo3conf/ext/js_guestbook/Resources/Public/Css/Responsive.css

					# cat=jsguestbook_additional/enable/0610; type=boolean; label= Responsive CSS: Responsive CSS
					include = 0
				}

				# cat=jsguestbook_additional/enable/0620; type=boolean; label= Include CSS in header section: If Enable then it will include in footer section
				includeInFooter = 0
			}
			
			javascript{

				jQueryLib{
					# cat=jsguestbook_additional/file; type=string; label= jQuery Library
					uri = typo3conf/ext/js_guestbook/Resources/Public/Script/jquery.min.js
					
					# cat=jsguestbook_additional/enable/0640; type=boolean; label= jQuery Library: If Enable then include jQuery Library 
					include = 0

					# cat=jsguestbook_additional/enable/0650; type=boolean; label= Include jQuery Library in header section: If Enable then it will include in footer section
					includeInFooter = 0
				}

				ui{
					# cat=jsguestbook_additional/file; type=string; label= jQuery UI Library
					uri = typo3conf/ext/js_guestbook/Resources/Public/Script/jquery-ui.js
				}

				validation{
					# cat=jsguestbook_additional/file; type=string; label= Javascript Path
					uri = typo3conf/ext/js_guestbook/Resources/Public/Script/Validations.js

					# cat=jsguestbook_additional/enable/0660; type=boolean; label= jQuery Library: If Enable then include jQuery Library 
					include = 1

					# cat=jsguestbook_additional/enable/0670; type=boolean; label= Include jQuery Library in header section: If Enable then it will include in footer section
					includeInFooter = 1
				}
			}
		}
	}
}