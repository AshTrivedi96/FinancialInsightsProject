<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_contact extends CI_Controller 
{
  public function index()
  {
    $this->load->view('header');
    $this->load->view('contact');
    $this->load->view('footer');

  }
public  function sendMail()
{
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'xxx@gmail.com', // change it to yours
  'smtp_pass' => 'xxx', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
    $email = $this->input->post('email');
    $name = $this->input->post('name');
    $subject = $this->input->post('subject');
        $message = $this->input->post('message');;
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($email); // change it to yours
      $this->email->to(RECIVER_MAIL);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}
}