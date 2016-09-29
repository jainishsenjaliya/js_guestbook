plugin.tx_jsguestbook{

	settings{

		fields{
			form 				= {$plugin.tx_jsguestbook.settings.fields.form}
			required			= {$plugin.tx_jsguestbook.settings.fields.required}

			type{
				message			= Textarea
			}
		}
	
		receiver{

			sendMail		= {$plugin.tx_jsguestbook.settings.receiver.sendMail}

			subject			= {$plugin.tx_jsguestbook.settings.receiver.subject}
			emailTemplate	= {$plugin.tx_jsguestbook_guestbook.view.templateRootPath}{$plugin.tx_jsguestbook.settings.user.emailTemplate}

			name			= {$plugin.tx_jsguestbook.settings.receiver.name}
			email			= {$plugin.tx_jsguestbook.settings.receiver.email}

			sender {
				name		= {$plugin.tx_jsguestbook.settings.receiver.sender.name}
				email		= {$plugin.tx_jsguestbook.settings.receiver.sender.email}
			}
			noreply {
				name		= {$plugin.tx_jsguestbook.settings.receiver.noreply.name}
				email		= {$plugin.tx_jsguestbook.settings.receiver.noreply.email}
			}
			body{
				default		= {$plugin.tx_jsguestbook.settings.receiver.body.default}
				message		= {$plugin.tx_jsguestbook.settings.receiver.body.message}
			}
		}

		user{

			sendMail	= {$plugin.tx_jsguestbook.settings.user.sendMail}

			subject		= {$plugin.tx_jsguestbook.settings.user.subject}

			emailTemplate	= {$plugin.tx_jsguestbook_guestbook.view.templateRootPath}{$plugin.tx_jsguestbook.settings.user.emailTemplate}

			sender {
				name		= {$plugin.tx_jsguestbook.settings.user.sender.name}
				email		= {$plugin.tx_jsguestbook.settings.user.sender.email}
			}
			noreply {
				name		= {$plugin.tx_jsguestbook.settings.user.noreply.name}
				email		= {$plugin.tx_jsguestbook.settings.user.noreply.email}
			}
			body{
				default		= {$plugin.tx_jsguestbook.settings.user.body.default}
				message		= {$plugin.tx_jsguestbook.settings.user.body.message}
			}
		}

		thanks{
			messageNotification = {$plugin.tx_jsguestbook.settings.thanks.messageNotification}
			redirect 			= {$plugin.tx_jsguestbook.settings.thanks.redirect}
			message				= {$plugin.tx_jsguestbook.settings.thanks.message}
		}

		additional{
			css{
			
				basic{
					uri 	= {$plugin.tx_jsguestbook.settings.additional.css.basic.uri}
				}

				fancy{
					uri 	= {$plugin.tx_jsguestbook.settings.additional.css.fancy.uri}
					include	= {$plugin.tx_jsguestbook.settings.additional.css.fancy.include}
				}

				responsive{
					uri 	= {$plugin.tx_jsguestbook.settings.additional.css.responsive.uri}
					include	= {$plugin.tx_jsguestbook.settings.additional.css.responsive.include}
				}

				includeInFooter = {$plugin.tx_jsguestbook.settings.additional.css.includeInFooter}
			}

			javascript{

				jQueryLib{
					uri 			= {$plugin.tx_jsguestbook.settings.additional.javascript.jQueryLib.uri}
					include 		= {$plugin.tx_jsguestbook.settings.additional.javascript.jQueryLib.include}
					includeInFooter	= {$plugin.tx_jsguestbook.settings.additional.javascript.jQueryLib.includeInFooter}
				}

				ui{
					uri = {$plugin.tx_jsguestbook.settings.additional.javascript.ui.uri}
				}

				validation{
					uri				= {$plugin.tx_jsguestbook.settings.additional.javascript.validation.uri}
					include			= {$plugin.tx_jsguestbook.settings.additional.javascript.validation.include}
					includeInFooter	= {$plugin.tx_jsguestbook.settings.additional.javascript.validation.includeInFooter}
				}
			}
		}
	}
}

config.tx_jsguestbook.features.skipDefaultArguments = 1
plugin.tx_jsguestbook.features.skipDefaultArguments = 1