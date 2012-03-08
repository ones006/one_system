<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MX_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function home()
	{
		$this->load->view('home');
	}

	/*
	 * Export to Pdf
	 * with dompdf library
	 * @return to pdf page
	 */
	public function to_pdf() {	
		// Load library
		$this->load->library('dompdf_gen');
		// Load all views as normal
		$this->load->view('home');
		// Get output html
		$html = $this->output->get_output();
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf");
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */