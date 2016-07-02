<?php namespace App\Services;

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */
 
use Config, View, Sentry, Mail, EmailQueue;
 
class Mailer {

    public function sendmail($type = 'basic', $data, $user, $profile, $savetodb = false)
    {
        if(Config::get("mail.sentmail")) {
            
            // Construct the message

            $data['user'] = $user;
            $data['profile'] = $profile;
            $data['data'] = $data;
            switch ($type) {
                case 'forgot-password':
                    $data['short_teaser'] = $emailTitle = 'Roadline - Lấy lại mật khẩu';
                    break;
                case 'register-activate':
                    $data['short_teaser'] = $emailTitle = 'Roadline - Kích hoạt tài khoản';
                    break;
                case 'mailservice':
                    $data['short_teaser'] = $emailTitle = $data['title'];
                    break;
                case 'userfollow':
                    $data['short_teaser'] = $emailTitle = $user->first_name.' '.$user->last_name.' đã quan tâm đến bạn';
                    break;
                case 'activated':
                    $data['short_teaser'] = $emailTitle = 'Kích hoạt tài khoản';
                    break;
                case 'forgot_password':
                    $data['short_teaser'] = $emailTitle = 'Yêu cầu lấy lại mật khẩu';
                    break;
                case 'new_message':
                    $data['short_teaser'] = $emailTitle = $user->first_name.' '.$user->last_name.' đã gửi cho bạn một tin nhắn';
                    break;
                case 'new_event':
                    $data['short_teaser'] = $emailTitle = $user->first_name.' '.$user->last_name.' đã tạo cung đường mới';
                    break;

                default:
                    # code...
                    break;
            }
            $sentEmail = true;
            // if($profile->notice_all) {
            //     if($type == 'follow' && !$profile->notice_follow) {
            //         $sentEmail = false;
            //     } else if($type == 'new_message' && !$profile->notice_msg) {
            //         $sentEmail = false;
            //     } else if($type == 'new_guide' && !$profile->notice_friend_guide) {
            //         $sentEmail = false;
            //     }
            // }
            if($sentEmail) {            
                if($savetodb) {
                	$msgContent = View::make('emails.'.$type, $data);
                    // save to db email_queue, for job process
                    $email_queue = new EmailQueue;
                    $email_queue->from_name = $user->first_name.' '.$user->last_name;
                    $email_queue->from_email = $user->email;
                    $email_queue->to_name = $profile->first_name.' '.$profile->last_name;
                    $email_queue->to_email = $profile->email;
                    $email_queue->subject = $emailTitle;
                    $email_queue->message = $msgContent;
                    $email_queue->save();

                } else {
					// Send the activation code through email
					Mail::send('emails.'.$type, $data, function($m) use ($profile, $data)
					{
						$m->to($profile->email, $profile->first_name . ' ' . $profile->last_name);
						$m->subject($data['short_teaser']);
					});
                }
            }
        }
	}
}